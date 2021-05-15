<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalInformation;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CenterTypeController;
use App\Http\Controllers\HoursOfWorkController;
use App\Http\Controllers\SpecialTestController;
use App\Http\Controllers\InsuranceCompanyController;

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

// url parameters: province(int)
Route::get('/cities', [LocalInformation::class, 'getCities']);

////////////////////center_types//////////////////////////////////
// request:
Route::get('/center_types', [CenterTypeController::class, 'index']);

// request: name(string) name_en(string)
Route::post('/center_type', [CenterTypeController::class, 'store']);

// request: name(string) name_en(string)  _method = put
Route::put('/center_type/{id}', [CenterTypeController::class, 'update']);

//  _method = delete
Route::delete('/center_type/{id}', [CenterTypeController::class, 'destroy']);
////////////////////center_types//////////////////////////////////



///////////////// special tests////////////////////////////////////////////////
// request:
Route::get('/special_tests', [SpecialTestController::class, 'index']);

// request: name(string) name_en(string)
Route::post('/special_test', [SpecialTestController::class, 'store']);

// request: name(string) name_en(string) _method = put
Route::put('/special_test/{id}', [SpecialTestController::class, 'update']);

// request: _method = delete
Route::delete('/special_test/{id}', [SpecialTestController::class, 'destroy']);
///////////////// special tests////////////////////////////////////////////////


////////// hours of works ///////////////////////////////
// request:
Route::get('/hours_of_works', [HoursOfWorkController::class, 'index']);

// request: 'saturday_start', 'saturday_end', 'sunday_start', 'sunday_end', 'monday_start', 'monday_end', 'thursday_start', 'thursday_end', 'wednesday_start', 'wednesday_end', 'tuesday_start', 'end_start', 'friday_start', 'friday_end'(int)
Route::post('/hours_of_work', [HoursOfWorkController::class, 'store']);

// request: 'saturday_start', 'saturday_end', 'sunday_start', 'sunday_end', 'monday_start', 'monday_end',
// 'thursday_start', 'thursday_end', 'wednesday_start', 'wednesday_end', 'tuesday_start', 'end_start',
// 'friday_start', 'friday_end'(int) method = put
Route::put('/hours_of_work/{id}', [HoursOfWorkController::class, 'update']);

// request: _method = delete
Route::delete('/hours_of_work/{id}', [HoursOfWorkController::class, 'destroy']);
////////// hours of works ///////////////////////////////


////////// insurance companies ///////////////////////////////
// request:
Route::get('/insurance_companies', [InsuranceCompanyController::class, 'index']);

// request: name(string) name_en(string)
Route::post('/insurance_company', [InsuranceCompanyController::class, 'store']);

// request: name(string) name_en(string) method = put
Route::put('/insurance_company/{id}', [InsuranceCompanyController::class, 'update']);

// request: _method = delete
Route::delete('/insurance_company/{id}', [InsuranceCompanyController::class, 'destroy']);
////////// hours of works ///////////////////////////////


////////////////////centers//////////////////////////////

// request:
Route::get('/centers', [CenterController::class, 'index']);

// request:
Route::post('/center', [CenterController::class, 'store']);

////////////////////centers//////////////////////////////

