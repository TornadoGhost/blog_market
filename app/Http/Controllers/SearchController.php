<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(SearchRequest $request){
        dd($request);
    }
}
