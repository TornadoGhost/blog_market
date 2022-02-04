<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Services\CategoryService;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\PostServiceInterface;
use App\Services\Interfaces\TagServiceInterface;
use App\Services\PostService;
use App\Services\TagService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Service
         */
        $this->app->singleton(PostServiceInterface::class, PostService::class);
        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
        $this->app->singleton(TagServiceInterface::class, TagService::class);

        /**
         * Repository
         */
        $this->app->singleton(PostRepositoryInterface::class, PostRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(TagRepositoryInterface::class, TagRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
