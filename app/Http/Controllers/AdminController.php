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
            'totalPayments',
            'totalAmount',
            'pendingPayments',
            'recentRsvps',
            'recentPayments'
        ));
    }
    
    public function rsvps()
    {
        $rsvps = Rsvp::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.rsvps', compact('rsvps'));
    }
    
    public function payments()
    {
        $payments = Payment::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.payments', compact('payments'));
    }
}
