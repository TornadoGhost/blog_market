<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Tag;
use App\Services\Interfaces\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }


    public function index()
    {

    }

    public function create()
    {
        $tags = $this->postService->getTags();
        $categories = $this->postService->getCategories();
        return view('createpost', compact('tags', 'categories'));
    }

    public function store(PostStoreRequest $request)
    {
        $this->postService->savePostData($request);

        return redirect()->back()->with('success', 'Successfully created! It will be published after approving by admin.');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
