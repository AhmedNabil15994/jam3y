<?php

Route::group(['prefix' => 'news'], function () {

	Route::get('/' ,'Dashboard\NewsController@index')
	->name('news.index')
  ->middleware(['permission:show_news']);

	Route::get('datatable'	,'Dashboard\NewsController@dataTable')
	->name('news.dataTable')
	->middleware(['permission:show_news']);

	Route::get('create'		,'Dashboard\NewsController@create')
	->name('news.create')
  ->middleware(['permission:add_news']);

	Route::post('/'			,'Dashboard\NewsController@store')
	->name('news.store')
  ->middleware(['permission:add_news']);

	Route::get('{id}/edit'	,'Dashboard\NewsController@edit')
	->name('news.edit')
  ->middleware(['permission:edit_news']);

	Route::put('{id}'		,'Dashboard\NewsController@update')
	->name('news.update')
  ->middleware(['permission:edit_news']);

	Route::delete('{id}'	,'Dashboard\NewsController@destroy')
	->name('news.destroy')
  ->middleware(['permission:delete_news']);

	Route::get('deletes'	,'Dashboard\NewsController@deletes')
	->name('news.deletes')
  ->middleware(['permission:delete_news']);

	Route::get('{id}','Dashboard\NewsController@show')
	->name('news.show')
  ->middleware(['permission:show_news']);
});
