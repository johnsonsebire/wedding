<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Get RSVP statistics
        $totalRsvps = Rsvp::count();
        $attendingCount = Rsvp::where('attending', true)->count();
        $notAttendingCount = Rsvp::where('attending', false)->count();
        $totalGuests = Rsvp::sum('guests');
        $totalAttendingGuests = Rsvp::where('attending', true)->sum('guests');
        
        // Get payment statistics
        $totalPayments = Payment::where('status', 'success')->count();
        $totalAmount = Payment::where('status', 'success')->sum('amount');
        $pendingPayments = Payment::where('status', 'pending')->count();
        
        // Get recent RSVPs
        $recentRsvps = Rsvp::orderBy('created_at', 'desc')->limit(10)->get();
        
        // Get recent successful payments
        $recentPayments = Payment::where('status', 'success')
            ->orderBy('paid_at', 'desc')
            ->limit(10)
            ->get();
        
        return view('admin.dashboard', compact(
            'totalRsvps',
            'attendingCount',
            'notAttendingCount',
            'totalGuests',
            'totalAttendingGuests',
            'totalPayments',
            'totalAmount',
            'pendingPayments',
            'recentRsvps',
            'recentPayments'
        ));
    }
    
    public function rsvps()
    {
        // Get unique RSVPs, prioritizing most recent submission for duplicates
        $rsvps = Rsvp::select('rsvps.*')
            ->whereIn('id', function($query) {
                $query->selectRaw('MAX(id)')
                    ->from('rsvps')
                    ->groupBy(DB::raw('COALESCE(email, phone)'));
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('admin.rsvps', compact('rsvps'));
    }
    
    public function payments()
    {
        $payments = Payment::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.payments', compact('payments'));
    }

    public function exportRsvps()
    {
        $rsvps = Rsvp::orderBy('created_at', 'desc')->get();
        
        $filename = 'rsvps_' . date('Y-m-d_His') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($rsvps) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, ['Name', 'Email', 'Phone', 'Attending', 'Number of Guests', 'Message', 'Date Submitted']);
            
            // Add data rows
            foreach ($rsvps as $rsvp) {
                fputcsv($file, [
                    $rsvp->name,
                    $rsvp->email,
                    $rsvp->phone,
                    $rsvp->attending ? 'Yes' : 'No',
                    $rsvp->guests,
                    $rsvp->message,
                    $rsvp->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }

    public function exportPayments()
    {
        $payments = Payment::orderBy('created_at', 'desc')->get();
        
        $filename = 'payments_' . date('Y-m-d_His') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($payments) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, ['Reference', 'Name', 'Email', 'Amount', 'Currency', 'Status', 'Payment Date', 'Date Created']);
            
            // Add data rows
            foreach ($payments as $payment) {
                fputcsv($file, [
                    $payment->reference,
                    $payment->name,
                    $payment->email,
                    $payment->amount,
                    $payment->currency,
                    ucfirst($payment->status),
                    $payment->paid_at ? $payment->paid_at->format('Y-m-d H:i:s') : 'N/A',
                    $payment->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}
