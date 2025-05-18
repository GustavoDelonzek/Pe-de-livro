<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository{
    public function getAll(){
        return User::query();
    }

    public function getUserById(int $id){
        return User::where('id', $id);
    }

    public function createUser(array $registration){
        $user = User::create($registration);
        return $user;
    }
    public function updateUser(array $user, int $id){
        return User::where('id', $id)->update($user);
    }

    public function deleteUser(User $user){
        return $user->delete();
    }
}
