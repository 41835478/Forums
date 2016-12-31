<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AccessServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindRoles();
        $this->bindPermissions();
    }

    private function bindRoles()
    {
        $this->app->bind(
            'App\Repositories\Roles\RolesRepositoryContract',
            'App\Repositories\Roles\RolesRepository'
        );
    }

    private function bindPermissions()
    {
        $this->app->bind(
            'App\Repositories\Permissions\PermissionsRepositoryContract',
            'App\Repositories\Permissions\PermissionsRepository'
        );
    }
}
