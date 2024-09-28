<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        Car::create([
            'name' => 'Toyota Corolla',
            'brand' => 'Toyota',
            'model' => 'Corolla',
            'year' => 2020,
            'car_type' => 'Sedan',
            'daily_rent_price' => 50.00,
            'availability' => true,
            'image' => 'https://i.ibb.co.com/Tb5y4KC/bg-1.jpg',
            'user_id' => 1
        ]);

        Car::create([
            'name' => 'Honda Civic',
            'brand' => 'Honda',
            'model' => 'Civic',
            'year' => 2019,
            'car_type' => 'Sedan',
            'daily_rent_price' => 45.00,
            'availability' => true,
            'image' => 'https://i.ibb.co.com/CsfzNPB/image-3.jpg',
            'user_id'=> 1
        ]);

        Car::create([
            'name' => 'Ford Explorer',
            'brand' => 'Ford',
            'model' => 'Explorer',
            'year' => 2021,
            'car_type' => 'SUV',
            'daily_rent_price' => 80.00,
            'availability' => false,
            'image' => 'https://i.ibb.co.com/SXQKjr6/car-12.jpg',
            'user_id'=> 1
        ]);

        Car::create([
            'name' => 'Chevrolet Camaro',
            'brand' => 'Chevrolet',
            'model' => 'Camaro',
            'year' => 2018,
            'car_type' => 'Coupe',
            'daily_rent_price' => 90.00,
            'availability' => true,
            'image' => 'https://i.ibb.co.com/F6kP6my/car-10.jpg',
            'user_id'=> 1
        ]);

        Car::create([
            'name' => 'Jeep Wrangler',
            'brand' => 'Jeep',
            'model' => 'Wrangler',
            'year' => 2021,
            'car_type' => 'SUV',
            'daily_rent_price' => 85.00,
            'availability' => false,
            'image' => 'https://i.ibb.co.com/qFkGxp2/car-9.jpg',
            'user_id'=> 1
        ]);

        Car::create([
            'name' => 'Nissan Altima',
            'brand' => 'Nissan',
            'model' => 'Altima',
            'year' => 2019,
            'car_type' => 'Sedan',
            'daily_rent_price' => 55.00,
            'availability' => true,
            'image' => 'https://i.ibb.co.com/n0LFWQt/car-8.jpg',
            'user_id'=> 1
        ]);

        Car::create([
            'name' => 'BMW X5',
            'brand' => 'BMW',
            'model' => 'X5',
            'year' => 2020,
            'car_type' => 'SUV',
            'daily_rent_price' => 120.00,
            'availability' => true,
            'image' => 'https://i.ibb.co.com/yFsznV7/car-7.jpg',
            'user_id'=> 1
        ]);

        Car::create([
            'name' => 'Audi A6',
            'brand' => 'Audi',
            'model' => 'A6',
            'year' => 2021,
            'car_type' => 'Sedan',
            'daily_rent_price' => 95.00,
            'availability' => true,
            'image' => 'https://i.ibb.co.com/LnJYrcY/car-6.jpg',
            'user_id'=> 1
        ]);

        Car::create([
            'name' => 'Tesla Model 3',
            'brand' => 'Tesla',
            'model' => 'Model 3',
            'year' => 2022,
            'car_type' => 'Sedan',
            'daily_rent_price' => 100.00,
            'availability' => true,
            'image' => 'https://i.ibb.co.com/RDcPpXz/car-3.jpg',
            'user_id'=> 1
        ]);

        Car::create([
            'name' => 'Hyundai Tucson',
            'brand' => 'Hyundai',
            'model' => 'Tucson',
            'year' => 2020,
            'car_type' => 'SUV',
            'daily_rent_price' => 60.00,
            'availability' => true,
            'image' => 'https://i.ibb.co.com/qWyg7LL/car-1.jpg',
            'user_id'=> 1
        ]);
    }
}

