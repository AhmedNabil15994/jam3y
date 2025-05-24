<?php
use Illuminate\Support\Facades\Route;
Route::get('/' ,'Dashboard\DashboardController@index')->name('dashboard');


