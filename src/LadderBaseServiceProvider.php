<?php


namespace maskeynihal\ladder;

use maskeynihal\ladder\Facades\Ladder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LadderBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if($this->app->runningInConsole()){
            $this->registerPublishing();
        }
        $this->registerResources();
    }

    public function register()
    {
        $this->registerResources();
        $this->commands([
            Console\DatabaseSeederCommand::class,
        ]);
    }

    protected function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ladder');
        $this->registerFacades();
        $this->registerRoutes();
    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../config/ladder.php' => config_path('ladder.php'),
            __DIR__. '/../resources/views' => resource_path('views/ladder'),
            __DIR__ . '/../database/migrations' => database_path('migration')
            
        ], 'ladder-publish');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function(){
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    private function routeConfiguration()
    {
        return [
             'prefix' =>  Ladder::prefix(),
             'namespace' => 'maskeynihal\ladder\Http\Controller',
             'as' => 'ladder.'
        ];
    }

    protected function registerFacades()
    {
        $this->app->singleton('Ladder', function($app){
            return new \maskeynihal\ladder\Ladder();
        });
    }
}