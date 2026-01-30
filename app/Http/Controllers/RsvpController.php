<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'guests' => 'required|integer|min:1|max:10',
            'attending' => 'required|boolean',
            'message' => 'nullable|string|max:1000',
        ]);

        $rsvp = Rsvp::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your RSVP! We look forward to celebrating with you.',
            'data' => $rsvp
        ], 201);
    }
}
