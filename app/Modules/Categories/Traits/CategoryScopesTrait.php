<?php

namespace App\Modules\Categories\Traits;

trait CategoryScopesTrait
{
		public function scopeActive($query)
		{
				return $query->where('status',1);
		}

		public function scopeUnActive($query)
		{
				return $query->where('status',0);
		}

		public function scopeMainCategories($query)
		{
				return $query->where('category_id',null);
		}

		public function scopeHasCourses($query)
		{
				return $query->whereHas('courses', function($q) {
            $q->active();
        });
		}
}
