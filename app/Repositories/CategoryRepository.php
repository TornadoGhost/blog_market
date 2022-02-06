<?php


namespace App\Repositories;


use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Str;

class CategoryRepository extends CoreRepository implements CategoryRepositoryInterface
{

    public function getModel()
    {
        return Category::class;
    }

    public function getAll()
    {
        return parent::getAll(); // TODO: Change the autogenerated stub
    }

    public function create($request){
        return $this->start()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-')
        ]);
    }
}
