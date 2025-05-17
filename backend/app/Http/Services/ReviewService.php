<?php

namespace App\Http\Services;

use App\Http\Repositories\ReviewRepository;
use App\Http\Traits\CanLoadRelationships;
use App\Models\User;
use Exception;

class ReviewService{
    use CanLoadRelationships;
    private $relations = ['book'];

    public function __construct(public ReviewRepository $repository){
    }

    public function getAll(){
        $reviewsQuery = $this->repository->getAll();

        if(!$reviewsQuery || !$reviewsQuery->exists()){
            throw new Exception('Could not find reviews');
        }

        $reviews = $this->loadRelationships($reviewsQuery)->get();
        return $reviews;
    }

    public function createReview(array $review, User $user){
        $review['user_id'] = $user->id;

        return $this->repository->createReview($review);
    }

    public function showReview(int $id){
        $reviewQuery =  $this->repository->getReviewById($id);

        if(!$reviewQuery || !$reviewQuery->exists()){
            throw new Exception('Could not find review');
        }

        $review = $this->loadRelationships($reviewQuery)->first();

        return $review;
    }

    public function updateReview(int $id, array $reviewData, User $user){
        $review = $this->repository->getReviewById($id);

        if($review->user_id != $user->id){
            throw new Exception('You are not authorized to update this review');
        }

        $review = $this->repository->updateReview($reviewData, $id);

        if(!$review || empty($reviewData)){
            throw new Exception('Could not update review');
        }

        return $review;
    }

    public function deleteReview(int $id, User $user){
        $review = $this->repository->getReviewById($id);

        if($review->user_id != $user->id){
            throw new Exception('You are not authorized to delete this review');
        }

        $deleted = $this->repository->deleteReview($id);

        if(!$deleted){
            throw new Exception('Could not delete review');
        }

        return $deleted;
    }
}
