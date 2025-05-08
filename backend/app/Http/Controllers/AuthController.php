<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(public UserService $userService){
    }

    public function login(LoginRequest $request){
        $credetentials = $request->validated();

        if(!$token = JWTAuth::attempt($credetentials)){
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $token]);
    }

    public function register(RegisterRequest $request){
        $registration = $request->validated();

        $user = $this->userService->createUser($registration);

        return response()->json(
            [
                'message' => 'Registration successful',
                'user' => $user
            ], 201
        );
    }

}
