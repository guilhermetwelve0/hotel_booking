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
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Mg Mg',
                'email' => 'mgmg@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Mo Mo',
                'email' => 'momo@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Tzuyu',
                'email' => 'tzuyu@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Sana',
                'email' => 'sana@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Mina',
                'email' => 'mina@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Minji',
                'email' => 'minji@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Hanni',
                'email' => 'hanni@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Ryujin',
                'email' => 'ryujin@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Yeji',
                'email' => 'yeji@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Yuna',
                'email' => 'yuna@gmail.com',
                'password' => Hash::make('password'),
            ],

        ];

        foreach ($users as $data) {
            $user = new User();
            $user->fill($data);
            $user->save();
        }

    }
}
