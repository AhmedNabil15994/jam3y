<?php

namespace App\Modules\Courses\Repository;

use App\Modules\Courses\Models\LeasonVideo;
use App\Modules\Courses\Models\Leason;
use App\Modules\Courses\Traits\VdocipherIntegration;
use Vimeo\Laravel\Facades\Vimeo;
use DB;

class LeasonRepository
{
    use VdocipherIntegration;

    function __construct(Leason $leason , LeasonVideo $video)
    {
        $this->video    = $video;
        $this->leason   = $leason;
    }


    public function sorting($request)
    {
        DB::beginTransaction();

        try {

            foreach ($request['video'] as $key => $value) {

              $key++;

              $service = $this->video->find($value)->update([
                  'sorting' => $key,
              ]);

            }

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    /*
    * Get All Objects
    */
    public function getAll($order = 'id', $sort = 'desc')
    {
        $leasons = $this->leason->orderBy($order, $sort)->get();
        return $leasons;
    }


    /*
    * Find Object By ID
    */
    public function findById($id)
    {
        $leason = $this->leason->find($id);
        return $leason;
    }

    /*
    * Create New Object & Insert to DB
    */
    public function create($request)
    {
        DB::beginTransaction();

        try {

            $leason = $this->leason->create([
              'course_id'   => $request->course_id
            ]);

            $this->translateTable($leason,$request);

            $this->createVideos($leason,$request);


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

            $leason = $this->findById($id);

            $leason->update([
              'course_id' => $request->course_id
            ]);

            $this->translateTable($leason,$request);

            $leason->videos()->delete();

            $this->createVideos($leason,$request);

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    /*
    * Create Leasons Group for The Course By ID
    */
    public function createVideos($leason,$request)
    {
        DB::beginTransaction();

        try {

            foreach ($request['is_free'] as $key => $value) {
              $links = $leason->videos()->create([
                'leason_id'       => $leason->id,
                'is_free'         => $value,
                'link'            => $request['link'][$key],
                'video_id'            => $request['link'][$key],
              ]);

              foreach (config('setting.locales') as $locale) {
                $links->translateOrNew($locale)->title  = $request['title_link_'.$locale][$key];
              }

              $links->save();

            }

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
        return $leasons = $this->leason->destroy($request['ids']);
    }


    /*
    * Generate Datatable
    */
    public function QueryTable($request)
    {
        $query = $this->leason
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
