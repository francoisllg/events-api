<?php

namespace App\Providers;


use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class UserRepositoryServiceProvider extends ServiceProvider
{
     /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
    }
}
