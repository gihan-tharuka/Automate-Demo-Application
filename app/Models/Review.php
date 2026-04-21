<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'appointment_id',
        'user_id',
        'rating',
        'comment',
        'customer_name',
        'service_used',
        'customer_photo',
        'is_featured',
        'admin_response',
        'responded_at',
        'status',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'responded_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)
                     ->where('status', 'approved')
                     ->orderBy('created_at', 'desc');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
