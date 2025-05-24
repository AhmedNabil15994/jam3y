<?php

namespace App\Modules\Subscription\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class OrderStatus extends Model
{
		use Translatable;

    protected $fillable 					= ['code'];
		public $translationModel 			= 'App\Modules\Orders\Models\OrderStatusTranslation';
		public $translatedAttributes 	= [ 'title'];

}
