<?php

namespace App\Http\Controllers;

use App\Models\HoursOfWork;
use Illuminate\Http\Request;

class HoursOfWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $how = HoursOfWork::all();
       return $this->successResponse($how);
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
        $HOW  = new HoursOfWork();
        if ($request->saturday_start)
            $HOW->saturday_start = $request->saturday_start;
        if ($request->sunday_start)
        $HOW->sunday_start = $request->sunday_start;
        if ($request->monday_start)
        $HOW->monday_start = $request->monday_start;
        if ($request->thursday_start)
        $HOW->thursday_start = $request->thursday_start;
        if ($request->wednesday_start)
        $HOW->wednesday_start = $request->wednesday_start;
        if ($request->tuesday_start)
        $HOW->tuesday_start = $request->tuesday_start;
        if ($request->friday_start)
        $HOW->friday_start = $request->friday_start;

        if ($request->saturday_end)
        $HOW->saturday_end = $request->saturday_end;
        if ($request->sunday_end)
        $HOW->sunday_end = $request->sunday_end;
        if ($request->monday_end)
        $HOW->monday_end = $request->monday_end;
        if ($request->thursday_end)
        $HOW->thursday_end = $request->thursday_end;
        if ($request->wednesday_end)
        $HOW->wednesday_end = $request->wednesday_end;
        if ($request->tuesday_end)
        $HOW->tuesday_end = $request->tuesday_end;
        if ($request->friday_end)
        $HOW->friday_end = $request->friday_end;

        try {
            $HOW->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($HOW);
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

        $HOW = HoursOfWork::findOrFail($id);
        if ($request->saturday_start)
            $HOW->saturday_start = $request->saturday_start;
        if ($request->sunday_start)
            $HOW->sunday_start = $request->sunday_start;
        if ($request->monday_start)
            $HOW->monday_start = $request->monday_start;
        if ($request->thursday_start)
            $HOW->thursday_start = $request->thursday_start;
        if ($request->wednesday_start)
            $HOW->wednesday_start = $request->wednesday_start;
        if ($request->tuesday_start)
            $HOW->tuesday_start = $request->tuesday_start;
        if ($request->friday_start)
            $HOW->friday_start = $request->friday_start;

        if ($request->saturday_end)
            $HOW->saturday_end = $request->saturday_end;
        if ($request->sunday_end)
            $HOW->sunday_end = $request->sunday_end;
        if ($request->monday_end)
            $HOW->monday_end = $request->monday_end;
        if ($request->thursday_end)
            $HOW->thursday_end = $request->thursday_end;
        if ($request->wednesday_end)
            $HOW->wednesday_end = $request->wednesday_end;
        if ($request->tuesday_end)
            $HOW->tuesday_end = $request->tuesday_end;
        if ($request->friday_end)
            $HOW->friday_end = $request->friday_end;

        try {
            $HOW->save();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($HOW);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $HOW = HoursOfWork::findOrFail($id);
        try {
            $HOW->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($HOW);
    }
}
