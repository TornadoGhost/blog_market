<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostApproveController extends Controller
{

    public function showToApprove(){
        $posts = Post::all();

        return view('approvePost', compact('posts'));
    }

    public function storeApprove(Request $request){
        Post::query()->where('id', '=', $request->id)->update([
                'approved' => $request->approved,
            ]);

        return redirect()->back()->with('success', 'Post was approved!');
    }

    public function drop(){

    }
}
