<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:api');
//    }

    public function search(Request $request)
    {
        $type = $request->type;
        if (!$type) {
            $type = 'centers';
        }

        $category_id = $request->type_id;

         $res = [];
        if ($type == 'centers')
        {
            if($category_id)
            {
                $res = Center::with('images', 'phones', 'addresses', 'specialTests', 'insuranceCompanies', 'doctors' ,  'country', 'province', 'city', 'centerType')->where('type_id', $category_id)->get();
            } else {
                $res = Center::with('images', 'phones', 'addresses', 'specialTests', 'insuranceCompanies', 'doctors' ,  'country', 'province', 'city', 'centerType')->get();
            }

        }


        return $this->successResponse($res);
    }
}
