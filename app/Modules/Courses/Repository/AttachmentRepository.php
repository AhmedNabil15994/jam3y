<?php

namespace App\Modules\Courses\Repository;

use App\Modules\Courses\Models\Attachment;
use DB;

class AttachmentRepository
{
    function __construct(Attachment $attachment)
    {
        $this->attachment   = $attachment;
    }

    /*
    * Get All Objects
    */
    public function getAll($order = 'id', $sort = 'desc')
    {
        $attachments = $this->attachment->orderBy($order, $sort)->get();
        return $attachments;
    }


    /*
    * Find Object By ID
    */
    public function findById($id)
    {
        $attachment = $this->attachment->find($id);
        return $attachment;
    }

    /*
    * Create New Object & Insert to DB
    */
    public function create($request)
    {
        DB::beginTransaction();

        try {

            $attachment = $this->attachment->create([
              'course_id'   => $request->course_id
            ]);

            $this->translateTable($attachment,$request);

            $this->createUrls($attachment,$request);


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

            $attachment = $this->findById($id);

            $attachment->update([
              'course_id' => $request->course_id
            ]);

            $this->translateTable($attachment,$request);

            $attachment->urls()->delete();

            $this->createUrls($attachment,$request);

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    /*
    * Create Attachments Group for The Course By ID
    */
    public function createUrls($attachment,$request)
    {
        DB::beginTransaction();

        try {

            foreach ($request['is_free'] as $key => $value) {

              $links = $attachment->urls()->create([
                'attachment_id'   => $attachment->id,
                'is_free'         => $value,
                'link'            => get_path($request['link'][$key]),
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
        return $attachments = $this->attachment->destroy($request['ids']);
    }


    /*
    * Generate Datatable
    */
    public function QueryTable($request)
    {
        $query = $this->attachment
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
