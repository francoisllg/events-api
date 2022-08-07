<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Interfaces\EventRepositoryInterface;
use App\Repositories\EloquentEventRepository;

class EventRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(EventRepositoryInterface::class, EloquentEventRepository::class);
    }

}
