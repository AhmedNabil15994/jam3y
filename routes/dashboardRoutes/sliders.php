<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'sliders'], function () {

    Route::get('datatable'	,'Dashboard\SliderController@datatable')
        ->name('sliders.dataTable');
});

Route::resource('/sliders' ,'Dashboard\SliderController');
