<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            "name"=>"Super Admin",
            "email"=>"admin@gmail.com",
            "role"=>"admin",
            "password"=>"12345"

        ]);
    }
}
