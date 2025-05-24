<?php

namespace App\Modules\Courses\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class CoursePackage extends Model
{
		use Translatable;

		protected $fillable 					= [
			'price'  , 'days' , 'fixed_date' , 'course_end_at' , 'course_id'
		];
		public $translationModel 			= 'App\Modules\Courses\Models\CoursePackageTranslation';
		public $translatedAttributes 	= [ 'title' , 'slug'];

		public function course()
		{
				return $this->belongsTo(Course::class, 'course_id');
		}
}
