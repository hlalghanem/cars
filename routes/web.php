<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

//Route::resource('/cars', CarsController::class);
Route::get('/filter', [CarsController::class, 'filter']);
Route::get('get-states', [CarsController::class, 'getStates'])->name('getStates');


//Auth::routes();

//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

