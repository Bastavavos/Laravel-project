<?php

namespace App\Providers;

use Faker\Factory;
//use Generator;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new FakerPicsumImagesProvider($faker));
            return $faker;
        });
    }
}
    /**
     * Bootstrap services.
     */
//    public function boot(): void
//    {
//        //
//    }

