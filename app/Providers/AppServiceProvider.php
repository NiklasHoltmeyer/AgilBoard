<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); 

        Blade::component('board.components.issuepreview', 'issuepreview');
        Blade::component('board.components.userstorygroup', 'userstorygroup');
        Blade::component('issue.components.issueshow', 'issueshow');
        Blade::component('group.components.groupTable', 'groupTable');
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
