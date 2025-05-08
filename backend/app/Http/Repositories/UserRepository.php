<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository{
    public function createUser(array $registration){
        $user = User::create($registration);
        return $user;
    }

}
