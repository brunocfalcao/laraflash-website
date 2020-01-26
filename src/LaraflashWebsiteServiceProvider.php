<?php

namespace Laraflash\Website;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laraflash\Website\Commands\CrawlCommand;

class LaraflashWebsiteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutes();

        $this->loadViews();

        $this->publishAssets();

        if ($this->app->runningInConsole()) {
            $this->commands([
                CrawlCommand::class,
            ]);
        }

        // Enable query log via environment configuration.
        if (env('LARANING_ENABLE_QUERY_LOG') === true) {
            DB::listen(function ($query) {
                Log::info($query->sql, $query->bindings, $query->time);
            });
        }
    }

    public function register()
    {
        app('router')->aliasMiddleware('firewall-blacklist', \PragmaRX\Firewall\Middleware\FirewallBlacklist::class);
        app('router')->aliasMiddleware('firewall-blockattacks', \PragmaRX\Firewall\Middleware\BlockAttacks::class);
    }

    protected function loadRoutes()
    {
        $requests = config('app.env') == 'production' ? 30 : 60;
        Route::group(['middleware' => ['web',
            /*"throttle:{$requests},1",*/
        /*'firewall-blacklist',
               'firewall-blockattacks'*/],
        ], function ($router) {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laraflash');
    }

    protected function publishAssets()
    {
        $this->publishes([
            __DIR__.'/../resources/assets'   => public_path(),
            __DIR__.'/../resources/defaults' => public_path('storage/defaults'),
            __DIR__.'/../config/flame.php'   => config_path('flame.php'),
        ], 'laraflash-website-files');
    }
}
