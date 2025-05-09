<?php

namespace App\Http\Controllers;

use App\Http\Services\PublisherService;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{

    public function __construct(public PublisherService $publisherService){
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = $this->publisherService->getAll();

        return response()->json([
            'data' => $publishers
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        //
    }
}
