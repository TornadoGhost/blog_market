<?php


namespace App\Services;




use App\Repositories\Interfaces\UnderCategoryRepositoryInterface;
use App\Services\Interfaces\UnderCategoryServiceInterface;

class UnderCategoryService implements UnderCategoryServiceInterface
{
    protected $categoryRepository;
    public function __construct(UnderCategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getUnderCategoryBySlug($slug){
        return $this->categoryRepository->getBySlug($slug);
    }
}
