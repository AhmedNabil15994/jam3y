<?php

namespace App\Modules\Categories\Repository;

use App\Modules\Categories\Models\Category;
use DB;
use Illuminate\Http\Request;

class CategoryRepository
{
    function __construct()
    {
        $this->category = new Category;
    }

    /*
    * Get All Objects
    */
    public function getAll($order = 'id', $sort = 'desc')
    {
        $categories = $this->category->orderBy($order, $sort)->get();
        return $categories;
    }

    /*
    * Get All Objects
    */
    public function allMainCats($order = 'id', $sort = 'desc')
    {
        $categories = $this->category->mainCategories()->orderBy($order, $sort)->get();
        return $categories;
    }

    /*
    * Get All Objects
    */
    public function allActiveMainCats($order = 'id', $sort = 'desc')
    {
        $categories = $this->category->active()->mainCategories()->orderBy($order, $sort)->get();
        return $categories;
    }

    /*
    * Get All Objects
    */
    public function categoriesHasCourses($order = 'id', $sort = 'desc', $request = [])
    {
        $categories = $this->category->hasCourses()->where(function ($q) use($request){

        })->active()->inRandomOrder()->limit(10)->get();
        return $categories;
    }

   /*
    * Find Object By ID
    */
    public function findById($id)
    {
        $category = $this->category->find($id);
        return $category;
    }

   /*
    * Find Object By Slug
    */
    public function findBySlug($slug)
    {
        $category = $this->category->whereHas('translations', function($q) use($slug) {
            $q->where('slug', $slug);
        })->first();

        return $category;
    }

    /*
    * Create New Object & Insert to DB
    */
    public function create($request)
    {
        DB::beginTransaction();

        try {

            $category = $this->category->create([
              'category_id'  => ($request->category_id != "null") ? $request->category_id : null,
              'status'       => $request->status ? 1 : 0,
              'coming_soon'       => $request->coming_soon ? 1 : 0,
              'image'        => $request['image']&&$request['image'][0] ? get_path($request['image'][0]) : '/uploads/default.png',
            ]);

            $this->translateTable($category,$request);

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    /*
    * Find Object By ID & Update to DB
    */
    public function update($request,$id)
    {
        DB::beginTransaction();

        try {

            $category = $this->findById($id);

            $category->update([
              'category_id'  => ($request->category_id != "null") ? $request->category_id : null,
              'status'       => $request->status ? 1 : 0,
              'coming_soon'       => $request->coming_soon ? 1 : 0,
              'image'        => $request['image'] && isset($request['image'][0]) ? get_path($request['image'][0]) : $category->image,
            ]);

            $this->translateTable($category,$request);

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    /*
    * Translate all fields with multi languages
    */
    public function translateTable($model,$request)
    {
        foreach ($request['title'] as $locale => $value) {
          $model->translateOrNew($locale)->title            = $value;
          $model->translateOrNew($locale)->slug             = slugfy($value);
          $model->translateOrNew($locale)->seo_description  = $request['seo_description'] ? $request['seo_description'][$locale] : null;
          $model->translateOrNew($locale)->seo_keywords     = $request['seo_keywords'] ? $request['seo_keywords'][$locale] : null;
        }

        $model->save();
    }

    /*
    * Find Object By ID & Delete it from DB
    */
    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $model = $this->findById($id);

            $model->delete();

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    /*
    * Find all Objects By IDs & Delete it from DB
    */
    public function deleteAll($request)
    {
        return $categories = $this->category->destroy($request['ids']);
    }

    /*
    * Generate Datatable
    */
    public function QueryTable($request)
    {
        $query = $this->category
                ->select('*',DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as createdAt'))
                ->where(function($query) use($request) {
                    $query
                    ->where('id'                , 'like' , '%'. $request->input('search.value') .'%')
                    ->orWhere('title'           , 'like' , '%'. $request->input('search.value') .'%');
                });

        $query = self::filterDataTable($query,$request);

        return $query;
    }

    /*
    * Filteration for Datatable
    */
    public static function filterDataTable($query,$request)
    {
        if (isset($request['req']['from']) && $request['req']['from'] != '')
            $query->whereDate('created_at'  , '>=' , $request['req']['from']);

        if (isset($request['req']['to']) && $request['req']['to'] != '')
            $query->whereDate('created_at'  , '<=' , $request['req']['to']);

        return $query;
    }
}
