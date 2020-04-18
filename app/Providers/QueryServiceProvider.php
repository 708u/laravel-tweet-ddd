<?php

namespace App\Providers;

use Domain\Query\Contract\Tweet\PostedTweetQuery;
use Domain\Query\Contract\Tweet\UserQuery;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Query\Tweet\EloquentS3PostedTweetQuery;
use Infrastructure\Query\Tweet\EloquentUserQuery;

class QueryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserQuery::class        => EloquentUserQuery::class,
        PostedTweetQuery::class => EloquentS3PostedTweetQuery::class,
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
