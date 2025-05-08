<?php

namespace App\Http\Services;

use App\Http\Repositories\GenreRepository;

class GenreService{

    public function __construct(public GenreRepository $repository){
    }

    public function getAll(){
        return $this->repository->getAll();
    }

}
