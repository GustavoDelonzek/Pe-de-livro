<?php

namespace App\Http\Services;

use App\Http\Repositories\PublisherRepository;
use App\Http\Traits\CanLoadRelationships;
use Exception;

class PublisherService{
    use CanLoadRelationships;
    private $relations = ['books'];

    public function __construct(public PublisherRepository $repository){
    }

    public function getAll(){
        $publishersQuery = $this->repository->getAll();

        if(!$publishersQuery){
            throw new Exception('Could not find publishers');
        }

        $publishers = $this->loadRelationships($publishersQuery)->get();

        return $publishers;
    }

}
