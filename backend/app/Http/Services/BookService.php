<?php

namespace App\Http\Services;

use App\Http\Repositories\BookRepository;
use App\Http\Traits\CanLoadRelationships;
use Exception;

class BookService{
    use CanLoadRelationships;
    private $relations = ['author', 'publisher', 'genres', 'reviews'];
    public function __construct(public BookRepository $repository){
    }

    public function getAll(){
        $booksQuery = $this->repository->getAll();

        if(!$booksQuery){
            throw new Exception('Could not find books');
        }
        $books = $this->loadRelationships($booksQuery)->get();

        return $books;
    }

    public function showBook(int $id){
        $bookQuery =  $this->repository->getBookById($id);

        if(!$bookQuery || !$bookQuery->exists()){
            throw new Exception('Could not find book');
        }

        $book = $this->loadRelationships($bookQuery)->first();

        return $book;
    }

    public function createBook(array $book){
        return $this->repository->createBook($book);
    }

    public function updateBook(int $id, array $bookData){
        $book = $this->repository->updateBook($bookData, $id);

        if(!$book || empty($bookData)){
            throw new Exception('Could not update book');
        }

        return $book;
    }

}
