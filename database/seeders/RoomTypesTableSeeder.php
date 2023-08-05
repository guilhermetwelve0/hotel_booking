<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoomType;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Economy',
                'price' => 50,
            ],
            [
                'name' => 'Double',
                'price' => 100,
            ],
            [
                'name' => 'Family',
                'price' => 200,
            ],
            [
                'name' => 'Classic',
                'price' => 150,
            ],
            [
                'name' => 'Superior',
                'price' => 300,
            ],
            [
                'name' => 'Junior Suite',
                'price' => 600,
            ],
            [
                'name' => 'Executive',
                'price' => 800,
            ],
            [
                'name' => 'Deluxe Suite',
                'price' => 1500,
            ],
            [
                'name' => 'Royal Suite',
                'price' => 3000,
            ],
            [
                'name' => 'Presidential Suite',
                'price' => 5000,
            ],
        ];

        foreach ($types as $data) {
            $type = new RoomType();
            $type->fill($data);
            $type->save();
        }
    }
}
