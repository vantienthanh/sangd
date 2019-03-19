<?php

namespace Modules\Membercv\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Membercv\Events\Handlers\RegisterMembercvSidebar;

class MembercvServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterMembercvSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('membercvs', array_dot(trans('membercv::membercvs')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('membercv', 'permissions');

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
            'Modules\Membercv\Repositories\MembercvRepository',
            function () {
                $repository = new \Modules\Membercv\Repositories\Eloquent\EloquentMembercvRepository(new \Modules\Membercv\Entities\Membercv());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Membercv\Repositories\Cache\CacheMembercvDecorator($repository);
            }
        );
// add bindings

    }
}
