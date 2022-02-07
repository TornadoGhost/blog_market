<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnderCategoryController extends Controller
{
    public function show($category, $slug){
        dd($category, $slug);
    }
}
