<?php

namespace App\Http\Services;

use App\Http\Repositories\PublisherRepository;

class PublisherService{

    public function __construct(public PublisherRepository $repository){
    }

    public function getAll(){
        return $this->repository->getAll();
    }

}
