<?php

namespace App\Providers;

use Domain\Query\Contract\Tweet\UserQuery;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Query\Tweet\EloquentUserQuery;

class QueryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserQuery::class => EloquentUserQuery::class,
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
