<?php

namespace App\Http\Repositories;

use App\Models\Book;

class BookRepository{
    public function getAll(){
        return Book::all();
    }
}
