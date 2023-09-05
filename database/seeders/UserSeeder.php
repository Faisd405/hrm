<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\UserProfiles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'developer',
                'email' => 'developer@gmail.com',
                'password' => Hash::make('developer123'),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
            ],
        ];

        foreach ($user as $key => $value) {
            $user = User::create([
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => $value['password'],
            ]);

            $user->assignRole('admin');
        }
    }
}
