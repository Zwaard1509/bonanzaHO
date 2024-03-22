<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
            'name' => 'Administator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('aku'),
            'level' => 1
        ],
        [
            'name' => 'User',
            'email' => 'User@gmail.com',
            'password' => bcrypt('kamu'),
            'level' => 2
        ]
        ];

        foreach ($user as $key =>$value) {
            User::create($value);
        }
    }
}
