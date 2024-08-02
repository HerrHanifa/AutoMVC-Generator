<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind('MakingFilesHelper', function () {
            require_once app_path('Helpers/MakingFilesHelper.php');
            return new \stdClass(); // مجرد كائن وهمي يمكن استبداله بما تحتاج
        });
        $this->app->bind('RouteHelper', function () {
            require_once app_path('Helpers/RouteHelper.php');
            return new \stdClass(); // مجرد كائن وهمي يمكن استبداله بما تحتاج
        });

    }
}
