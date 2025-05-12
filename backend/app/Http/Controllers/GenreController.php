<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Services\GenreService;
use App\Models\Genre;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function __construct(public GenreService $service){
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->getAll();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        $validated = $request->validated();

        $genre = $this->service->createGenre($validated);

        return response()->json([
            'message' => 'Genre created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $genre)
    {
        $genre = $this->service->showGenre($genre);

        return response()->json([
            'data' => $genre
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
