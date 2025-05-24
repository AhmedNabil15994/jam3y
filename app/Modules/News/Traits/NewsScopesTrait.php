<?php

namespace App\Modules\News\Traits;

trait NewsScopesTrait
{
		public function scopeActive($query)
		{
				return $query->where('status',1);
		}

		public function scopeUnActive($query)
		{
				return $query->where('status',0);
		}
}
