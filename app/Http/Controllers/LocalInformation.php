<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Province;

class LocalInformation extends Controller
{
    public function getProvinces(Request $request)
    {
       return Province::all();
    }

    public function getCities(Request $request)
    {
        $provinceId = $request->province;
        $province = Province::Find($provinceId);
        return $province->cities;
    }


}
