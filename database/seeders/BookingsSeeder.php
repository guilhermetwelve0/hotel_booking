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

            $daysOffset = $faker->numberBetween(-10, 10);
            $checkInDate = Carbon::now()->addDays($daysOffset);
            $checkOutDate = $checkInDate->copy()->addDays($faker->numberBetween(1, 7));

            if($checkInDate->isBefore(Carbon::now()) && $checkOutDate->isAfter(Carbon::now())){
                $status = 2;
            } elseif ($checkInDate->isBefore(Carbon::now()) && $checkOutDate->isBefore(Carbon::now())){
                $status = 3;
            } else{
                $status = $faker->randomElement([0, 1]);
            }

            Booking::create([
                'check_in_date' => $checkInDate,
                'check_out_date' => $checkOutDate,
                'type' => $faker->randomElement(['web', 'call', 'counter']),
                'status' => $status,
                'total' => $total,
                'guest_id' =>  $guest,
                'created_by' => $user,
            ]);
        }
    }
}
