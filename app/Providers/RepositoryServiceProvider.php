<?php

namespace App\Providers;

use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\LikeRepositoryInterface;
use App\Interfaces\TopicRepositoryInterface;
use App\Repositories\CommentRepository;
use App\Repositories\LikeRepository;
use App\Repositories\TopicRepository;
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
        $this->app->bind(TopicRepositoryInterface::class,TopicRepository::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentRepository::class);
        $this->app->bind(LikeRepositoryInterface::class,LikeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
