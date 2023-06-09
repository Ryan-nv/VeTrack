<?php

namespace App\Http\Controllers;

use App\Models\vechile;
use Illuminate\Http\Request;

class VechileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = vechile::query();

        if(request()->has('type') && !empty(request()->type)) {
            $query = $query->where('type', '=', request()->type);
        }
        if(request()->has('status') && !empty(request()->status)) {
            $query = $query->where('status', '=', request()->status);
        }

        if(request()->has('datestart') && !empty(request()->datestart)) {
            $query = $query->where('service_date', '>', request()->datestart);
        }
        else if(request()->has('dateend') && !empty(request()->dateend)) {
            $query = $query->where('service_date', '<', request()->dateend);
        }
        else if(request()->has('datestart') && request()->has('dateend') && !empty(request()->dateend) && !empty(request()->datestart)) {
            $query = $query->whereBetween('service_date', [request()->datestart,request()->dateend]);
        }

        if(request()->has('search' && !empty(request()->search))) {
            $query = $query
                ->where('name', 'like', '%' . request()->search . '%')
                ->orWhere('license_num', 'like', '%' . request()->search . '%');
        }

        $data = $query->orderByDesc('created_at')->paginate(10);
        return view('vechile.vechile-list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vechile.vechile-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'license_num' => 'required',
            'type' => 'required'
        ]);

        vechile::create($request->all());
        return redirect()->route('vechile.index')->with('success','Vechile created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(vechile $vechile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vechile $vechile)
    {
        return view('vechile.vechile-form', compact('vechile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vechile $vechile)
    {
        $request->validate([
            'name' => 'required',
            'license_num' => 'required',
            'type' => 'required'
        ]);

        $vechile->update($request->all());
        return redirect()->route('vechile.index')->with('success','Vechile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vechile $vechile)
    {
        $vechile->delete();
        return redirect()->route('vechile.index')->with('success','Vechile deleted successfully');
    }
}
