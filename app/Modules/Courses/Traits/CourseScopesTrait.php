<?php

namespace App\Modules\Courses\Traits;

trait CourseScopesTrait
{
		public function scopeActive($query)
		{
				return $query->where('status',1);
		}

		public function scopeUnActive($query)
		{
				return $query->where('status',0);
		}

		public function scopeFindByCategoryId($query, $category)
		{
		    return $query->whereHas('categories', function ($query) use ($category) {
		        $query->where('categories.id', $category['id']);
		    });
		}
}
