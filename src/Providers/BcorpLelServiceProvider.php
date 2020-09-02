<?php

namespace Bcorp\Lelframework;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class BcorpLelServiceProvider extends ServiceProvider
{

    const PACKAGE_DIR = __DIR__ . '/../../';
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //$this->mergeConfigFrom(self::PACKAGE_DIR . 'config/voyager-lelframework.php', 'lelframework');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $this->strapRoutes();
        $this->strapViews($request);
        $this->strapMigrations();
        $this->strapCommands();
    }

    protected function strapMigrations()
    {
        // Migrations
        $this->loadMigrationsFrom(self::PACKAGE_DIR . 'database/migrations');
    }

    protected function strapRoutes()
    {
        $this->loadRoutesFrom(base_path('/routes/web.php'));
        $this->loadRoutesFrom(self::PACKAGE_DIR . 'routes/web.php');
    }

    protected function strapViews(Request $request)
    {
        $this->loadViewsFrom(self::PACKAGE_DIR . 'ressources/views/', 'lelframework');
    }

    /**
     * Bootstrap our Commands/Schedules
     */
    protected function strapCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\InstallCommand::class,
            ]);
        }
    }
}
