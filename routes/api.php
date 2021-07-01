<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalInformation;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CenterTypeController;
use App\Http\Controllers\HoursOfWorkController;
use App\Http\Controllers\SpecialTestController;
use App\Http\Controllers\InsuranceCompanyController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\DoctorController;

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
Route::get('/cities/{province_id}', [LocalInformation::class, 'getCities']);

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

// request: name(string) name_en(string), type
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
Route::get('/centers_by_type/{type_id}', [CenterController::class, 'getCentersByType']);

// request: name, site, technical_manager_name, country_id,province_id, city_id,
// area, area_name, discount, satisfaction, hours_of_work_id, governmental_type, type_id, latitude, longitude, logo
Route::post('/center', [CenterController::class, 'store']);

// request: name, site, technical_manager_name, country_id,province_id, city_id,
// area, area_name, discount, satisfaction, hours_of_work_id, governmental_type, type_id, latitude, longitude, logo, method = put
Route::put('/center/{id}', [CenterController::class, 'update']);

// request: method = delete
Route::delete('/center/{id}', [CenterController::class, 'destroy']);




//////////////// center phone //////////////////////////////////////////////////
// request: type: centers or doctors, phone  ** center_id could be doctor_id
Route::post('/phone/{center_id}', [CenterController::class, 'addPhone']);

// request: phone(string) , method = put
Route::put('/phone/{id}', [CenterController::class, 'updatePhone']);

// request: method = delete
Route::delete('/phone/{id}', [CenterController::class, 'deletePhone']);
/////////////////////////center phones/////////////////////////////////////////////////////


//////////////// center address //////////////////////////////////////////////////
// request: type: centers or doctors, address , neighbourhood
Route::post('/address/{center_id}', [CenterController::class, 'addAddress']);

// request: address(string), neighbourhood , method = put
Route::put('/address/{id}', [CenterController::class, 'updateAddress']);

// request:  method = delete
Route::delete('/address/{id}', [CenterController::class, 'deleteAddress']);
/////////////////////////center address /////////////////////////////////////////////////////



/////////////////////////// center images //////////////////////////////////////

// request: type: centers or doctors , image(file)  ** center_id could be doctor_id
Route::post('/image/{center_id}', [CenterController::class, 'addImage']);

// request:  method = delete
Route::delete('/image/{id}', [CenterController::class, 'deleteImage']);

/////////////////////////// center images //////////////////////////////////////




//////////////// center special doctors //////////////////////////////////////////////////
// request: type: centers , name
Route::post('/special_doctor/{center_id}', [CenterController::class, 'addSpecialDoctor']);

// request: name(string) , method = put
Route::put('/special_doctor/{id}', [CenterController::class, 'updateSpecialDoctor']);

// request:  method = deletimagee
Route::delete('/special_doctor/{id}', [CenterController::class, 'deleteSpecialDoctor']);
/////////////////////////center special doctors /////////////////////////////////////////////////////




//////////////// center insurance_companies //////////////////////////////////////////////////
// request: insurance_company_id
Route::post('/insurance_company_center/{center_id}', [CenterController::class, 'addInsuranceCompanyCenter']);

// request: center_id, insurance_company_id , method = put
Route::put('/insurance_company_center/{id}', [CenterController::class, 'updateInsuranceCompanyCenter']);

// request:  method = delete
Route::delete('/insurance_company_center/{id}', [CenterController::class, 'deleteInsuranceCompanyCenter']);
/////////////////////////center special doctors /////////////////////////////////////////////////////


//////////////// center special_test_center //////////////////////////////////////////////////
// request:  special_test_id
Route::post('/special_test_center/{center_id}', [CenterController::class, 'addSpecialTestCenter']);

// request:  special_test_id, center_id , method = put
Route::put('/special_test_center/{id}', [CenterController::class, 'updateSpecialTestCenter']);

// request:  method = delete
Route::delete('/special_test_center/{id}', [CenterController::class, 'deleteSpecialTestCenter']);
/////////////////////////center special doctors /////////////////////////////////////////////////////

////////////////////centers//////////////////////////////



//////////////////////doctors /////////////////////////////////////////////////////////


////////// doctor college ///////////////////////////////
// request:
Route::get('/colleges', [CollegeController::class, 'index']);

// request: name,  name_en
Route::post('/college', [CollegeController::class, 'store']);

// request: name, name_en, method = put
Route::put('/college/{id}', [CollegeController::class, 'update']);

// request: _method = delete
Route::delete('/college/{id}', [CollegeController::class, 'destroy']);
////////// doctor college ///////////////////////////////




//////////doctor speciality ///////////////////////////////
// request:
Route::get('/specialties', [SpecialtyController::class, 'index']);

// request: name,  name_en
Route::post('/specialty', [SpecialtyController::class, 'store']);

// request: name, name_en, method = put
Route::put('/specialty/{id}', [SpecialtyController::class, 'update']);

// request: _method = delete
Route::delete('/specialty/{id}', [SpecialtyController::class, 'destroy']);
////////// doctor speciality ///////////////////////////////



//////////////// doctor speciality //////////////////////////////////////////////////
// request:  specialty_id
Route::post('/doctor_specialty/{doctor_id}', [DoctorController::class, 'addSpecialityDoctor']);

// request: doctor_id, specialty_id , method = put
Route::put('/doctor_specialty/{id}', [DoctorController::class, 'updateSpecialityDoctor']);

// request:  method = delete
Route::delete('/doctor_specialty/{id}', [DoctorController::class, 'deleteSpecialityDoctor']);
/////////////////////////center special doctors /////////////////////////////////////////////////////


// request:
Route::get('/doctors', [DoctorController::class, 'index']);

// request: name, site, system_medicine_number, work_experience,has_office, country_id, province_id, college_id, city_id,
// area, area_name, satisfaction, hours_of_work_id, latitude, longitude, logo
Route::post('/doctor', [DoctorController::class, 'store']);

// request: name, site, technical_manager_name, country_id,province_id, city_id,
// area, area_name, discount, satisfaction, hours_of_work_id, governmental_type, type_id, latitude, longitude, logo, method = put
Route::put('/doctor/{id}', [DoctorController::class, 'update']);

// request: method = delete
Route::delete('/doctor/{id}', [DoctorController::class, 'destroy']);
//////////////////////doctors /////////////////////////////////////////////////////////

