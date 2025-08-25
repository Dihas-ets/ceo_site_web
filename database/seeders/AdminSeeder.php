<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'patronne@dihas.com',
            'password' => Hash::make('admin123'), // mot de passe par défaut
            'is_admin' => true,
        ]);
    }
}


