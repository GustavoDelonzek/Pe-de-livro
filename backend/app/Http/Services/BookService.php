<?php

namespace App\Http\Services;

use App\Http\Repositories\BookRepository;

class BookService{

    public function __construct(public BookRepository $repository){
    }

    public function getAll(){
        return $this->repository->getAll();
    }

    
}
