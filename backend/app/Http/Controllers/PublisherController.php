<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
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
    public function store(StorePublisherRequest $request)
    {
        $validated = $request->validated();

        $publisher = $this->publisherService->createPublisher($validated);

        return response()->json([
            'data' => $publisher
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $publisher)
    {
        $publisher = $this->publisherService->showPublisher($publisher);

        return response()->json([
            'data' => $publisher
        ], 200);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request, int $publisher)
    {
        $validated = $request->validated();
        $publisher = $this->publisherService->updatePublisher($publisher, $validated);

        return response()->json([
            'message' => 'Publisher updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        //
    }
}
