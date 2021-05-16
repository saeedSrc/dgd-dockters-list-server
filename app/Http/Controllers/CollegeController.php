<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $college =  College::all();

        return $this->successResponse($college);
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
        $college = new College();
        $college->name = $request->name;
        $college->name_en = $request->name_en;

        try {
            $college->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($college);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function show(College $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function edit(College $college)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $college = College::findOrFail($id);
        $college->name = $request->name;
        $college->name_en = $request->name_en;
        try {
            $college->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($college);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = College::findOrFail($id);
        try {
            $college->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($college);
    }
}
