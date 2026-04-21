<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($movement) {
            $product = $movement->product;
            if ($movement->type === 'in') {
                $product->quantity += $movement->quantity;
            } elseif ($movement->type === 'out') {
                if ($product->quantity < $movement->quantity) {
                    throw new \Exception('Not enough stock to perform this operation.');
                }
                $product->quantity -= $movement->quantity;
            }
            $product->save();
        });

        static::updating(function ($movement) {
            $product = $movement->product;
            $original = $movement->getOriginal();
            // Revert original movement
            if ($original['type'] === 'in') {
                $product->quantity -= $original['quantity'];
            } elseif ($original['type'] === 'out') {
                $product->quantity += $original['quantity'];
            }
            // Apply new movement
            if ($movement->type === 'in') {
                $product->quantity += $movement->quantity;
            } elseif ($movement->type === 'out') {
                if ($product->quantity < $movement->quantity) {
                    throw new \Exception('Not enough stock to perform this operation.');
                }
                $product->quantity -= $movement->quantity;
            }
            if ($product->quantity < 0) {
                throw new \Exception('Stock cannot be negative.');
            }
            $product->save();
        });

        static::deleting(function ($movement) {
            $product = $movement->product;
            if ($movement->type === 'in') {
                $product->quantity -= $movement->quantity;
            } elseif ($movement->type === 'out') {
                $product->quantity += $movement->quantity;
            }
            if ($product->quantity < 0) {
                throw new \Exception('Stock cannot be negative.');
            }
            $product->save();
        });
    }
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type',
        'quantity',
        'reason',
        'user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
