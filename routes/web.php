<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;

Route::get('/', function () {
    return view('wedding');
});

Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');
