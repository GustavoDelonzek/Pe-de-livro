<?php

namespace App\Http\Repositories;

use App\Models\Review;

class ReviewRepository{
    public function getAll(){
        return Review::query();
    }

    public function createReview(array $review){
        return Review::create($review);
    }

    public function getReviewById(int $id){
        return Review::where('id', $id);
    }

    public function updateReview(array $review, int $id){
        return Review::where('id', $id)->update($review);
    }

    public function deleteReview(int $id){
        return Review::where('id', $id)->delete();
    }

    public function getReviewByBookId(int $bookId){
        return Review::where('book_id', $bookId);
    }
}
