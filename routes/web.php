<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('wedding');
});

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');

// Payment routes
Route::post('/payment/initialize', [PaymentController::class, 'initializePayment'])->name('payment.initialize');
Route::get('/payment/verify', [PaymentController::class, 'verifyPayment'])->name('payment.verify');
Route::get('/payment/callback', [PaymentController::class, 'paymentCallback'])->name('payment.callback');
Route::post('/payment/webhook', [PaymentController::class, 'handleWebhook'])->name('payment.webhook');
