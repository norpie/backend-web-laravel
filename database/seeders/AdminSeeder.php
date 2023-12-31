<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'username' => 'admin',
            'dob' => date('Y-m-d', strtotime('1990-01-01')),
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
        ]);
        $admin = Admin::create([
            'user_id' => $user->id,
        ]);
    }
}
