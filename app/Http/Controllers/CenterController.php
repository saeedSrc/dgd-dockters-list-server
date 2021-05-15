<?php

namespace App\Http\Controllers;

use App\Models\Center;
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
        return Center::all();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
