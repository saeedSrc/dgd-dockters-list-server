<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalInformation;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CenterTypeController;
use App\Http\Controllers\HouseOfworkController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/provinces', [LocalInformation::class, 'getProvinces']);

// request: province(int)
Route::get('/cities', [LocalInformation::class, 'getCities']);

// request:
Route::get('/centers', [CenterController::class, 'index']);

// request: name(string) name_en(string)
Route::post('/center_type', [CenterTypeController::class, 'store']);


// request: 'saturday_start', 'saturday_end', 'sunday_start', 'sunday_end', 'monday_start', 'monday_end', 'thursday_start', 'thursday_end', 'wednesday_start', 'wednesday_end', 'tuesday_start', 'end_start', 'friday_start', 'friday_end'(int)
Route::post('/house_of_work', [HouseOfworkController::class, 'store']);




