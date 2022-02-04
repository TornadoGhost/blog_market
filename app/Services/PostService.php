<?php


namespace App\Services;


use App\Models\Category;
use App\Models\Tag;
use App\Models\UnderCategory;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;
use Carbon\Carbon;

class PostService implements PostServiceInterface
{
    private $postRepository;
    public function __construct(PostRepositoryInterface $postRepository){
        $this->postRepository = $postRepository;
    }

    public function savePostData($request){
        $this->postRepository->create($request);
    }

    public function getTags(){
        return Tag::all();
    }

    public function getCategories(){
        return Category::all();
    }

    public function getUnderCategories(){
        return UnderCategory::all();
    }

    public function getAllPosts(){
        return $this->postRepository->getAll();
    }

    public function getPost($id){
        return $this->postRepository->getById($id);
    }

}
