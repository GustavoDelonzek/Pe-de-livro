<?php

namespace App\Http\Services;

use App\Http\Repositories\OrderRepository;

class OrderService{

    public function __construct(public OrderRepository $repository){
    }

    public function getAll(){
        return $this->repository->getAll();
    }

}
