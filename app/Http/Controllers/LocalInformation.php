<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Province;

class LocalInformation extends Controller
{
    public function getProvinces(Request $request)
    {
       $provinces =  Province::all();

       return $this->successResponse($provinces);
    }

    public function getCities(Request $request)
    {
        $provinceId = $request->province;
        try {
            $province = Province::findOrFail($provinceId);
            $cities =  $province->cities;
        } catch (\Throwable $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse($cities);
    }


}
