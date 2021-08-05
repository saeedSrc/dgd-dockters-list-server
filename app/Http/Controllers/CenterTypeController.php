<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequiredName;
use App\Http\Requests\UpdateRequest;
use App\Models\CenterType;
use Illuminate\Http\Request;

class CenterTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ct =  CenterType::all();

        return $this->successResponse($ct);
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
    public function store(RequiredName $request)
    {
        $centerType = new CenterType();
        $centerType->name = $request->name;
        $centerType->name_en = $request->name_en;

        try {
            $centerType->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($centerType);
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
    public function update(UpdateRequest $request, $id)
    {
     $ct = CenterType::findOrFail($id);
        $ct->name = $request->name;
        $ct->name_en = $request->name_en;
        try {
            $ct->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($ct);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ct = CenterType::findOrFail($id);
        try {
            $ct->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($ct);
    }
}
