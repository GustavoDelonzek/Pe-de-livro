<?php

namespace App\Http\Services;

use App\Http\Repositories\AuthorRepository;
use App\Http\Traits\CanLoadRelationships;
use Exception;

class AuthorService{
    use CanLoadRelationships;

    private $relations = ['books'];

    public function __construct(public AuthorRepository $authorRepository){
    }

    public function getAll(){
        $authorsQuery = $this->authorRepository->getAll();
        if(!$authorsQuery){
            throw new Exception('Could not find authors');
        }
        $authors = $this->loadRelationships($authorsQuery)->get();

        return $authors;
    }

    public function createAuthor(array $author){
        return $this->authorRepository->createAuthor($author);
    }

    public function showAuthor(int $id){
        $authorQuery =  $this->authorRepository->getAuthorById($id);
        
        if(!$authorQuery){
            throw new Exception('Could not find author');
        }

        $author = $this->loadRelationships($authorQuery)->first();

        return $author;
    }

}
