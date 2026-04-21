<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'make', 'model', 'year', 'license_plate', 'mileage', 'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor for the photo attribute to ensure it works with Filament
    public function getPhotoUrlAttribute()
    {
        if (!$this->photo) {
            return null;
        }
        
        //return asset('storage/' . $this->photo);
        return Storage::disk(env('FILESYSTEM_DISK', 'public'))->url($this->photo);
    }
}
