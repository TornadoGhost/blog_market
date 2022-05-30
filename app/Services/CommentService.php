<?php


namespace App\Services;


use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Services\Interfaces\CommentServiceInterface;

class CommentService implements CommentServiceInterface
{
    private $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function getAll(){
        return $this->commentRepository->getAll();
    }

    public function getById($id){
        return $this->commentRepository->getById($id);
    }

    public function storePost($request, $type){
        return $this->commentRepository->storePost($request, $type);
    }
}
