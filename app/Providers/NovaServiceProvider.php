<?php

namespace App\Providers;

use Anaseqal\NovaSidebarIcons\NovaSidebarIcons;
use App\Nova\Dashboards\Blog;
use App\Nova\Dashboards\Store;
use App\Nova\Metrics\NewUsers;
use App\Nova\Metrics\UsersPerDay;
use Dniccum\NovaDocumentation\NovaDocumentation;
use Infinety\Filemanager\FilemanagerTool;
use Jobcerto\NovaGrid\NovaGrid;
use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use Silvanite\NovaToolPermissions\NovaToolPermissions;
use Spatie\BackupTool\BackupTool;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        /*Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });*/
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new NewUsers(),
            new UsersPerDay(),
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new NovaToolPermissions(),
            new FilemanagerTool(),
            new NovaDocumentation(),
            new BackupTool(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
