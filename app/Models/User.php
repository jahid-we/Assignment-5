<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
        'otp',
        'role',
    ];

    protected $hidden = [
        'password',
        'otp',
    ];

    public function isAdmin():bool {
        return $this->role === 'admin';
    }

    public function isCustomer():bool {
        return $this->role === 'customer';
    }

    public function rentals():HasMany {
        return $this->hasMany(Rental::class);
    }

}
