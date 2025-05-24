<?php

namespace App\Modules\Courses\Repository;

use App\Modules\Courses\Models\CoursePackage;
use DB;

class CoursePackageRepository
{
    function __construct(CoursePackage $package)
    {
        $this->package  = $package;
    }

    /*
    * Get All Objects
    */
    public function getAll($order = 'id', $sort = 'desc')
    {
        $courses = $this->package->orderBy($order, $sort)->get();
        return $courses;
    }

    /*
    * Find Object By ID
    */
    public function findById($id)
    {
        $course = $this->package->find($id);
        return $course;
    }


    /*
    * Create New Object & Insert to DB
    */
    public function create($request)
    {
        DB::beginTransaction();

        try {

            $package = $this->package->create([
              'course_id'           => $request->course_id,
              'price'               => $request->price,
              'days'                => $request->days,
              'fixed_date'          => $request->fixed_date ? true : false,
              'course_end_at'       => $request->course_end_at,
            ]);

            $this->translateTable($package,$request);

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

            $package = $this->findById($id);

            $package->update([
              'course_id'           => $request->course_id,
              'price'               => $request->price,
              'days'                => $request->days,
              'fixed_date'          => $request->fixed_date ? true : false,
              'course_end_at'       => $request->course_end_at,
            ]);

            $this->translateTable($package,$request);

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
          $model->translateOrNew($locale)->title  = $value;
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
        return $courses = $this->package->destroy($request['ids']);
    }

    /*
    * Generate Datatable
    */
    public function QueryTable($request)
    {
        $query = $this->package
                ->with('course')
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
