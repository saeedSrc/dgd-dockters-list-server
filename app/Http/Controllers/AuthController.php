<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'username' => 'required',
            'password' => 'required|string'
        ]);

        if($validator->failed()) {
            return response()->json($validator->errors(), 400);
        }

        $token_validity =  24 * 60 * 1000;

        $this->guard()->factory()->setTTL($token_validity);

        if(! $token = $this->guard()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token) {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'token_validity' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    protected function guard() {
        return Auth::guard();
    }

    public function refresh() {
        return $this->respondWithToken($this->guard()->refresh());
    }
}
