<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PenjualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'penjual@example.com'],
            [
                'name' => 'Penjual',
                'email' => 'penjual@gmail.com',
                'password' => Hash::make('password123'), // Ganti jika perlu
                'phone' => '081234567890',
                'role' => 'penjual',
            ]
        );
    }
    }

