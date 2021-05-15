<?php

namespace App\Http\Controllers;

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
       return SpecialTest::all();
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
        $st = new SpecialTest();
        $st->name = $request->name;
        $st->name_en = $request->name_en;
        if ($st->save())
            return $st;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecialTest  $specialTest
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialTest $specialTest)
    {
        return $specialTest;
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
    public function update(Request $request, $id)
    {

        $sp = SpecialTest::findOrFail($id);
        $sp->name = $request->name;
        $sp->name_en = $request->name_en;
       if($sp->save())
           return $sp;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecialTest  $specialTest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = SpecialTest::findOrFail($id);
        if ($sp->delete()) {
            return $sp;
        }
    }
}
