<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
            'name' => 'Admin',
            'email' => 'admin@teste.com',
            'password' => Hash::make('password'),
        ],
        [
            'name' => 'Teste',
            'email' => 'teste@teste.com',
            'password' => Hash::make('password')
            ],
        ];

        foreach ($users as $data) {
            $user = new User();
            //$user->fill($data);
            $user->save();
        }

    }
}
