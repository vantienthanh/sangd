<?php

namespace Modules\Enterprisesession\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Enterprisesession\Events\Handlers\RegisterEnterprisesessionSidebar;

class EnterprisesessionServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterEnterprisesessionSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('enterprisesessions', array_dot(trans('enterprisesession::enterprisesessions')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('enterprisesession', 'permissions');

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
            'Modules\Enterprisesession\Repositories\EnterprisesessionRepository',
            function () {
                $repository = new \Modules\Enterprisesession\Repositories\Eloquent\EloquentEnterprisesessionRepository(new \Modules\Enterprisesession\Entities\Enterprisesession());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Enterprisesession\Repositories\Cache\CacheEnterprisesessionDecorator($repository);
            }
        );
// add bindings

    }
}
