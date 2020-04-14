<?php

namespace App\Providers;

use Domain\Repository\Contract\Tweet\PostedPictureRepository;
use Domain\Repository\Contract\Tweet\TweetRepository;
use Domain\Repository\Contract\Tweet\UserRepository;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Repository\Tweet\EloquentS3PostedPictureRepository;
use Infrastructure\Repository\Tweet\EloquentTweetRepository;
use Infrastructure\Repository\Tweet\EloquentUserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        TweetRepository::class         => EloquentTweetRepository::class,
        PostedPictureRepository::class => EloquentS3PostedPictureRepository::class,
        UserRepository::class          => EloquentUserRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
