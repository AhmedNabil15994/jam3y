<?php

namespace App\Modules\News\Repository;

use App\Modules\News\Models\News;
use DB;

class NewsRepository
{
    function __construct(News $news)
    {
        $this->news = $news;
    }

    /*
    * Get All Objects
    */
    public function getAll($order = 'id', $sort = 'desc')
    {
        $all_news = $this->news->orderBy($order, $sort)->get();
        return $all_news;
    }

    /*
    * Get All Active Objects
    */
    public function getAllActive($order = 'id', $sort = 'desc')
    {
        $news = $this->news->active()->orderBy($order, $sort)->paginate(12);
        return $news;
    }

    /*
    * Find Object By ID
    */
    public function findById($id)
    {
        $news = $this->news->find($id);
        return $news;
    }

    /*
     * Find Object By Slug
     */
     public function findBySlug($slug)
     {
         $news = $this->news->whereHas('translations', function($q) use($slug) {
             $q->where('slug', $slug);
         })->first();

         return $news;
     }

    /*
    * Create New Object & Insert to DB
    */
    public function create($request)
    {
        DB::beginTransaction();

        try {

            $news = $this->news->create([
              'image'    => $request['image'][0] ? get_path($request['image'][0]) : '/uploads/default.png',
              'status'   => $request->status ? 1 : 0,
            ]);

            $this->translateTable($news,$request);

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

            $news = $this->findById($id);

            $news->update([
              'image'    => $request['image'][0] ? get_path($request['image'][0]) : $news->image,
              'status'   => $request->status ? 1 : 0,
            ]);

            $this->translateTable($news,$request);

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
          $model->translateOrNew($locale)->title           = $value;
          $model->translateOrNew($locale)->slug            = slugfy($value);
          $model->translateOrNew($locale)->description     = $request['description'] ? $request['description'][$locale]: null;
          $model->translateOrNew($locale)->seo_description = $request['seo_description'] ? $request['seo_description'][$locale]: null;
          $model->translateOrNew($locale)->seo_keywords    = $request['seo_keywords'] ? $request['seo_keywords'][$locale]: null;
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
        return $all_news = $this->news->destroy($request['ids']);
    }

    /*
    * Generate Datatable
    */
    public function QueryTable($request)
    {
        $query = $this->news
                ->select('*',DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as createdAt'))
                ->where(function($query) use($request) {
                    $query
                    ->where('id'                , 'like' , '%'. $request->input('search.value') .'%')
                    ->orWhere('title'           , 'like' , '%'. $request->input('search.value') .'%')
                    ->orWhere('description'     , 'like' , '%'. $request->input('search.value') .'%');
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
