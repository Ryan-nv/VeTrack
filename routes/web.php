<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VechileController;
use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'adminonly']], function () {
    Route::resources([
        'vechile' => VechileController::class,
        'driver' => DriverController::class
    ]);
    Route::resource('order', OrderController::class)->except('update');
});
Route::resource('order', OrderController::class)->middleware('auth')->only('update');



Route::controller(ExcelController::class)->group(function () {
    Route::get('export-order', 'exportOrder')->name('exportOrder');
});
