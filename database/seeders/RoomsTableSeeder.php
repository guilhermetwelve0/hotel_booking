<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [];

        $floors = 5;
        $rpf = 5;

        for ($i = 1; $i <= $floors; $i++) {
            for ($j = 1; $j <= $rpf; $j++) {
                $room = [
                    'floor' => $i,
                    'room_no' => str_pad($j, 2, '0', STR_PAD_LEFT),
                    'room_type_id' => rand(1, 10),
                ];
                $rooms[] = $room;
            }
        }


        foreach ($rooms as $data) {
            $room = new Room();
            $room->fill($data);
            $room->save();
        }
    }
}
