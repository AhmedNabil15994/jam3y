<?php

namespace App\Modules\Subscription\Repository;

use App\Modules\Subscription\Models\Subscription;
use DB;

class SubscriptionRepository
{
    function __construct(Subscription $subscription)
    {
        $this->subscription    = $subscription;
    }

    public function checkSubscribedCourse($course)
    {
        if (auth()->user()) {

          return $this->subscription
                      ->where('user_id',auth()->user()->id)
                      ->where('course_id',$course->id)
                      ->whereHas('order', function($q) {
                          $q->where('order_status_id',1);
                      })
                      ->where('end_at' , '>' , date('Y-m-d'))
                      ->latest()
                      ->first();
        }

    }

    public function userSubscribedCourses()
    {

      return $this->subscription
                  ->where('user_id',auth()->user()->id)
                  ->whereHas('order', function($q) {
                      $q->where('order_status_id',1);
                  })
                  ->orderBy('id','DESC')
                  ->where('end_at' , '>' , date('Y-m-d'))
                  ->get();

    }

    public function userEndSubscribedCourses()
    {

      return $this->subscription
                  ->where('user_id',auth()->user()->id)
                  ->whereHas('order', function($q) {
                      $q->where('order_status_id',1);
                  })
                  ->orderBy('id','DESC')
                  ->where('end_at' , '<' , date('Y-m-d'))
                  ->get();
    }


    public function teachermonthlyProfite()
    {
        $data["profit_dates"] = $this->subscription
                                ->whereHas('course', function($q) {
                                    $q->where('user_id',auth()->user()->id);
                                })
                                ->whereHas('order', function($q) {
                                   $q->where('order_status_id',1);
                                })
                                ->select(\DB::raw("DATE_FORMAT(created_at,'%Y-%m') as date"))
                                ->groupBy('date')
                                ->pluck('date');

        $profits = $this->subscription
                   ->whereHas('order', function($q) {
                        $q->where('order_status_id',1);
                   })
                   ->whereHas('course', function($q) {
                       $q->where('user_id',auth()->user()->id);
                   })
                   ->select(\DB::raw("sum(price) as profit"))
                   ->groupBy(\DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                   ->get();

        $data["profits"] = json_encode(array_pluck($profits, 'profit'));

        return $data;
    }
}
