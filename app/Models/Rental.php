<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rental extends Model
{
    protected $fillable = [
        'user_id',      // Foreign key referencing the user
        'car_id',       // Foreign key referencing the car
        'start_date',   // Rental start date
        'end_date',
        'cost_per_day',    // Rental end date
        'total_cost',   // Total cost for the rental
        'status'
    ];

    public function car(): BelongsTo {
        return $this->belongsTo(Car::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
