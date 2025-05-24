<?php

Route::group(['prefix' => 'orders'], function () {

	Route::get('/' ,'Dashboard\OrderController@index')
	->name('orders.index')
  ->middleware(['permission:show_orders']);

	Route::get('datatable'	,'Dashboard\OrderController@dataTable')
	->name('orders.dataTable')
	->middleware(['permission:show_orders']);

	Route::get('create'		,'Dashboard\OrderController@create')
	->name('orders.create')
  ->middleware(['permission:add_orders']);

	Route::post('/'			,'Dashboard\OrderController@store')
	->name('orders.store')
  ->middleware(['permission:add_orders']);

	Route::get('{id}/edit'	,'Dashboard\OrderController@edit')
	->name('orders.edit')
  ->middleware(['permission:edit_orders']);

	Route::put('{id}'		,'Dashboard\OrderController@update')
	->name('orders.update')
  ->middleware(['permission:edit_orders']);

	Route::delete('{id}'	,'Dashboard\OrderController@destroy')
	->name('orders.destroy')
  ->middleware(['permission:delete_orders']);

	Route::get('deletes'	,'Dashboard\OrderController@deletes')
	->name('orders.deletes')
  ->middleware(['permission:delete_orders']);

	Route::get('{id}','Dashboard\OrderController@show')
	->name('orders.show')
  ->middleware(['permission:show_orders']);
});
