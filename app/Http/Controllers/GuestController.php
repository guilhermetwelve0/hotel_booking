<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Http\Requests\GuestRequest;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::get();
        return view('setting.guest.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setting.guest.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuestRequest $request)
    {
        try{
            Guest::create($request->all());
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('setting.guest.index')->with('success', 'New Guest Successfully Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        return view('setting.guest.show', compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guest $guest)
    {
        return view('setting.guest.create-edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuestRequest $request, Guest $guest)
    {
        try{
            $validated = $request->validated();
            $guest->update($validated);
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('setting.guest.index')->with('success', 'Guest Info Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        try{
            $guest->delete();
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('setting.guest.index')->with('success', 'Guest Successfully Deleted!');
    }
}
