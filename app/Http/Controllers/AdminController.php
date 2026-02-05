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
        // Get unique RSVP IDs (filtering duplicates based on email/phone)
        $uniqueRsvpIds = Rsvp::selectRaw('MAX(id) as id')
            ->groupBy(DB::raw('COALESCE(email, phone)'))
            ->pluck('id');
        
        // Get RSVP statistics (using unique RSVPs only)
        $totalRsvps = Rsvp::whereIn('id', $uniqueRsvpIds)->count();
        $attendingCount = Rsvp::whereIn('id', $uniqueRsvpIds)->where('attending', true)->count();
        $notAttendingCount = Rsvp::whereIn('id', $uniqueRsvpIds)->where('attending', false)->count();
        $totalGuests = Rsvp::whereIn('id', $uniqueRsvpIds)->sum('guests');
        $totalAttendingGuests = Rsvp::whereIn('id', $uniqueRsvpIds)->where('attending', true)->sum('guests');
        
        // Get payment statistics
        $totalPayments = Payment::where('status', 'success')->count();
        $totalAmount = Payment::where('status', 'success')->sum('amount');
        $pendingPayments = Payment::where('status', 'pending')->count();
        
        // Get recent RSVPs (unique only, most recent submission per person)
        $recentRsvps = Rsvp::whereIn('id', $uniqueRsvpIds)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        
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

    public function deletePayment(Payment $payment)
    {
        $payment->delete();
        
        return redirect()->route('admin.payments')->with('success', 'Payment deleted successfully!');
    }

    public function exportRsvps()
    {
        // Get unique RSVP IDs (filtering duplicates)
        $uniqueRsvpIds = Rsvp::selectRaw('MAX(id) as id')
            ->groupBy(DB::raw('COALESCE(email, phone)'))
            ->pluck('id');
        
        $rsvps = Rsvp::whereIn('id', $uniqueRsvpIds)
            ->orderBy('created_at', 'desc')
            ->get();
        
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

    public function editRsvp(Rsvp $rsvp)
    {
        return view('admin.rsvps-edit', compact('rsvp'));
    }

    public function updateRsvp(Request $request, Rsvp $rsvp)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'guests' => 'required|integer|min:1|max:10',
            'attending' => 'required|boolean',
            'message' => 'nullable|string|max:1000',
        ]);

        $rsvp->update($validated);

        return redirect()->route('admin.rsvps')->with('success', 'RSVP updated successfully!');
    }

    public function deleteRsvp(Rsvp $rsvp)
    {
        $rsvp->delete();
        
        return redirect()->route('admin.rsvps')->with('success', 'RSVP deleted successfully!');
    }
}
