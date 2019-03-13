<?php

namespace Modules\JobNews\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\JobNews\Events\Handlers\RegisterJobNewsSidebar;

class JobNewsServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterJobNewsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('jobnews', array_dot(trans('jobnews::jobnews')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('jobNews', 'permissions');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\JobNews\Repositories\JobNewsRepository',
            function () {
                $repository = new \Modules\JobNews\Repositories\Eloquent\EloquentJobNewsRepository(new \Modules\JobNews\Entities\JobNews());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\JobNews\Repositories\Cache\CacheJobNewsDecorator($repository);
            }
        );
// add bindings

    }
}
