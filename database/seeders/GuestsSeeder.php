<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guest;

class GuestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guests = [
            [
                "name" => "Kazuha",
                "email" => "kazuha@lesserafim.com"
            ],
            [
                "name" => "Mina",
                "email" => "mina@twice.com"
            ],
            [
                "name" => "Momo",
                "email" => "momo@twice.com"
            ],
            [
                "name" => "Nayeon",
                "email" => "nayeon@twice.com"
            ],
            [
                "name" => "Ning Ning",
                "email" => "ningning@aespa.com"
            ],
            [
                "name" => "Ryujin",
                "email" => "ryujin@itzy.com"
            ],
            [
                "name" => "Sakura",
                "email" => "sakura@lesserafim.com"
            ],
            [
                "name" => "Sana",
                "email" => "sana@twice.com"
            ],
            [
                "name" => "Sullyoon",
                "email" => "sullyoon@nmixx.com"
            ],
            [
                "name" => "Tzuyu",
                "email" => "tzuyu@twice.com"
            ],
            [
                "name" => "Yuna",
                "email" => "yuna@itzy.com"
            ],
        ];
        foreach ($guests as $data) {
            $guest = new Guest();
            $guest->fill($data);
            $guest->save();
        }
    }
}
