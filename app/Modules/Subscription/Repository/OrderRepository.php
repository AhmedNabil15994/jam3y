<?php

namespace App\Modules\Subscription\Repository;

use App\Modules\Courses\Repository\CoursePackageRepository as Package;
use App\Modules\Subscription\Traits\SubscriptionDatesTrait;
use App\Modules\Subscription\Models\OrderCoupon;
use App\Modules\Subscription\Models\Coupon;
use App\Modules\Subscription\Models\Order;
use Cart;
use DB;

class OrderRepository
{
    use SubscriptionDatesTrait;

    function __construct(Order $order , Package $package,Coupon $coupon,OrderCoupon $orderCoupon)
    {
        $this->package        = $package;
        $this->order          = $order;
        $this->coupon         = $coupon;
        $this->orderCoupon    = $orderCoupon;
    }


    public function countCouponsOrders()
    {

        $data["coupons"] = $this->coupon
                                ->whereHas('orderCoupon', function($q) {
                                     $q->groupBy('coupon_id');
                                })
                                ->orderBy('id','DESC')
                                ->select(\DB::raw("code as code"))
                                ->pluck('code');

        $counter = $this->orderCoupon
                                ->select(\DB::raw("count(order_id) as orderNumber"))
                                ->orderBy('coupon_id','DESC')
                                ->groupBy('coupon_id')
                                ->get();

        $data["counter"] = json_encode(array_pluck($counter, 'orderNumber'));

        return $data;
    }

    public function monthlyProfiteOnly()
    {
        $data["profit_dates"] = $this->order
                                ->where('order_status_id',1)
                                ->select(\DB::raw("DATE_FORMAT(created_at,'%Y-%m') as date"))
                                ->groupBy('date')
                                ->pluck('date');

        $profits = $this->order
                    ->where('order_status_id',1)
                    ->select(\DB::raw("sum(total) as profit"))
                    ->groupBy(\DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                    ->get();

        $data["profits"] = json_encode(array_pluck($profits, 'profit'));

        return $data;
    }

    /*
    * Get All Objects
    */
    public function getAll($order = 'id', $sort = 'desc')
    {
        $orders = $this->order->orderBy($order, $sort)->get();
        return $orders;
    }


    public function totalProfit()
    {
        return $this->order->where('order_status_id',1)->sum('total');
    }

    /*
    * Find Object By ID
    */
    public function findById($id)
    {
        $order = $this->order->find($id);
        return $order;
    }

    /*
    * Create New Object & Insert to DB
    */
    public function create($request,$status)
    {
        DB::beginTransaction();

        try {

          $total = 0;
          $totalWithOff = 0;
          foreach (Cart::getContent() as $courseTotal) {
            $total        += $courseTotal->price;
            $totalWithOff += $courseTotal->getPriceSumWithConditions();
          }

          $order = $this->order->create(
            [
            'order_status_id'   => ($status == 'success') ? 1 : 2,
            'subtotal'          => $total,
            'off'               => $total - $totalWithOff,
            'total'             => $totalWithOff,
            'user_id'           => auth()->user()->id,
            'payment_method'    => null,
            'PaymentID'         => null,
          ]);

          foreach (Cart::getContent() as $course) {

              $package = $this->package->findById($course->attributes->package_id);

              $dates = $this->datesOfPackage($package);

              $order->subscriptions()->updateOrCreate([
                'order_id'    => $order->id,
                'course_id'   => $course->id,
                'price'       => $course->getPriceSumWithConditions(),
                'start_at'    => $dates['start_at'],
                'end_at'      => $dates['end_at'],
                'user_id'     => auth()->user()->id,
              ]);
          }

          if (session()->get('coupons')) {
            $order->orderCoupon()->create([
              'coupon_id' => session()->get('coupons')['id']
            ]);
          }

          DB::commit();
          return $order;

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

        $order = $this->findById($id);

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
        return $orders = $this->order->destroy($request['ids']);
    }

    /*
    * Generate Datatable
    */
    public function QueryTable($request)
    {
        $query = $this->order
                ->with('user')
                ->select('*',DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as createdAt'))
                ->where(function($query) use($request) {
                    $query
                    ->where('id'                , 'like' , '%'. $request->input('search.value') .'%')
                    ->orWhere('total'            , 'like' , '%'. $request->input('search.value') .'%');
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
