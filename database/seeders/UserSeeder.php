<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'mobile' => '+201152958015',
            'password' => 'secret',
            'role' => 'admin',
            'mobile_verified_at' => now()
        ]);
    }
}
