<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use languages;
use Setting;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config([

          'setting' => [
            'supported_currencies'       => Setting::get('currencies'),
            'default_currency'           => Setting::get('default_currency'),
            'default_country'            => Setting::get('default_country'),
            'supported_countries'        => Setting::get('countries'),
            'default_locales'            => Setting::get('default_locales'),
            'locales'                    => Setting::get('locales'),
            'social'                     => Setting::get('social'),
            'other'                      => Setting::get('other'),
            'default_shipping'           => Setting::get('default_shipping'),
            'logo'                       => Setting::get('logo'),
            'favicon'                    => Setting::get('favicon'),
          ],

          'app.name' => Setting::lang(locale())->get('app_name'),

  		  ]);
    }
}
