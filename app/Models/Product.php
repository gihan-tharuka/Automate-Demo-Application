<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'part_number',
        'description',
        'quantity',
        'buying_price',
        'selling_price',
        'category_id',
        'vehicle_make',
        'vehicle_model',
        'vehicle_year',
        'image',
    ];

    public static function getLowStockThreshold(): int
    {
        // You can change this value or load from config
        return config('inventory.low_stock_threshold', 5);
    }

    public function isLowStock(): bool
    {
        return $this->quantity <= self::getLowStockThreshold();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }
}
