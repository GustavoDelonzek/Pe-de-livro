<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Http\Traits\CanLoadRelationships;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService{
    use CanLoadRelationships;
    private $relations = ['genres', 'orders', 'reviews'];
    public function __construct(public UserRepository $userRepository){
    }

    public function getAll(){
        $users = $this->userRepository->getAll();
        $users = $this->loadRelationships($users)->get();
        return $users;
    }

    public function showMe(User $user){
        $user = $this->loadRelationships($user)->first();
        return $user;
    }

    public function storeGenrePreference(array $genrePreference, User $user){
        DB::beginTransaction();
        try{
            $user->genres()->sync($genrePreference['genres']);
            DB::commit();
            return $user;
        } catch (Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    public function updateUser(User $user, array $userData){
        DB::beginTransaction();
        try{
            $this->userRepository->updateUser($userData, $user->id);
            if(array_key_exists('genres', $userData)){
                $user->genres()->sync($userData['genres']);
            }
            DB::commit();
            return $user;
        } catch (Exception $e){
            DB::rollBack();
            throw $e;
        }
    }


    public function createUser(array $registration){
        return $this->userRepository->createUser($registration);
    }

    public function deleteUser(User $user){
        $deleted = $this->userRepository->deleteUser($user);
        return $deleted;
    }



}
