<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Jahid Hasan',
            'email' => 'jahidhasan370919@gmail.com',
            'phone' => '01701367333',
            'address' => '123 Admin St.',
            'password' => '1234',  // Plain text password
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Customer One',
            'email' => 'customer1@example.com',
            'phone' => '0987654321',
            'address' => '456 Customer Ave.',
            'password' => 'password',  // Plain text password
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Customer Two',
            'email' => 'customer2@example.com',
            'phone' => '1122334455',
            'address' => '789 Customer Blvd.',
            'password' => 'password',  // Plain text password
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Customer Three',
            'email' => 'customer3@example.com',
            'phone' => '5566778899',
            'address' => '123 Shopping St.',
            'password' => 'password123',  // Plain text password
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Customer Four',
            'email' => 'customer4@example.com',
            'phone' => '6677889900',
            'address' => '321 Retail Rd.',
            'password' => 'mypassword',  // Plain text password
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Customer Five',
            'email' => 'customer5@example.com',
            'phone' => '7788990011',
            'address' => '456 Purchase Ave.',
            'password' => 'password456',  // Plain text password
            'role' => 'customer',
        ]);
    }
}

