<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\SpecialDoctor;
use Illuminate\Http\Request;

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
        //
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
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }


    /**
     * Add specialty to doctor.
     *
     * @param  int $specialty_id
     * @return \Illuminate\Http\Response
     */
    public function addSpecialityDoctor(Request $request, $id)
    {

        $sd = new SpecialDoctor();
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
        $sd = SpecialDoctor::findOrFail($id);
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
        $sd = SpecialDoctor::findOrFail($id);
        try {
            $sd->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($sd);
    }
}
