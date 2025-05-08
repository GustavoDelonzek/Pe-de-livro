<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(public UserService $service){
    }

    public function login(Request $request){
        $credetentials = $request->validate();

        if(!$token = JWTAuth::attempt($credetentials)){
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $token]);
    }

}
