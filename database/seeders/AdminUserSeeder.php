<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    
   public function run()
{
    User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'), // change le mot de passe en prod
        'role' => 'admin',
    ]);
}
}
