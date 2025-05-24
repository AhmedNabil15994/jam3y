<?php

namespace App\Modules\News\Models;

use App\Modules\News\Traits\NewsScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class News extends Model
{
		use Translatable , NewsScopesTrait;

    protected $fillable 					= [ 'status' , 'image'];
		public $translationModel 			= 'App\Modules\News\Models\NewsTranslation';
		public $translatedAttributes 	= [ 'title' , 'description' , 'slug' , 'seo_keywords' , 'seo_description'];

}
