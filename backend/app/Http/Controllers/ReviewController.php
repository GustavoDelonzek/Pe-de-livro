<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Services\ReviewService;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct(public ReviewService $service){
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->service->getAll()
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        $validated = $request->validated();

        $review = $this->service->createReview($validated, Auth::user());

        return response()->json([
            'message' => 'Review created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $review)
    {
        $review = $this->service->showReview($review);

        return response()->json([
            'data' => $review
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, int $review)
    {
        $validated = $request->validated();
        $review = $this->service->updateReview($review, $validated, Auth::user());

        return response()->json([
            'message' => 'Review updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $review)
    {
        $review = $this->service->deleteReview($review, Auth::user());

        return response()->json([
            'message' => 'Review deleted successfully'
        ], 200);
    }
}
