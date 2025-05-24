<?php

namespace App\Modules\Courses\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Leason extends Model
{
		use Translatable;

		protected $fillable 					= [ 'course_id'  , 'status'];
		public $translationModel 			= 'App\Modules\Courses\Models\LeasonTranslation';
		public $translatedAttributes 	= [ 'title'  , 'slug' ];

		public function videos()
		{
				return $this->hasMany(LeasonVideo::class, 'leason_id')->orderBy('sorting','ASC');
		}

		public function course()
		{
				return $this->belongsTo(Course::class, 'course_id');
		}
}
