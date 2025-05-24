<?php

namespace App\Modules\Sliders\Repository;

use Carbon\Carbon;
use App\Modules\Sliders\Models\Slider;
use DB;

class SliderRepository
{
    private $slider;
    function __construct(Slider $slider)
    {
        $this->slider   = $slider;
    }

    public function getAll($order = 'id', $sort = 'desc')
    {
        $companies = $this->slider->orderBy($order, $sort)->get();
        return $companies;
    }

    public function getForHome()
    {
        return $this->slider->Active()->Published()->orderBy('order')->get();
    }

    public function findById($id)
    {
        $slider = $this->slider->find($id);
        return $slider;
    }

    public function create($request)
    {
        DB::beginTransaction();

        try {
            $request->merge([
                'image' => $request->image ? get_path($request->image[0]) :'storage/not-found.jpg',
                'start_date' => $request->start_date ? Carbon::parse($request->start_date)->toDateTimeString() : null,
                'end_date' => $request->end_date ? Carbon::parse($request->end_date)->toDateTimeString() : null,
                'order' => $request->order ? $request->order : ($this->slider->all()->count() + 1),
                'is_active' => $request->is_active == 'on'? 1:0,
            ]);

          $slider = $this->slider->create($request->all());

          DB::commit();
          return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    public function update($request,$id)
    {
        DB::beginTransaction();

        $slider = $this->findById($id);
        $restore = $request->restore ? $this->restoreSoftDelte($slider) : null;

        try {
            $request->merge([
                'image' => $request->image ? get_path($request->image[0]) :$slider->image,
                'start_date' => $request->start_date ? Carbon::parse($request->start_date)->toDateTimeString() : $request->start_date,
                'end_date' => $request->end_date ? Carbon::parse($request->end_date)->toDateTimeString() : $request->end_date,
                'order' => $request->order ? $request->order : $slider->order,
                'course_id' => $request->type == 'course' ? $request->course_id : null,
                'category_id' => $request->type == 'category' ? $request->category_id : null,
                'link' => $request->type == 'link' ? $request->link : null,
                'is_active' => $request->is_active == 'on'? 1:0,
            ]);
            $slider->update($request->all());

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    public function restoreSoftDelte($model)
    {
        $model->restore();
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $model = $this->findById($id);

            if ($model->trashed()):
              $model->forceDelete();
            else:
              $model->delete();
            endif;

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    public function deleteSelected($request)
    {
        DB::beginTransaction();

        try {

            foreach ($request['ids'] as $id) {
                $model = $this->delete($id);
            }

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    public function QueryTable($request)
    {
        $query = $this->slider->where(function($query) use($request){
                      $query->where('id' , 'like' , '%'. $request->input('search.value') .'%');
                })->orderBy('order');

        $query = $this->filterDataTable($query,$request);

        return $query;
    }

    public function filterDataTable($query,$request)
    {
        // Search Categories by Created Dates
        if (isset($request['req']['from']) && $request['req']['from'] != '')
            $query->whereDate('created_at'  , '>=' , $request['req']['from']);

        if (isset($request['req']['to']) && $request['req']['to'] != '')
            $query->whereDate('created_at'  , '<=' , $request['req']['to']);

        if (isset($request['req']['deleted']) &&  $request['req']['deleted'] == 'only')
            $query->onlyDeleted();

        if (isset($request['req']['deleted']) &&  $request['req']['deleted'] == 'with')
            $query->withDeleted();

        if (isset($request['req']['status']) &&  $request['req']['status'] == '1')
            $query->active();

        if (isset($request['req']['status']) &&  $request['req']['status'] == '0')
            $query->unactive();

        return $query;
    }

}
