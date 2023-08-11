<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceFacility;

class ServiceFacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicesFacilities = [
            [
                "name" => "Private pool",
                "price" => 500,
                'icon' => "fa-person-swimming"
            ],
            [
                "name" => "Personalized butler",
                "price" => 300,
                'icon' => "fa-utensils"
            ],
            [
                "name" => "Luxury in-room dining",
                "price" => 200,
                'icon' => "fa-utensils"
            ],
            [
                "name" => "Exclusive toiletries",
                "price" => 150,
                'icon' => "fa-bath"
            ],
            [
                "name" => "Complimentary breakfast",
                "price" => 50,
                'icon' => "fa-burger"
            ],
            [
                "name" => "Evening cocktails",
                "price" => 50,
                'icon' => "fa-champagne-glasses"
            ],
            [
                "name" => "Entertainments (TV, Playstation, etc.)",
                "price" => 30,
                'icon' => "fa-display"
            ],

            [
                "name" => "Air-con",
                "price" => 25,
                'icon' => "fa-wind"
            ],
            [
                "name" => "Wi-Fi access",
                "price" => 20,
                'icon' => "fa-wifi"
            ],
            [
                "name" => "Private balcony",
                "price" => 15,
                'icon' => "fa-people-line"
            ],
            [
                "name" => "Extra beds",
                "price" => 10,
                'icon' => "fa-bed"
            ],
            [
                "name" => "In-room coffee/tea",
                "price" => 5,
                'icon' => "fa-mug-saucer"
            ],
        ];
        foreach ($servicesFacilities as $data) {
            $servFaci = new ServiceFacility();
            $servFaci->fill($data);
            $servFaci->save();
        }
    }
}
