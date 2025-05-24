<?php
namespace App\Modules\Pages\Providers;

use Illuminate\Support\ServiceProvider;

class PagesProvider extends ServiceProvider
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
        view()->composer('front._layouts._header', 'App\Modules\Pages\ViewComposers\PagesComposer');
    }
}
