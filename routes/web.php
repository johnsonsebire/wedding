<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;

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

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes - protected by auth middleware
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/rsvps', [AdminController::class, 'rsvps'])->name('admin.rsvps');
    Route::get('/rsvps/export', [AdminController::class, 'exportRsvps'])->name('admin.rsvps.export');
    Route::get('/rsvps/{rsvp}/edit', [AdminController::class, 'editRsvp'])->name('admin.rsvps.edit');
    Route::put('/rsvps/{rsvp}', [AdminController::class, 'updateRsvp'])->name('admin.rsvps.update');
    Route::delete('/rsvps/{rsvp}', [AdminController::class, 'deleteRsvp'])->name('admin.rsvps.delete');
    Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');
    Route::delete('/payments/{payment}', [AdminController::class, 'deletePayment'])->name('admin.payments.delete');
    Route::get('/payments/export', [AdminController::class, 'exportPayments'])->name('admin.payments.export');
    Route::get('/profile', [ProfileController::class, 'show'])->name('admin.profile');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('admin.profile.password');
});
