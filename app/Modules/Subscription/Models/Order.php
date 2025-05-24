<?php

namespace App\Modules\Subscription\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'order_status_id' ,
      'user_id' ,
      'subtotal',
      'shipping',
      'off',
      'total',
      'payment_method',
      'PaymentID'
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'order_id');
    }

    public function orderCoupon()
    {
        return $this->hasOne(OrderCoupon::class, 'order_id');
    }

    public function status()
		{
				return $this->belongsTo(OrderStatus::class, 'order_status_id');
		}

		public function user()
		{
				return $this->belongsTo('App\Modules\Users\Models\User', 'user_id');
		}
}
