<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'guests',
        'attending',
        'message',
    ];

    protected $casts = [
        'attending' => 'boolean',
    ];
}
