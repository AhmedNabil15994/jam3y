<?php
namespace App\Modules\Courses\Providers;

use Illuminate\Support\ServiceProvider;

class StatisticsCoursesProvider extends ServiceProvider
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
        view()->composer('dashboard.*', 'App\Modules\Courses\ViewComposers\StatisticsCoursesComposer');
    }
}
