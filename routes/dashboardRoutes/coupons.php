<?php

Route::group(['prefix' => 'coupons'], function () {

	Route::get('/' ,'Dashboard\CouponController@index')
	->name('coupons.index')
  ->middleware(['permission:show_coupons']);

	Route::get('datatable'	,'Dashboard\CouponController@dataTable')
	->name('coupons.dataTable')
	->middleware(['permission:show_coupons']);

	Route::get('create'		,'Dashboard\CouponController@create')
	->name('coupons.create')
  ->middleware(['permission:add_coupons']);

	Route::post('/'			,'Dashboard\CouponController@store')
	->name('coupons.store')
  ->middleware(['permission:add_coupons']);

	Route::get('{id}/edit'	,'Dashboard\CouponController@edit')
	->name('coupons.edit')
  ->middleware(['permission:edit_coupons']);

	Route::put('{id}'		,'Dashboard\CouponController@update')
	->name('coupons.update')
  ->middleware(['permission:edit_coupons']);

	Route::delete('{id}'	,'Dashboard\CouponController@destroy')
	->name('coupons.destroy')
  ->middleware(['permission:delete_coupons']);

	Route::get('deletes'	,'Dashboard\CouponController@deletes')
	->name('coupons.deletes')
  ->middleware(['permission:delete_coupons']);

	Route::get('{id}','Dashboard\CouponController@show')
	->name('coupons.show')
  ->middleware(['permission:show_coupons']);
});
