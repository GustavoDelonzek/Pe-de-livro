<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenrePreferenceRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(public UserService $userService){

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->userService->getAll()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeGenrePreference(StoreGenrePreferenceRequest $request)
    {
        $validated = $request->validated();

        $this->userService->storeGenrePreference($validated, Auth::user());
        return response()->json([
            'data' => 'Preference added successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function showMe()
    {
        return response()->json([
            'data' => $this->userService->showMe(Auth::user())
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateMe(UpdateUserRequest $request)
    {
        $validated = $request->validated();

        $this->userService->updateUser(Auth::user(), $validated);

        return response()->json([
            'data' => 'User updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyMe()
    {
        $this->userService->deleteUser(Auth::user());

        return response()->json([
            'data' => 'User deleted successfully'
        ], 200);
    }
}
