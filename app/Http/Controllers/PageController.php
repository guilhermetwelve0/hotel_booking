<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Booking;
use Carbon\Carbon;

class PageController extends Controller
{
    public function landing(Request $request)
    {
        $bestRooms = Room::with('roomType', 'services')
                        ->select('rooms.*')
                        ->selectRaw('COALESCE(room_types.price + SUM(service_facilities.price), 0) AS total_price')
                        ->join('room_types', 'rooms.room_type_id', '=', 'room_types.id')
                        ->join('room_service_facility', 'rooms.id', '=', 'room_service_facility.room_id')
                        ->join('service_facilities', 'room_service_facility.service_facility_id', '=', 'service_facilities.id')
                        ->groupBy('rooms.id', 'rooms.floor', 'rooms.room_no', 'rooms.room_type_id', 'rooms.created_at', 'rooms.updated_at','room_types.price')
                        ->take(3)
                        ->get();

        // dd($bestRooms);
        return view('web.landing', compact('bestRooms'));
    }
    public function about()
    {
        return view('web.about');
    }
    public function contact()
    {
        return view('web.contact');
    }

    public function guestInfoAdd(Request $request)
    {
        try{
            $old_guest = Guest::where('name', $request['name'])->orWhere('email', $request['email'])->first();
            if($old_guest){
                $guest = $old_guest;
            } else{
                $guest = Guest::create($request->all());
            }
            session(['guest_id'=>$guest->id]);

            return redirect()->route('guest-booking');
        }
        catch(\Exception $e){
            dd($e);
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

    }

    public function guestBooking()
    {
        if(session()->has('guest_id')){
            $guest_id = session('guest_id');

            $guest = Guest::find($guest_id);
            if($guest){
                return view('web.booking-list', compact('guest'));
            }else{
                return view('web.register-guest');
            }
        } else {
            return view('web.register-guest');
        }
    }

    public function guestBookingAdd(Request $request)
    {
        try{
            if(!is_null($request->guest_id)){
                $request['guest_id'] = $request->guest_id;
            } else {
                $old_guest = Guest::where('name', $request['name'])->orWhere('email', $request['email'])->first();
                if($old_guest){
                    $old_guest->update($request->only(['name', 'email', 'phone']));
                    $guest = $old_guest;
                } else{
                    $guest = Guest::create($request->only(['name', 'email', 'phone']));
                }
                $request['guest_id'] = $guest->id;
            }

            $request['check_in_date'] = Carbon::parse($request['check_in_date'])->toDateString();
            $request['check_out_date'] = Carbon::parse($request['check_out_date'])->toDateString();
            $request['type'] = "web";

            $booking = Booking::create($request->all());
            $rooms = $request->input('rooms', []);
            $booking->rooms()->attach($rooms);

            session(['guest_id'=>$guest->id]);

            return redirect()->route('landing')->with('success', 'New Booking Successfully Created!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('success', 'Reserva feita');
        }
    }

    public function changeGuest()
    {
        session()->forget('guest_id');
        return redirect()->route('guest-booking');
    }

    public function roomList()
    {
        $rooms = Room::with('roomType', 'services')
            ->select('rooms.*')
            ->selectRaw('COALESCE(room_types.price + SUM(service_facilities.price), 0) AS total_price')
            ->join('room_types', 'rooms.room_type_id', '=', 'room_types.id')
            ->join('room_service_facility', 'rooms.id', '=', 'room_service_facility.room_id')
            ->join('service_facilities', 'room_service_facility.service_facility_id', '=', 'service_facilities.id')
            ->groupBy('rooms.id', 'rooms.floor', 'rooms.room_no', 'rooms.room_type_id', 'rooms.created_at', 'rooms.updated_at','room_types.price')
            ->get();
        return view('web.rooms', compact('rooms'));
    }
}
