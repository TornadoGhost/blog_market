<?php


namespace App\Repositories;


use App\Models\UnderCategory;
use App\Repositories\Interfaces\UnderCategoryRepositoryInterface;

class UnderCategoryRepository extends CoreRepository implements UnderCategoryRepositoryInterface
{

    public function getModel()
    {
        return UnderCategory::class;
    }

    public function getBySlug($slug){
        return $this->start()->where('slug', '=', $slug)->get();
    }
}
