<?php

namespace App\Http\Repositories;

use App\Models\Genre;

class GenreRepository{
    public function getAll(){
        return Genre::query();
    }

    public function createGenre(array $genre){
        return Genre::create($genre);
    }

    public function getGenreById(int $id){
        return Genre::where('id', $id);
    }

    public function updateGenre(array $genre, int $id){
        return Genre::where('id', $id)->update($genre);
    }

    public function deleteGenre(int $id){
        return Genre::where('id', $id)->delete();
    }
}
