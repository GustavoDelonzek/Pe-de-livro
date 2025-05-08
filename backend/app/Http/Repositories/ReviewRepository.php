<?php

namespace App\Http\Repositories;

use App\Models\Review;

class ReviewRepository{
    public function getAll(){
        return Review::all();
    }
}
