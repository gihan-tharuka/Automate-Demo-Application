<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            if ($item->type === 'part' && $item->product_id) {
                $product = \App\Models\Product::find($item->product_id);
                if (empty($item->price)) {
                    $item->price = $product ? $product->selling_price : 0;
                }
                if (empty($item->total)) {
                    $item->total = $product ? $item->price * ($item->quantity ?? 1) : 0;
                }
            }
            if ($item->type === 'service') {
                if (empty($item->total)) {
                    $item->total = ($item->price ?? 0) * ($item->quantity ?? 1);
                }
            }
        });
    }
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'type',
        'product_id',
        'service_name',
        'quantity',
        'price',
        'total',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
