<?php

namespace App\Modules\Categories\Models;

use App\Modules\Categories\Traits\CategoryScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Category extends Model
{
		use Translatable , CategoryScopesTrait;

        protected $fillable 					= [ 'status' ,'coming_soon', 'category_id' , 'image'];
		public $translationModel 			= 'App\Modules\Categories\Models\CategoryTranslation';
		public $translatedAttributes 	= [ 'title' , 'slug' , 'seo_keywords' , 'seo_description' ];

		public function parent()
    {
        return $this->belongsTo('App\Modules\Categories\Models\Category', 'category_id');
    }

    public function children()
    {
        return $this->hasMany('App\Modules\Categories\Models\Category', 'category_id');
    }

		public function activeChildren()
    {
        return $this->children()->active();
    }

		public function courses()
    {
        return $this->belongsToMany('App\Modules\Courses\Models\Course', 'course_categories');
    }

		public function getParentsAttribute()
    {
        $parents = collect([]);

        $parent = $this->parent;

        while(!is_null($parent)) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents;
    }
}
