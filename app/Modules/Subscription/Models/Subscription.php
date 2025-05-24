<?php

namespace App\Modules\Subscription\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
		protected $fillable = [
			'price' ,
			'start_at' ,
			'end_at',
			'course_id',
			'order_id',
			'user_id',
			'coupon_id',
		];

		public function order()
		{
				return $this->belongsTo(Order::class, 'order_id');
		}

		public function course()
		{
				return $this->belongsTo('App\Modules\Courses\Models\Course', 'course_id');
		}

		public function user()
		{
				return $this->belongsTo('App\Modules\Users\Models\User', 'user_id');
		}
}
