<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rental;

class RentalsTableSeeder extends Seeder
{
    public function run()
    {
        Rental::create([
            'user_id' => 2, // Customer One
            'car_id' => 1,  // Toyota Corolla
            'start_date' => '2023-09-01',
            'end_date' => '2023-09-05',
            'total_cost' => 0,
            "status" => "Ongoing"
        ]);

        Rental::create([
            'user_id' => 3, // Customer Two
            'car_id' => 2,  // Honda Civic
            'start_date' => '2023-09-10',
            'end_date' => '2023-09-12',
            'total_cost' => 0,
            "status" => "Completed"
        ]);
        Rental::create([
            'user_id' => 4, // Customer Two
            'car_id' => 3,  // Honda Civic
            'start_date' => '2023-09-10',
            'end_date' => '2023-09-12',
            'total_cost' => 0,
            "status" => "Ongoing"
        ]);
    }
}

