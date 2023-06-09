<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\order;
use App\Models\User;
use App\Models\vechile;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supervisors = User::query()->where('role', '=', 2)->get();
        $drivers = Driver::all();
        $vechiles = vechile::all();

        $query = order::query();

        if(request()->has('supervisor') && !empty(request()->supervisor)) {
            $query = $query->where('id_supervisor', '=', request()->supervisor);
        }
        if(request()->has('driver') && !empty(request()->driver)) {
            $query = $query->where('id_driver', '=', request()->driver);
        }
        if(request()->has('vechile') && !empty(request()->vechile)) {
            $query = $query->where('id_vechile', '=', request()->vechile);
        }
        if(request()->has('status') && !empty(request()->status)) {
            $query = $query->where('status', '=', request()->status);
        }

        if(request()->has('datestart') && !empty(request()->datestart)) {
            $query = $query->where('date_start', '>', request()->datestart)
                        ->orWhere('date_end', '>', request()->datestart);
        }
        else if(request()->has('dateend') && !empty(request()->dateend)) {
            $query = $query->where('date_start', '<', request()->datestart)
                        ->orWhere('date_end', '<', request()->datestart);
        }
        else if(request()->has('datestart') && request()->has('dateend') && !empty(request()->dateend) && !empty(request()->datestart)) {
            $query = $query->whereBetween('date_start', [request()->datestart,request()->dateend]);
        }

        $data = $query->orderByDesc('created_at')->paginate(10);
        return view('order.order-list', compact('data', 'drivers', 'vechiles', 'supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supervisors = User::query()->where('role', '=', 2)->get();
        $drivers = Driver::all();
        $vechiles = vechile::all();
        return view('order.order-form', compact('drivers', 'vechiles', 'supervisors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_start' => 'required',
            'id_supervisor' => 'required',
            'id_driver' => 'required',
            'id_vechile' => 'required',
            'status' => 'required',
        ]);
        $request['fuel_usage'] = 0;
        order::create($request->all());
        return redirect()->route('order.index')->with('success','Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        $supervisors = User::query()->where('role', '=', 2)->get();
        $drivers = Driver::all();
        $vechiles = vechile::all();
        return view('order.order-form', compact('order', 'drivers', 'vechiles', 'supervisors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        $request->validate([
            'date_start' => 'required',
            'id_supervisor' => 'required',
            'id_driver' => 'required',
            'id_vechile' => 'required',
            'status' => 'required',
        ]);

        if(isset($request['confirm']) && $request['confirm'] == 1)
        {
            $request['status'] = 2;
        }
        else if(isset($request['confirm']) && $request['confirm'] == 0)
        {
            $request['status'] = 5;
        }

        if(isset($request['finish'])) $request['status'] = 4;
        
        $order->update($request->all());
        return redirect()->route('order.index')->with('success','Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success','Order deleted successfully');
    }
}
