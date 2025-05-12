<?php

namespace App\Http\Services;

use App\Http\Repositories\GenreRepository;
use App\Http\Traits\CanLoadRelationships;
use Exception;

class GenreService{
    use CanLoadRelationships;
    private $relations = ['books'];
    public function __construct(public GenreRepository $repository){
    }

    public function getAll(){
        $genresQuery = $this->repository->getAll();

        if(!$genresQuery || !$genresQuery->exists()){
            throw new Exception('Could not find genres');
        }

        $genres = $this->loadRelationships($genresQuery)->get();
        return $genres;
    }

    public function createGenre(array $genre){
        return $this->repository->createGenre($genre);
    }

    public function showGenre(int $id){
        $genreQuery =  $this->repository->getGenreById($id);

        if(!$genreQuery || !$genreQuery->exists()){
            throw new Exception('Could not find genre');
        }

        $genre = $this->loadRelationships($genreQuery)->first();

        return $genre;
    }

    public function updateGenre(int $id, array $genreData){
        $genre = $this->repository->updateGenre($genreData, $id);

        if(!$genre || empty($genreData)){
            throw new Exception('Could not update genre');
        }

        return $genre;
    }

    public function deleteGenre(int $id){
        $deleted = $this->repository->deleteGenre($id);

        if(!$deleted){
            throw new Exception('Could not delete genre');
        }

        return $deleted;
    }


}
