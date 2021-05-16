<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function errorResponse($e)
    {
        return response()
            ->json([
                'success' => false,
                'code'      =>  $e->getCode(),
                'message' => 'خطا در شبکه',
                'message_en'   =>  $e->getMessage(),
            ]);
    }


    public function successResponse($data)
    {
        return response()
            ->json([
                'success' => true,
                'data'      =>  $data,
            ]);
    }
}
