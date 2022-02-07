<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\UnderCategory;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $category;

    public function __construct(CategoryServiceInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->getCategories();

        return view('categories.all', compact('categories'));
    }

    public function create()
    {
        $categories = $this->category->getCategories();

        return view('categories.create', compact('categories'));
    }


    public function store(CategoryStoreRequest $request)
    {

        if($request->input('category_id')){
            UnderCategory::query()->create($request->all());

            return redirect()->back()->with('success', $request->title . ' successfully added!');
        }
        $this->category->saveCategory($request);

        return redirect()->back()->with('success', $request->title . ' successfully added!');
    }

    public function underCategoryStore(Request $request){

    }

    public function show($slug)
    {
        dd($slug);
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
