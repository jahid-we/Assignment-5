<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'model',
        'year',
        'car_type',        // e.g., SUV, Sedan, etc.
        'daily_rent_price', // Decimal value for daily rent price
        'availability',     // Boolean to indicate availability
        'image',
        'user_id'
                    // URL or path to the car image
    ];

    public function rentals():HasMany{
    return $this->hasMany(Rental::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}

