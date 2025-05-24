<?php

namespace App\Modules\Courses\Repository;

use App\Modules\Courses\Models\Course;
use App\Modules\Courses\Traits\VdocipherIntegration;
use DB;

class CourseRepository
{
    use VdocipherIntegration;
    function __construct(Course $course)
    {
        $this->course   = $course;
    }

    /*
    * Get All Objects
    */
    public function getAll($order = 'id', $sort = 'desc')
    {
        $courses = $this->course->orderBy($order, $sort)->get();
        return $courses;
    }

    public function countCourses($order = 'id', $sort = 'desc')
    {
        $courses = $this->course->active()->count();

        return $courses;
    }

    /*
    * Get All Objects
    */
    public function getAllByCategory($category,$order = 'id', $sort = 'desc')
    {
        $courses = $this->course->active()
                        ->findByCategoryId($category)
                        ->orderBy($order, $sort)
                        ->paginate(12);

        return $courses;
    }

    /*
    * Find Object By ID
    */
    public function findById($id)
    {
        $course = $this->course->find($id);
        return $course;
    }

    /*
     * Find Object By Slug
     */
     public function findBySlug($slug)
     {
         $course = $this->course->withCount('packages')->whereHas('translations', function($q) use($slug) {
             $q->where('slug', $slug);
         })->first();

         return $course;
     }

    /*
    * Create New Object & Insert to DB
    */
    public function create($request)
    {
        DB::beginTransaction();

        try {

            $course = $this->course->create([
              'image'       => $request['image'][0] ? get_path($request['image'][0]) : '/uploads/default.png',
              'status'      => $request->status ? 1 : 0,
              'price'       => $request->price,
              'demo_video'  => $request->demo_video,
              'user_id'     => $request->user_id,
            ]);

            $course->categories()->sync(int_to_array($request->category_id));

            $this->translateTable($course,$request);

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

            $course = $this->findById($id);

            $course->update([
              'image'        => $request['image'] && $request['image'][0] ? get_path($request['image'][0]) : $course->image,
              'status'       => $request->status ? 1 : 0,
              'price'        => $request->price,
              'demo_video'   => $request->demo_video,
              'user_id'      => $request->user_id,
            ]);

            if ($request->category_id != null) {
              $course->categories()->sync(int_to_array($request->category_id));
            }

            $this->translateTable($course,$request);

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
          $model->translateOrNew($locale)->description     = $request['description'] ? $request['description'][$locale]:'';
          $model->translateOrNew($locale)->top_description = $request['top_description'] ? $request['top_description'][$locale]:'';
          $model->translateOrNew($locale)->seo_description = $request['seo_description'] ? $request['seo_description'][$locale]:'';
          $model->translateOrNew($locale)->seo_keywords    = $request['seo_keywords'] ? $request['seo_keywords'][$locale]:'';
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
        return $courses = $this->course->destroy($request['ids']);
    }


    /*
    * Generate Datatable
    */
    public function QueryTable($request)
    {
        $query = $this->course
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
