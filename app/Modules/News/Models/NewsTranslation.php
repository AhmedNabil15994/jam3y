<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
		protected $fillable = [ 'title' , 'description' , 'slug' , 'seo_keywords' , 'seo_description'];
}
