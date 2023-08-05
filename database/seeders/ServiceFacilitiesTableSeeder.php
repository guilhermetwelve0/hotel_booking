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
            ],
            [
                "name" => "Personalized butler",
                "price" => 300,
            ],
            [
                "name" => "Luxury in-room dining",
                "price" => 200,
            ],
            [
                "name" => "Exclusive toiletries",
                "price" => 150,
            ],
            [
                "name" => "Complimentary breakfast",
                "price" => 50,
            ],
            [
                "name" => "Evening cocktails",
                "price" => 50,
            ],
            [
                "name" => "In-room entertainment options (TV, Playstation, etc.)",
                "price" => 30,
            ],

            [
                "name" => "Air-con",
                "price" => 25,
            ],
            [
                "name" => "Wi-Fi access",
                "price" => 20,
            ],
            [
                "name" => "Private balcony",
                "price" => 15,
            ],
            [
                "name" => "Extra beds",
                "price" => 10,
            ],
            [
                "name" => "In-room coffee/tea",
                "price" => 5,
            ],
        ];
        foreach ($servicesFacilities as $data) {
            $servFaci = new ServiceFacility();
            $servFaci->fill($data);
            $servFaci->save();
        }
    }
}
