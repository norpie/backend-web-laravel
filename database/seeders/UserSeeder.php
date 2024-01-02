<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'username' => 'user',
            'dob' => date('Y-m-d', strtotime('1990-01-01')),
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
