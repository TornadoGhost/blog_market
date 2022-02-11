<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(SearchRequest $request){
        /*$posts = Post::where('title', 'LIKE', "%$request->search_query%")
            ->orWhere('content', 'LIKE', "%$request->search_query%")
            ->get();*/
//        dd($posts);
        /*$posts = DB::table('posts')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('posts.title', 'LIKE', "%$request->search_query%")
            ->orWhere('categories.title', 'LIKE', "%$request->search_query%")
            ->get();*/

        $posts = Post::query()
            ->where('title', 'LIKE', "%$request->search_query%")
            ->orWhere('content', 'LIKE', "%$request->search_query%")
            ->orWhereHas('category', function (Builder $query) use ($request) {
                $query->where('title', 'LIKE', "%$request->search_query%");
            })
            ->orWhereHas('tags', function (Builder $query) use ($request) {
                $query->where('title', 'LIKE', "%$request->search_query%");
            })
            ->orWhereHas('undercategories', function (Builder $query) use ($request) {
                $query->where('title', 'LIKE', "%$request->search_query%");
            })
            ->orWhereHas('keyWords', function (Builder $query) use ($request) {
                $query->where('word', 'LIKE', "%$request->search_query%");
            })
            ->get();

        return view('homepage', compact('posts'));
    }
}
