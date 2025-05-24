<?php

namespace App\Http\Controllers\Front;

use App\Modules\Subscription\Repository\SubscriptionRepository as Subscription;
use App\Modules\Users\Repository\UserRepository as User;
use App\Modules\Users\Requests\UpdateProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends HomeController
{

    public function __construct(User $user , Subscription $subscription)
    {
        $this->user           = $user;
        $this->subscription   = $subscription;
    }

    public function show()
    {
        return view('front.profile.index');
    }

    public function update(UpdateProfileRequest $request)
    {
        $update = $this->user->update($request , auth()->user()->id);

        if($update){
          return redirect()->back()->with([
            'alert'=>'success','msg'=>'تم تعديل البيانات بنجاح'
          ]);
        }

        return redirect()->back()->with([
          'alert'=>'danger','msg'=>'حدث خطا ما ، حاول مره اخرى'
        ]);
    }

    public function userCourses()
    {
        $subscribed = $this->subscription->userSubscribedCourses();
        $expired = $this->subscription->userEndSubscribedCourses();

        return view('front.profile.courses' , compact('subscribed','expired'));
    }

    public function teacher()
    {
        $statistics = $this->subscription->teachermonthlyProfite();

        return view('front.profile.teachers' , compact('statistics'));
    }
}
