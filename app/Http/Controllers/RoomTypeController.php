<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = RoomType::get();
        return view('room_info.room_type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room_info.room_type.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            RoomType::create($request->all());
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('room_info.room_type.index')->with('success', 'New Room Type Successfully Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomType $roomType)
    {
        dd($roomType);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomType $roomType)
    {
        return view('room_info.room_type.create-edit', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomType $roomType)
    {
        try{
            $validated = $request->validated();
            $roomType->update($validated);
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('room-info.room-type.index')->with('success', 'Room Type Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomType $roomType)
    {
        try{
            $roomType->delete();
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('room-info.room-type.index')->with('success', 'Room Type Successfully Deleted!');
    }
}
