<?php

namespace App\Http\Services;

use App\Http\Repositories\ReviewRepository;

class ReviewService{

    public function __construct(public ReviewRepository $repository){
    }

    public function getAll(){
        return $this->repository->getAll();
    }

}
