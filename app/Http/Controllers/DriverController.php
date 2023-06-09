<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Driver::query();
        if(request()->has('search') && !empty(request()->search))
        {
            $data
                ->where('name', 'like', '%' . request()->search . '%')
                ->orWhere('driver_lc', 'like', '%' . request()->search . '%');
        }
        if(request()->has('status') && !empty(request()->status))
            $data->where('status', '=', request()->status);

        $data = $data->orderByDesc('created_at')->paginate(10);
        $request = request();
        return view('driver.driver-list', compact('data', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('driver.driver-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'driver_lc' => 'required',
            'status' => 'required'
        ]);

        Driver::create($request->all());
        return redirect()->route('driver.index')->with('success','Driver updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        $edit = true;
        return view('driver.driver-form', compact('driver', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required',
            'driver_lc' => 'required',
            'status' => 'required'
        ]);

        $driver->update($request->all());
        return redirect()->route('driver.index')->with('success','Driver updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('driver.index')->with('success','Driver deleted successfully');
    }
}
