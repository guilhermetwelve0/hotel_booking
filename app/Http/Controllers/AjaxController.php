<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;

class AjaxController extends Controller
{
    public function searchRooms(Request $request)
    {
        $in = Carbon::parse($request->check_in)->toDateString();
        $out = Carbon::parse($request->check_out)->toDateString();
        if(!is_null($in) && !is_null($out)){
            $roomsWithoutBooking = Room::with("roomType", "services")->whereDoesntHave('bookings', function ($q) use ($in, $out) {
                $q->whereIn('status', [0,1,2])
                    ->where(function ($q) use ($in, $out) {
                        $q->where(function ($q) use ($in) {
                            $q->where('check_in_date', '<', $in);
                            $q->orWhere('check_out_date', '<', $in);
                        })->orWhere(function ($q) use ($out) {
                            $q->where('check_out_date', '<', $out);
                            $q->orWhere('check_in_date', '<', $out);
                        });
                    });
            })->get();
            return response()->json($roomsWithoutBooking);
        } else{
            return response()->json();
        }
    }
    public function updateStatus(Request $request)
    {
        $booking = Booking::find($request->booking_id);
        $update = $booking->update(['status' => $request->status_id]);
        return response()->json($update);
    }
}
