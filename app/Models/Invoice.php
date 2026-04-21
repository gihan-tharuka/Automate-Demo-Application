<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
           'user_id',
           'vehicle_number',
           'mileage',
           'subtotal',
           'vat_amount',
           'total',
           'payment_method',
           'notes',
           'status',
           'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function income()
    {
        return $this->hasOne(Income::class);
    }
}
