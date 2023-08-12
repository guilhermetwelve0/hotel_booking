<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Models\Guest;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $room = Room::inRandomOrder()->first();
            $user = User::inRandomOrder()->first()->id;
            $guest = Guest::inRandomOrder()->first()->id;

            $total = $room->roomType->price + $room->services->sum('price');

            Booking::create([
                'check_in_date' => Carbon::now()->addDays($i),
                'check_out_date' => Carbon::now()->addDays($i + 3),
                'type' => $faker->randomElement(['web', 'call', 'counter']),
                'status' => $faker->numberBetween(0, 3),
                'total' => $total,
                'guest_id' =>  $guest,
                'created_by' => $user,
            ]);
        }
    }
}
