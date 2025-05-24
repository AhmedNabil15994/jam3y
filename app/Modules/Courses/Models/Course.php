<?php

namespace App\Modules\Courses\Models;

use App\Modules\Courses\Traits\CourseScopesTrait;
use App\Modules\Courses\Traits\VdocipherIntegration;
use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Course extends Model
{
		use Translatable , CourseScopesTrait,VdocipherIntegration;

    protected $fillable 					= [ 'status' , 'image' , 'demo_video' , 'user_id'];
		public $translationModel 			= 'App\Modules\Courses\Models\CourseTranslation';
		public $translatedAttributes 	= [
			'title' , 'description' , 'top_description' , 'slug' , 'seo_keywords' , 'seo_description'
		];


		public function categories()
    {
        return $this->belongsToMany('App\Modules\Categories\Models\Category', 'course_categories');
    }

		public function leasons()
    {
        return $this->hasMany(Leason::class, 'course_id');
    }

		public function attachments()
    {
        return $this->hasMany(Attachment::class, 'course_id');
    }

		public function packages()
    {
        return $this->hasMany(CoursePackage::class, 'course_id');
    }

		public function teacher()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'user_id');
    }

    public function getVideoDataAttribute()
    {
        $data = $this->getVideos($this->demo_video)->getData()->data;
        return count($data) ? $this->getVideos($this->demo_video)->getData()->data[0] : (object)[
            'poster' => null,
            'id' => null,
            'title' => null,
            'upload_time' => null,
        ];
    }
}
