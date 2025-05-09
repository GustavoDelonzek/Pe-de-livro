<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Services\AuthorService;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(public AuthorService $authorService){
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->authorService->getAll()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $validated = $request->validated();
        $author = $this->authorService->createAuthor($validated);

        return response()->json([
            'data' => $author
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $author)
    {
        $author = $this->authorService->showAuthor($author);

        return response()->json([
            'data' => $author
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, int $author)
    {
        $validated = $request->validated();
        $author = $this->authorService->updateAuthor($author, $validated);

        return response()->json([
            'data' => $author
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
