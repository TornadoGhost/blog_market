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
}
