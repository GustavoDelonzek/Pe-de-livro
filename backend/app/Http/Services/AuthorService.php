<?php

namespace App\Http\Services;

use App\Http\Repositories\AuthorRepository;

class AuthorService{

    public function __construct(public AuthorRepository $repository){
    }

    public function getAll(){
        return $this->repository->getAll();
    }

}
