<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=>' Anie',
            "email"=>'sahianie763@gmail.com',
            "password"=> Hash::make('1234567'),
            "role"=>'admin',
        ]);
    }
}
