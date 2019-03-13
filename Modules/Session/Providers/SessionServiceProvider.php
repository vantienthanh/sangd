<?php

namespace Modules\Session\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Session\Events\Handlers\RegisterSessionSidebar;

class SessionServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterSessionSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('sessions', array_dot(trans('session::sessions')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('session', 'permissions');

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
            'Modules\Session\Repositories\SessionRepository',
            function () {
                $repository = new \Modules\Session\Repositories\Eloquent\EloquentSessionRepository(new \Modules\Session\Entities\Session());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Session\Repositories\Cache\CacheSessionDecorator($repository);
            }
        );
// add bindings

    }
}
