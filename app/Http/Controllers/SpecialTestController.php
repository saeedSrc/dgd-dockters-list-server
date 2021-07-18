<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecialTestRequiredName;
use App\Http\Requests\UpdateRequest;
use App\Models\SpecialTest;
use Illuminate\Http\Request;

class SpecialTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sp =  SpecialTest::all();
       return $this->successResponse($sp);
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
    public function store(SpecialTestRequiredName $request)
    {
        $st = new SpecialTest();
        $st->name = $request->name;
        $st->name_en = $request->name_en;
        try {
          $st->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($st);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecialTest  $specialTest
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialTest $specialTest)
    {
//        return $specialTest;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecialTest  $specialTest
     * @return \Illuminate\Http\Response
     */
    public function edit(SpecialTest $specialTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpecialTest  $specialTest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {

        $st = SpecialTest::findOrFail($id);
        $st->name = $request->name;
        $st->name_en = $request->name_en;
        try {
            $st->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($st);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecialTest  $specialTest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $st = SpecialTest::findOrFail($id);
        try {
            $st->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($st);
    }
}
