<?php

namespace App\Http\Controllers\Front;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Payment\Services\UPaymentService;
use App\Modules\Subscription\Repository\OrderRepository;

class CheckoutController extends HomeController
{
    protected $payment;
    protected $order;
    /**
     * Create a new controller instance.
     */
    public function __construct(UPaymentService $payment, OrderRepository $order)
    {
        $this->payment = $payment;
        $this->order   = $order;
    }

    /**
     * checkout payment page.
     */
    public function index()
    {
        $content  = Cart::getContent();

        if (count($content) > 0) {
            return $this->payment($content);
        }

        return redirect()->back()->with(['alert' => 'danger', 'msg' => 'something wrong']);
    }

    /**
     * create order payment.
     */
    public function payment($content)
    {
        $order = $this->order->create($content, 'pending');
        $payment = $this->payment->send($order, 'Knet');
        return redirect($payment);
    }


    /**
     * result order payment.
     */
    public function result(Request $request)
    {
        return $this->payment->result($request);
    }

    /**
     * success order payment.
     */
    public function successPayment(Request $request)
    {

        $order = $this->order->findById($request->OrderID);
        $order->update(['order_status_id' => 1]);
        Cart::clear();
        session()->forget('coupons');
        return view('front.checkout.success');
    }

    /**
     * failed order payment.
     */
    public function failedPayment(Request $request)
    {
        $order = $this->order->findById($request->OrderID);
        $order->update(['order_status_id' => 2]);
        Cart::clear();
        session()->forget('coupons');

        return view('front.checkout.failed');
    }


    public function webhooks(Request $request)
    {
        if ($request->Result == "CAPTURED") {
            $order = $this->order->findById($request->OrderID);
            $order->update(['order_status_id' => 1]);
        } else {
            $order = $this->order->findById($request->OrderID);
            $order->update(['order_status_id' => 2]);
        }
        info($request->all());
    }
}
