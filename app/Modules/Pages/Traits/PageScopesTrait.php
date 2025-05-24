<?php

namespace App\Modules\Pages\Traits;

trait PageScopesTrait
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
