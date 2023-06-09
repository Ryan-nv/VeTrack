<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ordercount = DB::table('orders')->count();
        $unprocessed = DB::table('orders')->where('status', 1)->count();
        $avg = DB::table('orders')->average('fuel_usage');
        $car = DB::table('vechiles')->count();
        $driver = DB::table('drivers')->count();

        return view('home', compact('ordercount', 'unprocessed', 'car', 'avg', 'driver'));
    }
}
