<?php

namespace App\Http\Controllers;

use App\Models\ServiceFacility;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceFacilityRequest;

class ServiceFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ServiceFacility::get();
        return view('room_info.service_facility.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room_info.service_facility.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceFacilityRequest $request)
    {
        try{
            ServiceFacility::create($request->all());
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('room_info.service_facility.index')->with('success', 'New Service & Facility Successfully Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceFacility $serviceFacility)
    {
        dd($serviceFacility);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceFacility $serviceFacility)
    {
        return view('room_info.service_facility.create-edit', compact('serviceFacility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceFacilityRequest $request, ServiceFacility $serviceFacility)
    {
        try{
            $validated = $request->validated();
            $serviceFacility->update($validated);
        }
        catch(\Exception $e){
            dd($e);
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('room-info.service-facility.index')->with('success', 'Service & Facility Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceFacility $serviceFacility)
    {
        try{
            $serviceFacility->delete();
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('room-info.service-facility.index')->with('success', 'Service & Facility Successfully Deleted!');
    }
}
