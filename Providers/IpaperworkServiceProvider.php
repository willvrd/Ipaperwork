<?php

namespace Modules\Ipaperwork\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Ipaperwork\Events\Handlers\RegisterIpaperworkSidebar;

class IpaperworkServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterIpaperworkSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('paperworks', array_dot(trans('ipaperwork::paperworks')));
            $event->load('userpaperworks', array_dot(trans('ipaperwork::userpaperworks')));
            $event->load('userpaperworkhistories', array_dot(trans('ipaperwork::userpaperworkhistories')));
            $event->load('companies', array_dot(trans('ipaperwork::companies')));
            // append translations




        });
    }

    public function boot()
    {
        $this->publishConfig('ipaperwork', 'permissions');

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
            'Modules\Ipaperwork\Repositories\PaperworkRepository',
            function () {
                $repository = new \Modules\Ipaperwork\Repositories\Eloquent\EloquentPaperworkRepository(new \Modules\Ipaperwork\Entities\Paperwork());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ipaperwork\Repositories\Cache\CachePaperworkDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Ipaperwork\Repositories\UserPaperworkRepository',
            function () {
                $repository = new \Modules\Ipaperwork\Repositories\Eloquent\EloquentUserPaperworkRepository(new \Modules\Ipaperwork\Entities\UserPaperwork());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ipaperwork\Repositories\Cache\CacheUserPaperworkDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Ipaperwork\Repositories\UserPaperworkHistoryRepository',
            function () {
                $repository = new \Modules\Ipaperwork\Repositories\Eloquent\EloquentUserPaperworkHistoryRepository(new \Modules\Ipaperwork\Entities\UserPaperworkHistory());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ipaperwork\Repositories\Cache\CacheUserPaperworkHistoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Ipaperwork\Repositories\CompanyRepository',
            function () {
                $repository = new \Modules\Ipaperwork\Repositories\Eloquent\EloquentCompanyRepository(new \Modules\Ipaperwork\Entities\Company());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ipaperwork\Repositories\Cache\CacheCompanyDecorator($repository);
            }
        );
// add bindings




    }
}
