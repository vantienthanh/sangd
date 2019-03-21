<?php

namespace Modules\Profile\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Profile\Events\Handlers\RegisterProfileSidebar;

class ProfileServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterProfileSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('frontendusers', array_dot(trans('profile::frontendusers')));
            $event->load('frontenduserinfos', array_dot(trans('profile::frontenduserinfos')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('profile', 'permissions');

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
            'Modules\Profile\Repositories\FrontendUserRepository',
            function () {
                $repository = new \Modules\Profile\Repositories\Eloquent\EloquentFrontendUserRepository(new \Modules\Profile\Entities\FrontendUser());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Profile\Repositories\Cache\CacheFrontendUserDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Profile\Repositories\FrontendUserInfoRepository',
            function () {
                $repository = new \Modules\Profile\Repositories\Eloquent\EloquentFrontendUserInfoRepository(new \Modules\Profile\Entities\FrontendUserInfo());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Profile\Repositories\Cache\CacheFrontendUserInfoDecorator($repository);
            }
        );
// add bindings


    }
}
