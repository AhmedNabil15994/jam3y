<?php
namespace App\Modules\Subscription\Providers;

use Illuminate\Support\ServiceProvider;

class StatisticsProfitProvider extends ServiceProvider
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
        view()->composer('dashboard.*', 'App\Modules\Subscription\ViewComposers\StatisticsProfitComposer');
    }
}
