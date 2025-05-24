<?php

namespace App\Modules\Subscription\Repository;

use App\Modules\Subscription\Models\Coupon;
use DB;

class CouponRepository
{
    function __construct(Coupon $coupon)
    {
        $this->coupon    = $coupon;
    }


    /*
    * Get All Objects
    */
    public function getAll($coupon = 'id', $sort = 'desc')
    {
        $coupons = $this->coupon->orderBy($coupon, $sort)->get();
        return $coupons;
    }


    /*
    * Find Object By CODE
    */
    public function findByCode($request)
    {
        $coupon = $this->coupon->where('code',$request->coupon)
                               ->where('expire_date','>', date('Y-m-d'))
                               ->first();
        return $coupon;
    }

    /*
    * Find Object By ID
    */
    public function findById($id)
    {
        $coupon = $this->coupon->find($id);
        return $coupon;
    }

    /*
    * Create New Object & Insert to DB
    */
    public function create($request)
    {
        DB::beginTransaction();

        try {

          $coupon = $this->coupon->create([
              'is_fixed_price'  	   => $request['is_fixed_price'] ? $request['is_fixed_price'] : 0,
              'code'  	             => $request['code'],
              'price' 	             => $request['price'],
              'percent' 	           => $request['percent'],
              'expire_date'          => $request['expire_date'],
          ]);

          DB::commit();
          return $coupon;

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

        $coupon = $this->findById($id);

        $coupon->update([
            'is_fixed_price'  	   => $request['is_fixed_price'] ? $request['is_fixed_price'] : 0,
            'code'  	             => $request['code'],
            'price' 	             => $request['price'],
            'percent' 	           => $request['percent'],
            'expire_date'          => $request['expire_date'],
        ]);

        try {

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
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
        return $coupons = $this->coupon->destroy($request['ids']);
    }

    /*
    * Generate Datatable
    */
    public function QueryTable($request)
    {
        $query = $this->coupon
                ->select('*',DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as createdAt'))
                ->where(function($query) use($request) {
                    $query
                    ->where('id'                , 'like' , '%'. $request->input('search.value') .'%')
                    ->orWhere('price'            , 'like' , '%'. $request->input('search.value') .'%');
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
