<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\Interfaces\CommentServiceInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentService;
    public function __construct(CommentServiceInterface $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(Request $request){
        //dd($request);
        $this->commentService->storePost($request, 'App\Models\Post');
        return back();
    }
}
