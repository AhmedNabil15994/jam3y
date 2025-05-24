<?php

namespace App\Modules\Courses\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Attachment extends Model
{
		use Translatable;

		protected $fillable 					= [ 'course_id'  , 'status'];
		public $translationModel 			= 'App\Modules\Courses\Models\AttachmentTranslation';
		public $translatedAttributes 	= [ 'title'  , 'slug' ];

		public function urls()
		{
				return $this->hasMany(AttachmentUrl::class, 'attachment_id');
		}

		public function course()
		{
				return $this->belongsTo(Course::class, 'course_id');
		}
}
