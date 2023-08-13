<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\ServiceFacility;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::orderBy('floor')->orderBy('room_no')->get();
        return view('room_info.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room_types = RoomType::get();
        $services_facilities = ServiceFacility::get();
        return view('room_info.room.create-edit', compact('room_types', 'services_facilities'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(RoomRequest $request)
    {
        try{
            $exist = Room::where('floor', $request->floor)->where('room_no', $request->room_no)->first();
            if(!$exist){
                $room = Room::create($request->all());
                $facilities = $request->input('services_facilities', []);
                $room->services()->attach($facilities);
            } else{
                return redirect()->back()->with('error', 'This Room Already Exist!');
            }
        }
        catch(\Exception $e){
            dd($e);
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('room-info.room.index')->with('success', 'New Room Successfully Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $room_types = RoomType::get();
        $services_facilities = ServiceFacility::get();
        return view('room_info.room.create-edit', compact('room', 'room_types', 'services_facilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, Room $room)
    {
        try{
            $validated = $request->validated();

            $exist = Room::where('floor', $request->floor)->where('room_no', $request->room_no)->first();

            if(!$exist || $exist->id == $room->id){
                $room->update($validated);
                $facilities = $request->input('services_facilities', []);
                $room->services()->sync($facilities);
            } else{
                return redirect()->back()->with('error', 'This Room Already Exist!');
            }
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('room-info.room.index')->with('success', 'Room Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        try{
            $room->delete();
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('room-info.room.index')->with('success', 'Room Successfully Deleted!');
    }
}
