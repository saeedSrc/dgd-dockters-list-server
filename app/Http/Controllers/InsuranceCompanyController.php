<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsuranceCompanyRequest;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;

class InsuranceCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $ic =  InsuranceCompany::all();
       return $this->successResponse($ic);
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
    public function store(InsuranceCompanyRequest $request)
    {
        $ic = new InsuranceCompany();
        $ic->name = $request->name;
        $ic->name_en = $request->name_en;
        $ic->type = $request->type;
        $ic->insurance_type = $request->insurance_type;
        try {
            $ic->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($ic);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InsuranceCompany  $insuranceCompany
     * @return \Illuminate\Http\Response
     */
    public function show(InsuranceCompany $insuranceCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InsuranceCompany  $insuranceCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(InsuranceCompany $insuranceCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InsuranceCompany  $insuranceCompany
     * @return \Illuminate\Http\Response
     */
    public function update(InsuranceCompanyRequest $request, $id)
    {
        $ic = InsuranceCompany::findOrFail($id);
        $ic->name = $request->name;
        $ic->name_en = $request->name_en;
        $ic->type = $request->type;
        $ic->insurance_type = $request->insurance_type;
        try {
            $ic->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($ic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InsuranceCompany  $insuranceCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ic = InsuranceCompany::findOrFail($id);
        try {
            $ic->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($ic);
    }
}
