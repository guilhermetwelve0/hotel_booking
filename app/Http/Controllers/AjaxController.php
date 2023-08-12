<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AjaxController extends Controller
{
    public function searchRooms(Request $request)
    {
        $in = $request->check_in;
        $out = $request->check_out;
        if(!is_null($in) && !is_null($out)){
            $roomsWithoutBooking = Room::whereDoesntHave('bookings', function ($q) use ($in, $out) {
                $q->whereIn('status', ['pending', 'booked', 'checked in'])
                      ->where(function ($q) use ($in, $out) {
                          $q->where('check_in_date', '>=', $out)
                                ->orWhere('check_out_date', '<=', $in);
                      });
            })->get();
            return response()->json([$roomsWithoutBooking]);
        } else{
            return response()->json();
        }
    }
}
