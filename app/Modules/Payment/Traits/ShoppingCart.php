<?php

namespace App\Modules\Payment\Traits;

use Darryldecode\Cart\CartCondition;
use Cart;
use Auth;

trait ShoppingCart
{

    public static function checkCourseInCart($courseId)
    {
        $course = Cart::get($courseId);
        return $course;
    }

    public static function toCart($course)
    {
        if (self::checkCourseInCart($course['id']))
            return self::updateCourseToCart($course);

        return self::addCourseToCart($course);
    }

    public static function addCourseToCart($course)
    {
        $add = Cart::add([
          'id'          => $course['id'],
          'name'        => $course['name'],
          'price'       => $course['price'],
          'quantity'    => 1,
          'attributes'  => [
              'slug'        => $course['slug'],
              'image'       => $course['image'],
              'translation' => $course['translations'],
              'package_id'  => $course['package_id']
          ]
        ]);

        return $add;
    }

    public static function updateCourseToCart($course)
    {
        $update = Cart::update($course['id'],[
          'id'          => $course['id'],
          'name'        => $course['name'],
          'price'       => $course['price'],
          'quantity'    => 0,
          'attributes'  => [
              'slug'        => $course['slug'],
              'image'       => $course['image'],
              'translation' => $course['translations'],
              'package_id'  => $course['package_id']
          ]
        ]);

        return $update;
    }

    public static function removeFromCart($id)
    {
        return Cart::remove($id);
    }

    public static function clearCart()
    {
        return Cart::clear();
    }

    public function discount($coupon)
    {
        if (!Cart::isEmpty()) {
          foreach (Cart::getContent() as $condItem) {
              Cart::clearItemConditions($condItem['id']);
          }
        }

        self::sessionCoupons($coupon);

        $condition = new CartCondition([
            'name'    => $coupon->code,
            'type'    => 'coupon',
            'target'  => 'total',
            'value'   => ($coupon->is_fixed_price == true) ? '-'.$coupon->price : '-'.$coupon->percent.'%',
        ]);

        foreach (Cart::getContent() as $item) {
            Cart::addItemCondition($item['id'], $condition);
        }

        // if (!Cart::isEmpty()) {
        //   foreach (Cart::getContent() as $condItem) {
        //       Cart::clearItemConditions($condItem['id']);
        //   }
        // }
        //
        // $condition = new CartCondition([
        //     'name'    => $coupon->code,
        //     'type'    => 'coupon',
        //     'target'  => 'total',
        //     'value'   => ($coupon->is_fixed_price == true) ? '-'.$coupon->price : '-'.$coupon->percent.'%',
        // ]);

        // foreach (Cart::getContent() as $item) {
        //     Cart::addItemCondition($item['id'],$condition);
        // }

        // Cart::condition($condition);
    }

    public static function destroyCoupons()
		{
				return Cart::clearCartConditions();
		}

    public static function sessionCoupons($coupon)
		{
        session()->put('coupons',[
          'code' => $coupon->code,
          'id'   => $coupon->id,
        ]);
		}

    public static function getCoupon()
    {
        return session()->get('coupons');
    }
}
