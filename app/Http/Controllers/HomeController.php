<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUpdateDataRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Interfaces\PostServiceInterface;
use LithiumDev\TagCloud\TagCloud;


class HomeController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function index(){
        $posts = $this->postService->getAllPosts();

        $tags = $this->postService->getTags();


        return view('homepage', compact('posts', 'tags'));
    }

    public function show($category, $title){
        $show = $this->postService->showPost($title, $category);
        return view('showpost', compact('show'));
    }

    public function edit($id){
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('editpost', compact('post', 'categories', 'tags'));
    }

    public function update(PostUpdateDataRequest $request, $id){
        Post::query()->find($id)->tags()->sync($request->tags);
        Post::query()->where('id', '=', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->input('content'),
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('home')->with('success', 'Post id:' . $id . ', was successfully updated!');
    }
}
