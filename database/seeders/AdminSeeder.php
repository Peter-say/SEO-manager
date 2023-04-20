<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
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
                'name' => 'Iriogbe Peter',
                'email' => 'admin@gmail.com',
                'role' => 'is_admin',
                'email_verified_at' => now(),
                'password' => bcrypt('#admin@password@'),
                'remember_token' => bcrypt(Str::random(10)),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
