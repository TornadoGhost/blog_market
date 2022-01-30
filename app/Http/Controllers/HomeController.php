<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\Interfaces\PostServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function index(){
        $posts = $this->postService->getAllPosts();

        return view('homepage', compact('posts'));
    }

    public function show($id){
        $post = Post::find($id);

        return view('showpost', compact('post'));
    }
}
