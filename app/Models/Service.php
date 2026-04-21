<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'included_services',
        'is_active',
    ];

    protected $casts = [
        'included_services' => 'array',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];
}
