<?php

namespace App\Modules\Pages\Models;

use App\Modules\Pages\Traits\PageScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Page extends Model
{
		use Translatable , PageScopesTrait;

    protected $fillable 					= [ 'status' , 'page_id'];
		public $translationModel 			= 'App\Modules\Pages\Models\PageTranslation';
		public $translatedAttributes 	= [ 'title' , 'description' , 'slug' , 'seo_keywords' , 'seo_description'];

}
