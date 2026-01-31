<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'johnson@manifestghana.com'],
            [
                'name' => 'Johnson Sebire',
                'password' => Hash::make(config('app.default_admin_password', 'password')),
            ]
        );

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: johnson@manifestghana.com.com');
        $this->command->info('Password: password');
        $this->command->warn('Please change the password after first login!');
    }
}
