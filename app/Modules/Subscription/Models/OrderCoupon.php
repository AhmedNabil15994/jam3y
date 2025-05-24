<?php

namespace App\Modules\Subscription\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCoupon extends Model
{
		protected $fillable = [
			'order_id',
			'coupon_id',
		];

		public function order()
		{
				return $this->belongsTo(Order::class, 'order_id');
		}

		public function coupon()
		{
				return $this->belongsTo(Coupon::class, 'coupon');
		}
}
