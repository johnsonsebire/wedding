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

        // Check for duplicate RSVP based on email or phone
        $existingRsvp = null;
        if (!empty($validated['email'])) {
            $existingRsvp = Rsvp::where('email', $validated['email'])->first();
        }
        if (!$existingRsvp && !empty($validated['phone'])) {
            $existingRsvp = Rsvp::where('phone', $validated['phone'])->first();
        }

        if ($existingRsvp) {
            return response()->json([
                'success' => false,
                'message' => 'You have already submitted an RSVP. If you need to make changes, please contact us directly.',
            ], 422);
        }

        $rsvp = Rsvp::create($validated);

        $message = $validated['attending']
            ? 'Thank you for your RSVP! We look forward to celebrating with you.'
            : 'Thank you for letting us know. We\'ll miss you on our special day!';

        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $rsvp
        ], 201);
    }
}
