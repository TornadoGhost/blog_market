<?php


namespace App\Repositories;


use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;

class TagRepository extends CoreRepository implements TagRepositoryInterface
{
    public function getModel()
    {
        return Tag::class;
    }

    public function getAll()
    {
        return $this->start()->orderBy('id', 'desc')->get();
    }

    public function create($request){
        return $this->start()->create($request);
    }
}
