<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Center;
use App\Models\Image;
use App\Models\CenterInsuranceCompany;
use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyCenter;
use App\Models\Phone;
use App\Models\SpecialDoctor;
use App\Models\CenterSpecialTest;
use Faker\Provider\PhoneNumber;
use Illuminate\Http\Request;


class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::with('images', 'phones', 'addresses', 'specialDoctors', 'specialTests', 'insuranceCompanies')->get();
        return $centers;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $center = new Center();
        $center->name = $request->name;
        $center->site = $request->site;
        $center->technical_manager_name = $request->technical_manager_name;
        $center->country_id = $request->country_id;
        $center->province_id = $request->province_id;
        $center->city_id = $request->city_id;
        $center->area = $request->area;
        $center->area_name = $request->area_name;
        $center->discount = $request->discount;
        $center->satisfaction = $request->satisfaction;
        $center->hours_of_work_id = $request->hours_of_work_id;
        $center->governmental_type = $request->governmental_type;
        $center->type_id = $request->type_id;
        $center->latitude = $request->latitude;
        $center->longitude = $request->longitude;
        $center->logo = $request->logo;
        if ($center->save())
            return $center;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Add phone to center.
     *
     * @param  int $center_id
     * @param  string $phone
     * @return \Illuminate\Http\Response
     */
    public function addPhone(Request $request, $id)
    {
        $type = $request->type;
        $phone = new Phone();
        $phone->phone = $request->phone;
        if ($type == 'centers') {
            $phone->center_id = $id;
        }

        if ($type == 'doctors') {
            // todo later
        }

        try {
            $phone->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($phone);
    }

    /**
     * Update center phone.
     *
     * @param  int $id
     * @param  string $phone
     * @return \Illuminate\Http\Response
     */
    public function updatePhone(Request $request, $id)
    {
        $phone = Phone::findOrFail($id);
        $phone->phone = $request->phone;

        try {
            $phone->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($phone);
    }

    /**
     * Delete center phone.
     *
     * @param  int $id
     * @param  string $phone
     * @return \Illuminate\Http\Response
     */
    public function deletePhone($id)
    {
        $phone = Phone::findOrFail($id);
        try {
            $phone->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($phone);
    }

    /**
     * Add address to center.
     *
     * @param  int $center_id
     * @param  string $address
     * @return \Illuminate\Http\Response
     */
    public function addAddress(Request $request, $id)
    {
        $type = $request->type;
        $address = new Address();
        $address->address = $request->address;
        $address->neighbourhood = $request->neighbourhood;
        if ($type == 'centers') {
            $address->center_id = $id;
        }

        if ($type == 'doctors') {
            // todo later
        }

        try {
            $address->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($address);
    }

    /**
     * Update center address.
     *
     * @param  int $id
     * @param  string $address
     * @return \Illuminate\Http\Response
     */
    public function updateAddress(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->address = $request->address;
        $address->neighbourhood = $request->neighbourhood;

        try {
            $address->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($address);
    }

    /**
     * Delete center address.
     *
     * @param  int $id
     * @param  string $address
     * @return \Illuminate\Http\Response
     */
    public function deleteAddress($id)
    {
        $address = Address::findOrFail($id);
        try {
            $address->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($address);
    }

    /**
     * Add special doctor to center.
     *
     * @param  int $center_id
     * @param  string $name
     * @return \Illuminate\Http\Response
     */
    public function addSpecialDoctor(Request $request, $id)
    {

        $sp = new SpecialDoctor();
        $sp->name = $request->name;
        $sp->center_id = $id;

        try {
            $sp->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($sp);
    }

    /**
     * Update center special doctor.
     *
     * @param  int $id
     * @param  string $name
     * @return \Illuminate\Http\Response
     */
    public function updateSpecialDoctor(Request $request, $id)
    {
        $sp = SpecialDoctor::findOrFail($id);
        $sp->name = $request->name;

        try {
            $sp->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($sp);
    }

    /**
     * Delete center special doctor.
     *
     * @param  int $id
     * @param  string $name
     * @return \Illuminate\Http\Response
     */
    public function deleteSpecialDoctor($id)
    {
        $sp = SpecialDoctor::findOrFail($id);
        try {
            $sp->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($sp);
    }

    /**
     * Add image to center.
     *
     * @param  int $image
     * @return \Illuminate\Http\Response
     */
    public function addImage(Request $request, $id)
    {
        $image = new Image();
        $type = $request->type;

        if ($type == 'centers') {
            if($request->hasFile('image')) {
                if($request->file('image')->isValid()) {
                    $path = time(). '-' . $request->file('image')->getClientOriginalName();
                    $request->file('image')->move(storage_path(config('constants.center_img_path')), $path);
                    $image->path = $path;
                    $image->center_id = $id;
                }
            }
        }


        try {
            $image->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($image);
    }

    /**
     * Delete center image.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);
        try {
            $image->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($image);
    }

    /**
     * Add insurance company to center.
     *
     * @param  int $center_id
     * @param  string $name
     * @return \Illuminate\Http\Response
     */
    public function addInsuranceCompanyCenter(Request $request, $id)
    {

        $icc = new CenterInsuranceCompany();
        $insurance_company_id = $request->insurance_company_id;
        $type = $request->type;

        if ($type == 'centers') {
            $icc->center_id = $id;
            $icc->insurance_company_id = $insurance_company_id;
        }

        if ($type == 'doctors') {
            // todo later
        }

        try {
            $icc->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($icc);
    }

    /**
     * Update center insurance company.
     *
     * @param  int $id
     * @param  string $name
     * @return \Illuminate\Http\Response
     */
    public function updateInsuranceCompanyCenter(Request $request, $id)
    {

        $icc = CenterInsuranceCompany::findOrFail($id);
        $insurance_company_id = $request->insurance_company_id;
        $type = $request->type;

        if ($type == 'centers') {
            $center_id = $request->center_id;
            $icc->center_id = $center_id;
            $icc->insurance_company_id = $insurance_company_id;
        }

        if ($type == 'doctors') {
            // todo later
        }

        try {
            $icc->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($icc);
    }

    /**
     * Delete center insurance company.
     *
     * @param  int $id
     * @param  string $name
     * @return \Illuminate\Http\Response
     */
    public function deleteInsuranceCompanyCenter($id)
    {
        $icc = CenterInsuranceCompany::findOrFail($id);
        try {
            $icc->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($icc);
    }

    /**
     * Add special test to center.
     *
     * @param  int $special_test_id
     * @return \Illuminate\Http\Response
     */
    public function addSpecialTestCenter(Request $request, $id)
    {

        $stc = new CenterSpecialTest();
        $special_test_id = $request->special_test_id;
        $stc->center_id = $id;
        $stc->special_test_id = $special_test_id;

        try {
            $stc->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($stc);
    }

    /**
     * Update center special test.
     *
     * @param  int $id
     * @param  string $center_id
     * @param  string $special_test_id
     * @return \Illuminate\Http\Response
     */
    public function updateSpecialTestCenter(Request $request, $id)
    {

        $stc = CenterSpecialTest::findOrFail($id);
        $stc->center_id =  $request->center_id;
        $stc->special_test_id = $request->special_test_id;;

        try {
            $stc->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($stc);
    }

    /**
     * Delete center special test.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSpecialTestCenter($id)
    {
        $stc = CenterSpecialTest::findOrFail($id);
        try {
            $stc->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($stc);
    }
}
