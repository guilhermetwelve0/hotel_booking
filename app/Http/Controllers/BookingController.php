<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Guest;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::orderBy('check_in_date', 'desc')->orderBy('check_out_date')->get();
        return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guests = Guest::get();
        return view('booking.create', compact('guests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validated();
            $validated['check_in_date'] = Carbon::parse($validated['check_in_date'])->toDateString();
            $validated['check_out_date'] = Carbon::parse($validated['check_out_date'])->toDateString();
            $booking = Booking::create($validated);
            $rooms = $request->input('rooms', []);
            $booking->rooms()->attach($rooms);

        }
        catch(\Exception $e){
            dd($e);
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('booking.index')->with('success', 'New Booking Successfully Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        dd('edit');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        dd('update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        try{
            $booking->delete();
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('booking.index')->with('success', 'Successfully Cancel Booking!');
    }

    public function canceledList()
    {
        $bookings = Booking::orderBy('check_in_date', 'desc')->orderBy('check_out_date')->onlyTrashed()->get();
        return view('booking.canceled-list', compact('bookings'));
    }
}
