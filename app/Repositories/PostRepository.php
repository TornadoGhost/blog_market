<?php


namespace App\Repositories;


use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Carbon\Carbon;

class PostRepository extends CoreRepository implements PostRepositoryInterface
{

    public function getModel()
    {
        return Post::class;
    }

    public function getAll()
    {
        return $this->start()->orderBy('id', 'DESC')->get();
    }
    public function getById($id)
    {
        return parent::getById($id); // TODO: Change the autogenerated stub
    }
    public function create($request){
        return $this->start()->create($request->all())->tags()->sync($request->input('tags'));
    }
    public function start()
    {
        return parent::start(); // TODO: Change the autogenerated stub
    }

}