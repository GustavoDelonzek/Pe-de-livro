<?php

namespace App\Http\Repositories;

use App\Models\Publisher;

class PublisherRepository{
    public function getAll(){
        return Publisher::query();
    }

    public function createPublisher(array $publisher){
        return Publisher::create($publisher);
    }

    public function getPublisherById(int $id){
        return Publisher::where('id', $id);
    }

}
