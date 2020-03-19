<?php

namespace App\Providers;

use Domain\Application\Contract\Uuid\UuidGeneratable;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Application\Uuid\UuidGenerator;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UuidGeneratable::class => UuidGenerator::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
