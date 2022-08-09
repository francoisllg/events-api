<?php

namespace App\Providers;

use App\Interfaces\LicenceRepositoryInterface;
use App\Repositories\EloquentLicenceRepository;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class LicenceRepositoryServiceProvider extends ServiceProvider
{
     /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(LicenceRepositoryInterface::class, EloquentLicenceRepository::class);
    }
}
