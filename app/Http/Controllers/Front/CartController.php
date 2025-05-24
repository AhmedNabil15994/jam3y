<?php

namespace App\Http\Controllers\Front;

use App\Modules\Courses\Repository\CoursePackageRepository as Package;
use App\Modules\Courses\Repository\CourseRepository as Course;
use App\Modules\Subscription\Repository\CouponRepository;
use App\Modules\Courses\Services\CourseHandelService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ShopCart;
use Cart;

class CartController extends HomeController
{
    use ShopCart;

    /**
     * Create a new controller instance.
     */
    public function __construct(Course $course , CouponRepository $coupon , Package $package)
    {
        $this->package  = $package;
        $this->course   = $course;
        $this->coupon   = $coupon;
    }

    /**
     * Show the shopping cart page.
     */
    public function cart()
    {
        return view('front.shopping-cart.index');
    }

    /**
     * Add new items to shopping cart.
     */
    public function addToCart(Request $request)
    {
        $course = $this->course->findBySlug($request->course);
        $package = $this->package->findById($request->package);

        $courseData = app(CourseHandelService::class)->handle($course,$package,$request->all());

        if(!$course && !$package)
          abort(404);

        $cart = self::toCart($courseData);

        if ($cart)
          return redirect()->route('front.cart.index')->with([
            'alert'=>'success','msg'=>__('front.cart.success_msg')
          ]);

        return redirect()->back()->with(['alert'=>'success','msg'=>__('front.cart.error_msg')]);
    }

    public function delete(Request $request)
    {
        $remove = self::removeFromCart($request->course);

        if ($remove)
          return redirect()->route('front.cart.index')->with([
            'alert'=>'success','msg'=>__('front.cart.delete_success_msg')
          ]);

        return redirect()->back()->with(['alert'=>'danger','msg'=>__('front.cart.delete_error_msg')]);
    }


    public function addCoupon(Request $request)
    {
        $coupon = $this->coupon->findByCode($request);

        if ($coupon) {

            $coupon = self::discount($coupon);

             return redirect()->route('front.cart.index')->with([
               'alert'=>'success','msg'=>'تم استخدام كود صحيح ، استمتع الان بالخصم'
             ]);

        }

        return redirect()->back()->with(['alert'=>'danger','msg' => 'من فضلك ادخل كود الخصم بشكل صحيح']);
    }

    public function deleteCoupon()
    {
        $coupon = self::destroyCoupons();

        return redirect()->back()->with(['alert'=>'danger','msg'=>'تم حذف كود الخصم']);
    }

}
