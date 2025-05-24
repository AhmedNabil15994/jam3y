<?php
namespace App\Modules\Categories\Providers;

use Illuminate\Support\ServiceProvider;

class CategoriesProvider extends ServiceProvider
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
        view()->composer('front.home' , 'App\Modules\Categories\ViewComposers\CategoriesHasCoursesComposer');
        view()->composer('front._layouts._header' , 'App\Modules\Categories\ViewComposers\CategoriesHasCoursesComposer');
        view()->composer('front._layouts._header', 'App\Modules\Categories\ViewComposers\CategoriesComposer');
    }
}
