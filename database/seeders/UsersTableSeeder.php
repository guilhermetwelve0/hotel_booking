<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@crown.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Danielle',
                'email' => 'danielle@newjeans.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Irene',
                'email' => 'irene@redvelvet.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Jennie',
                'email' => 'jennie@blackpink.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Karina',
                'email' => 'karina@aespa.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Lia',
                'email' => 'lia@itzy.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Liz',
                'email' => 'liz@ive.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Lily',
                'email' => 'lily@nmixx.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Lisa',
                'email' => 'lisa@blackpink.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Rose',
                'email' => 'rose@blackpink.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Winter',
                'email' => 'winter@aespa.com',
                'password' => Hash::make('password'),
            ]
        ];

        foreach ($users as $data) {
            $user = new User();
            $user->fill($data);
            $user->save();
        }

    }
}
