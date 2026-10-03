<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     protected $fillable = [
        'title',
        'category',
        'description',
        'location',
        'address',
        'event_date',
        'image_url',
    ];
    protected function casts(): array
    {
        return [
            'event_date' => 'datetime',
        ];
    }
}
