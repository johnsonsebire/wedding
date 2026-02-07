<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    /**
     * Set the name attribute with proper capitalization
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::title($value);
    }
}
