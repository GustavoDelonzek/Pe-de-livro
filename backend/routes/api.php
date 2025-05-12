<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{author}', [AuthorController::class, 'show']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::put('/authors/{author}', [AuthorController::class, 'update']);
Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);

Route::get('/publishers', [PublisherController::class, 'index']);
Route::post('/publishers', [PublisherController::class, 'store']);
Route::get('/publishers/{publisher}', [PublisherController::class, 'show']);
Route::put('/publishers/{publisher}', [PublisherController::class, 'update']);
Route::delete('/publishers/{publisher}', [PublisherController::class, 'destroy']);

Route::apiResource('books', BookController::class);
Route::apiResource('genres', GenreController::class);

Route::middleware('auth:api')->group(function(){

});

