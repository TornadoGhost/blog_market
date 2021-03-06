<?php


namespace App\Repositories;


use App\Models\UnderCategory;
use App\Repositories\Interfaces\UnderCategoryRepositoryInterface;
use Illuminate\Support\Str;

class UnderCategoryRepository extends CoreRepository implements UnderCategoryRepositoryInterface
{

    public function getModel()
    {
        return UnderCategory::class;
    }

    public function getUnderCategoryBySlug($slug){
        return $this->start()->where('slug', '=', $slug)->get();
    }

    public function create($request){
        return $this->start()->create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
        ]);
    }

    public function getAll()
    {
        return parent::getAll(); // TODO: Change the autogenerated stub
    }

}
