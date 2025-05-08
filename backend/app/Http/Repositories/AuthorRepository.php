<?php

namespace App\Http\Repositories;

use App\Models\Author;

class AuthorRepository{
    public function getAll(){
        return Author::query();
    }

    public function createAuthor(array $author){
        return Author::create($author);
    }
}
