<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Province;

class LocalInformation extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getProvinces(Request $request)
    {
       $provinces =  Province::all();

       return $this->successResponse($provinces);
    }

    public function getCities($provinceId)
    {

        if($provinceId == null) {
            $provinceId = 1;
        }
        try {
            $province = Province::findOrFail($provinceId);

            $cities =  $province->cities;
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($cities);
    }


}
