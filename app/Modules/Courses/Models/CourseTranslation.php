<?php

namespace App\Modules\Courses\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTranslation extends Model
{
		protected $fillable = [ 'title' , 'description' , 'top_description' , 'slug' , 'seo_keywords' , 'seo_description'];
}
