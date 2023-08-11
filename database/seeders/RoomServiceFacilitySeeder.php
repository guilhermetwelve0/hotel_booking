<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\ServiceFacility;

class RoomServiceFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomIds = Room::pluck('id')->toArray();
        $facilityIds = ServiceFacility::pluck('id')->toArray();

        foreach ($roomIds as $roomId) {
            shuffle($facilityIds);
            $randomFacilities = array_slice($facilityIds, 0, rand(1, 3)); // Randomly choose 1 to 3 facilities
            foreach ($randomFacilities as $facilityId) {
                DB::table('room_service_facility')->insert([
                    'room_id' => $roomId,
                    'service_facility_id' => $facilityId,
                ]);
            }
        }
    }
}
