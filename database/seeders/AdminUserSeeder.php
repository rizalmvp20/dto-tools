<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'password'    => 'admin123',  // akan di-hash oleh mutator
                'is_admin'    => true,
                'is_approved' => true,
            ]
        );
    }
}
