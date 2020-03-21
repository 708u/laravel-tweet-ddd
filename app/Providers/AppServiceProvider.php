<?php

namespace App\Providers;

use Domain\Application\Contract\Uuid\UuidGeneratable;
use Domain\Application\Contract\Validator\Validatable;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Application\Uuid\UuidGenerator;
use Infrastructure\Application\Validator\Validator;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UuidGeneratable::class => UuidGenerator::class,
        Validatable::class     => Validator::class,
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
