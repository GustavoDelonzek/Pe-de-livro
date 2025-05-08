<?php

namespace App\Http\Services;

use App\Http\Repositories\AuthorRepository;
use App\Http\Traits\CanLoadRelationships;
use Exception;

class AuthorService{
    use CanLoadRelationships;

    private $relations = ['books'];

    public function __construct(public AuthorRepository $repository){
    }

    public function getAll(){
        $authorsQuery = $this->repository->getAll();
        if(!$authorsQuery){
            throw new Exception('Could not find authors');
        }
        $authors = $this->loadRelationships($authorsQuery)->get();

        return $authors;
    }

}
