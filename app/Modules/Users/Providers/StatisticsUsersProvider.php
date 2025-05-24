<?php
namespace App\Modules\Users\Providers;

use Illuminate\Support\ServiceProvider;

class StatisticsUsersProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeFooter();
    }




    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }



    private function composeFooter()
    {
        view()->composer('dashboard.*', 'App\Modules\Users\ViewComposers\StatisticsUsersComposer');
    }
}
