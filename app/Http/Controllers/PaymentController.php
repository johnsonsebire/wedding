<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private function getPaystackSecretKey()
    {
        // Use test key for now - replace with your actual key
        return env('PAYSTACK_SECRET_KEY', 'sk_test_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
    }

    public function initializePayment(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
            'name' => 'nullable|string|max:255',
        ]);

        // Convert amount to kobo/pesewas (multiply by 100)
        $amountInPesewas = $validated['amount'] * 100;

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->getPaystackSecretKey(),
                'Content-Type' => 'application/json',
            ])->post('https://api.paystack.co/transaction/initialize', [
                'email' => $validated['email'],
                'amount' => $amountInPesewas,
                'currency' => 'GHS', // Ghanaian Cedi
                'callback_url' => route('payment.callback'),
                'metadata' => [
                    'name' => $validated['name'] ?? 'Anonymous',
                    'purpose' => 'Wedding Gift - Johnson & Dorothy',
                    'custom_fields' => [
                        [
                            'display_name' => 'Gift Purpose',
                            'variable_name' => 'gift_purpose',
                            'value' => 'Wedding Celebration'
                        ]
                    ]
                ]
            ]);

            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return response()->json([
                    'success' => true,
                    'data' => $data['data']
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => $data['message'] ?? 'Failed to initialize payment'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Paystack initialization error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again.'
            ], 500);
        }
    }

    public function verifyPayment(Request $request)
    {
        $reference = $request->query('reference');

        if (!$reference) {
            return response()->json([
                'success' => false,
                'message' => 'No reference provided'
            ], 400);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->getPaystackSecretKey(),
            ])->get("https://api.paystack.co/transaction/verify/{$reference}");

            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return response()->json([
                    'success' => true,
                    'data' => $data['data']
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => $data['message'] ?? 'Failed to verify payment'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Paystack verification error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while verifying payment.'
            ], 500);
        }
    }

    public function paymentCallback(Request $request)
    {
        $reference = $request->query('reference');

        if ($reference) {
            // Redirect to homepage with reference so JavaScript can verify
            return redirect('/?payment_reference=' . $reference);
        }

        return redirect('/')->with('error', 'Payment verification failed');
    }

    public function handleWebhook(Request $request)
    {
        // Verify webhook signature
        $signature = $request->header('x-paystack-signature');
        $body = $request->getContent();
        
        $expectedSignature = hash_hmac('sha512', $body, $this->getPaystackSecretKey());

        if ($signature !== $expectedSignature) {
            return response()->json(['message' => 'Invalid signature'], 401);
        }

        $event = $request->all();

        // Handle different event types
        if ($event['event'] === 'charge.success') {
            $data = $event['data'];
            
            // Log successful payment
            Log::info('Payment successful', [
                'reference' => $data['reference'],
                'amount' => $data['amount'] / 100,
                'email' => $data['customer']['email'],
                'name' => $data['metadata']['name'] ?? 'Anonymous',
            ]);

            // You can store this in database, send email, etc.
        }

        return response()->json(['message' => 'Webhook received']);
    }
}
