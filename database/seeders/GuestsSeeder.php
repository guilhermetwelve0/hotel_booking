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
            
        ];
        foreach ($guests as $data) {
            $guest = new Guest();
            $guest->fill($data);
            $guest->save();
        }
    }
}
