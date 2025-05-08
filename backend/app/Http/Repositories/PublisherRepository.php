<?php

namespace App\Http\Repositories;

use App\Models\Publisher;

class PublisherRepository{
    public function getAll(){
        return Publisher::all();
    }
}
