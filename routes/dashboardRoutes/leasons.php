<?php

Route::group(['prefix' => 'leasons'], function () {

	Route::get('/' ,'Dashboard\LeasonController@index')
	->name('leasons.index')
  ->middleware(['permission:show_leasons']);

	Route::get('save-sorting' ,'Dashboard\LeasonController@saveSorting')
	->name('leasons.store.sorting')
	->middleware(['permission:show_leasons']);

	Route::get('datatable'	,'Dashboard\LeasonController@dataTable')
	->name('leasons.dataTable')
	->middleware(['permission:show_leasons']);

	Route::get('create'		,'Dashboard\LeasonController@create')
	->name('leasons.create')
  ->middleware(['permission:add_leasons']);

	Route::get('show-video/{id}'		,'Dashboard\LeasonController@showVideo')
	->name('leasons.show-video');

	Route::post('/'			,'Dashboard\LeasonController@store')
	->name('leasons.store')
  ->middleware(['permission:add_leasons']);

	Route::get('{id}/edit'	,'Dashboard\LeasonController@edit')
	->name('leasons.edit')
  ->middleware(['permission:edit_leasons']);

	Route::put('{id}'		,'Dashboard\LeasonController@update')
	->name('leasons.update')
  ->middleware(['permission:edit_leasons']);

	Route::delete('{id}'	,'Dashboard\LeasonController@destroy')
	->name('leasons.destroy')
  ->middleware(['permission:delete_leasons']);

	Route::get('deletes'	,'Dashboard\LeasonController@deletes')
	->name('leasons.deletes')
  ->middleware(['permission:delete_leasons']);

	Route::get('{id}','Dashboard\LeasonController@show')
	->name('leasons.show')
  ->middleware(['permission:show_leasons']);
});
