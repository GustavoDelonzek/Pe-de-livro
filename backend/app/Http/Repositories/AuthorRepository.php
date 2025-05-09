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

    public function getAuthorById(int $id){
        return Author::where('id', $id);
    }

    public function updateAuthor(array $author, int $id){
        return Author::where('id', $id)->update($author);
    }

    public function deleteAuthor(int $id){
        return Author::where('id', $id)->delete();
    }

}
