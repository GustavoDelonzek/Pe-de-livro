<?php

namespace App\Http\Repositories;

use App\Models\Genre;

class GenreRepository{
    public function getAll(){
        return Genre::all();
    }
}
