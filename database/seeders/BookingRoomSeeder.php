<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Room;

class BookingRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = Booking::all();
        $rooms = Room::all();

        foreach ($bookings as $booking) {
            $randomRooms = $rooms->random(mt_rand(1, 3));
            $booking->rooms()->attach($randomRooms);
        }
    }
}
