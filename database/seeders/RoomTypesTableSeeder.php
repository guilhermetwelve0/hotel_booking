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
                'description' => "An Economy Room offers comfortable accommodations at an affordable price, making it an ideal choice for budget-conscious travelers. While compact in size, it provides essential amenities for a pleasant stay.",
                'thumbnail' => "img/temp/economy.jpg"
            ],
            [
                'name' => 'Double',
                'price' => 100,
                'description' => "A Double Room is designed for two guests, featuring a comfortable double bed or two twin beds. It offers a cozy and convenient space for travelers seeking a comfortable place to rest.",
                'thumbnail' => "img/temp/double.png"
            ],
            [
                'name' => 'Family',
                'price' => 200,
                'description' => "A Family Room is spacious and well-suited for families or groups, offering multiple beds and amenities to accommodate everyone comfortably. It provides a convenient retreat for travelers with children or larger parties.",
                'thumbnail' => "img/temp/family.jpg"
            ],
            [
                'name' => 'Classic',
                'price' => 150,
                'description' => "The Classic Room offers timeless elegance and comfort, featuring carefully chosen furnishings and decor. It's designed to provide a relaxed and stylish atmosphere for a memorable stay.",
                'thumbnail' => "img/temp/classic.jpg"
            ],
            [
                'name' => 'Superior',
                'price' => 300,
                'description' => "A Superior Room offers an enhanced level of comfort and amenities, often with additional space and upgraded furnishings. It's perfect for guests who want to enjoy a higher level of luxury during their stay.",
                'thumbnail' => "img/temp/superior.jpg"
            ],
            [
                'name' => 'Junior Suite',
                'price' => 600,
                'description' => "The Junior Suite combines a bedroom and a small living area, offering more space and privacy. It's an excellent choice for guests who prefer a separate area for relaxation or work.",
                'thumbnail' => "img/temp/junior_suite.jpg"
            ],
            [
                'name' => 'Executive',
                'price' => 800,
                'description' => "An Executive Room is designed for business travelers, offering amenities that cater to their professional needs. It often includes a dedicated workspace and additional services for a productive stay.",
                'thumbnail' => "img/temp/executive.jpg"
            ],
            [
                'name' => 'Deluxe Suite',
                'price' => 1500,
                'description' => "The Deluxe Suite provides a luxurious experience with a spacious layout, separate living and sleeping areas, and premium amenities. It's ideal for travelers who desire a lavish and comfortable environment.",
                'thumbnail' => "img/temp/deluxe_suite.jpeg"
            ],
            [
                'name' => 'Royal Suite',
                'price' => 3000,
                'description' => "The Royal Suite represents the epitome of luxury, offering opulent decor, multiple bedrooms, grand living spaces, and personalized services. It's the perfect choice for guests seeking the utmost in elegance and exclusivity.",
                'thumbnail' => "img/temp/royal_suite.jpg"
            ],
            [
                'name' => 'Presidential Suite',
                'price' => 5000,
                'description' => "The Presidential Suite is the pinnacle of extravagance, offering unmatched grandeur, exceptional amenities, and breathtaking views. It's reserved for those who expect the highest level of luxury and personalized service.",
                'thumbnail' => "img/temp/presidential_suite.jpg"
            ],
        ];

        foreach ($types as $data) {
            $type = new RoomType();
            $type->fill($data);
            $type->save();
        }
    }
}
