<?php

namespace App\Modules\Subscription\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
		protected $fillable = [
			'is_fixed_price' ,
			'code' ,
			'price',
			'percent',
			'expire_date',
		];

		public function orderCoupon()
    {
        return $this->hasMany(OrderCoupon::class, 'coupon_id');
    }
}
