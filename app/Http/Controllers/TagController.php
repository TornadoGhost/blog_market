<?php

namespace App\Http\Controllers;


use App\Http\Requests\TagStoreRequest;
use App\Services\Interfaces\TagServiceInterface;

class TagController extends Controller
{
    protected $tagService;
    public function __construct(TagServiceInterface $tagService)
    {
        $this->tagService = $tagService;
    }

    public function create(){
        $tags = $this->tagService->getTags();
        return view('tags.create', compact('tags'));
    }

    public function store(TagStoreRequest $request){
        $this->tagService->createTag($request->all());
        return redirect()->back()->with('success', $request->title . ' was successfully added!');
    }
}
