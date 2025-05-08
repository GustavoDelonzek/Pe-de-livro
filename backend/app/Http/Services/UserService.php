<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;

class UserService{

    public function __construct(public UserRepository $repository){
    }

   

}
