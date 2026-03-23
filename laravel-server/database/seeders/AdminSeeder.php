<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'info@freedomwithdxn.com'],
            [
                'name' => 'Admin',
                'password' => 'Admin1234',
                'role' => 'admin',
                'country' => 'UAE',
            ]
        );
    }
}
