<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Services\BookService;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(public BookService $service){
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "data" => $this->service->getAll()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();
        $book = $this->service->createBook($validated);

        return response()->json([
            "data" => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $book)
    {
        $book = $this->service->showBook($book);

        return response()->json([
            "data" => $book
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, int $book)
    {
        $validated = $request->validated();
        $book = $this->service->updateBook($book, $validated);

        return response()->json([
            "message" => "Book updated successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $book)
    {
        $book = $this->service->deleteBook($book);

        return response()->json([
            "message" => "Book deleted successfully"
        ], 200);
    }
}
