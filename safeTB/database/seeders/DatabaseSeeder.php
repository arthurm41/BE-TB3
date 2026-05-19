<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN SENAI
        User::firstOrCreate(

            ['email' => 'admin@senai.com'],

            [
                'name' => 'Admin SENAI',
                'password' => Hash::make('12345678'),
                'role' => 'admin'
            ]

        );

        // PROFESSOR
        User::firstOrCreate(

            ['email' => 'professor@teste.com'],

            [
                'name' => 'Professor',
                'password' => Hash::make('12345678'),
                'role' => 'professor'
            ]

        );

        User::firstOrCreate(

            ['email' => 'portaria@teste.com'],

            [
                'name' => 'Portaria',
                'password' => Hash::make('12345678'),
                'role' => 'portaria'
            ]

        );
    }
}