<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
                    [
                        'name' => fake()->name(),
                        'email' => 'super@bmotionav.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
                        'is_admin' => User::ADMINISTRATOR_USER,
                    ],
                    [
                        'name' => fake()->name(),
                        'email' => 'user@bmotionav.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
                    ]
                ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
