<?php
namespace App\Modules\Sliders\Providers;

use Illuminate\Support\ServiceProvider;

class SlidersProvider extends ServiceProvider
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
//        view()->composer('front.index' , 'App\Modules\Sliders\ViewComposers\CategoriesHasCoursesComposer');
//        view()->composer('front._layouts._header', 'App\Modules\Categories\ViewComposers\CategoriesComposer');
    }
}
