<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class UserService{

    public function __construct(public UserRepository $userRepository){
    }

    public function createUser(array $registration){
        return $this->userRepository->createUser($registration);
    }



}
