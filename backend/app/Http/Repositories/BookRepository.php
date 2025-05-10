<?php

namespace App\Http\Repositories;

use App\Models\Book;

class BookRepository{
    public function getAll(){
        return Book::query();
    }

    public function getBookById(int $id){
        return Book::where('id', $id);
    }

    public function createBook(array $book){
        return Book::create($book);
    }
}
