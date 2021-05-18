<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSpecialty;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::with('images', 'phones', 'addresses', 'specialties')->get();
        return $this->successResponse($doctors);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->site = $request->site;
        $doctor->system_medicine_number = $request->system_medicine_number;
        $doctor->country_id = $request->country_id;
        $doctor->province_id = $request->province_id;
        $doctor->city_id = $request->city_id;
        $doctor->area = $request->area;
        $doctor->area_name = $request->area_name;
        $doctor->work_experience = $request->work_experience;
        $doctor->satisfaction = $request->satisfaction;
        $doctor->has_office = $request->has_office;
        $doctor->latitude = $request->latitude;
        $doctor->longitude = $request->longitude;
        $doctor->college_id = $request->college_id;
        try {
            $doctor->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($doctor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor  = Doctor::findOrFail($id);
        $doctor->name = $request->name;
        $doctor->site = $request->site;
        $doctor->system_medicine_number = $request->system_medicine_number;
        $doctor->country_id = $request->country_id;
        $doctor->province_id = $request->province_id;
        $doctor->city_id = $request->city_id;
        $doctor->area = $request->area;
        $doctor->area_name = $request->area_name;
        $doctor->work_experience = $request->work_experience;
        $doctor->satisfaction = $request->satisfaction;
        $doctor->has_office = $request->has_office;
        $doctor->latitude = $request->latitude;
        $doctor->longitude = $request->longitude;
        try {
            $doctor->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        try {
            $doctor->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($doctor);
    }


    /**
     * Add specialty to doctor.
     *
     * @param  int $specialty_id
     * @return \Illuminate\Http\Response
     */
    public function addSpecialityDoctor(Request $request, $id)
    {

        $sd = new DoctorSpecialty();
        $sd->doctor_id = $id;
        $sd->specialty_id = $request->specialty_id;

        try {
            $sd->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($sd);
    }

    /**
     * Update specialty doctor.
     *
     * @param  int $id
     * @param  string $doctor_id
     * @param  string $specialty_id
     * @return \Illuminate\Http\Response
     */
    public function updateSpecialityDoctor(Request $request, $id)
    {
        $sd = DoctorSpecialty::findOrFail($id);
        $sd->specialty_id = $request->specialty_id;
        $sd->doctor_id = $request->doctor_id;


        try {
            $sd->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($sd);
    }

    /**
     * Delete specialty doctor.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSpecialityDoctor($id)
    {
        $sd = DoctorSpecialty::findOrFail($id);
        try {
            $sd->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($sd);
    }
}
