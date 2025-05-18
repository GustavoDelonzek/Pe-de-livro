<?php

namespace App\Http\Services;

use App\Http\Repositories\BookRepository;
use App\Http\Traits\CanLoadRelationships;
use Exception;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        try{
            $bookCreated = $this->repository->createBook($book);
            $bookCreated->genres()->sync($book['genres']);
            DB::commit();
            return $bookCreated;
        } catch (Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    public function updateBook(int $id, array $bookData){

        DB::beginTransaction();
        try{
            $book = $this->repository->updateBook($bookData, $id);

            if(!$book || empty($bookData)){
                throw new Exception('Could not update book');
            }

            if(array_key_exists('genres', $bookData)){
                $book->genres()->sync($bookData['genres']);
            }

            DB::commit();
            return $book;
        } catch (Exception $e){
            DB::rollBack();
            throw $e;
        }

    }

    public function deleteBook(int $id){
        $deleted =$this->repository->deleteBook($id);

        if(!$deleted){
            throw new Exception('Could not delete book');
        }

        return $deleted;
    }

}
