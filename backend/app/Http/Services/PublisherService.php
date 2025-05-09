<?php

namespace App\Http\Services;

use App\Http\Repositories\PublisherRepository;
use App\Http\Traits\CanLoadRelationships;
use Exception;

class PublisherService{
    use CanLoadRelationships;
    private $relations = ['books'];

    public function __construct(public PublisherRepository $repository){
    }

    public function getAll(){
        $publishersQuery = $this->repository->getAll();

        if(!$publishersQuery || !$publishersQuery->exists()){
            throw new Exception('Could not find publishers');
        }

        $publishers = $this->loadRelationships($publishersQuery)->get();

        return $publishers;
    }


    public function createPublisher(array $publisher){
        return $this->repository->createPublisher($publisher);
    }

    public function showPublisher(int $id){
        $publisherQuery =  $this->repository->getPublisherById($id);

        if(!$publisherQuery || !$publisherQuery->exists()){
            throw new Exception('Could not find publisher');
        }

        $publisher = $this->loadRelationships($publisherQuery)->first();

        return $publisher;
    }

    public function updatePublisher(int $id, array $publisherData){
        $publisher = $this->repository->updatePublisher($publisherData, $id);

        if(!$publisher || empty($publisherData)){
            throw new Exception('Could not update publisher');
        }

        return $publisher;
    }

    public function deletePublisher(int $id){
        $deleted = $this->repository->deletePublisher($id);
        if(!$deleted){
            throw new Exception('Could not delete publisher');
        }
        return $deleted;
    }

}
