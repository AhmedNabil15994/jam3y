<?php

namespace App\Modules\Payment\Services;

use App\Modules\Subscription\Repository\OrderRepository;
use Cart;
use Auth;

class PaymentService
{
		function __construct(OrderRepository $order)
		{
				$this->order = $order;
		}

		const URL_TAHSEEEL  = "https://lounge.tahseeel.com/api/";
		const UID_TAHSEEEL  = "imtiazedukw@1212";
		const PWD_TAHSEEEL  = "imtiazedukw@1212";
		const CODE_TAHSEEEL = "imtiazedukw@1212";

		// const URL_TAHSEEEL  = "https://devorder.tahseeel.com/api/";
		// const UID_TAHSEEEL  = "tahseeeltest12";
		// const PWD_TAHSEEEL  = "tahseeeltest12";
		// const CODE_TAHSEEEL = "tahseeeltest12";

		public function send($cart)
		{
				$postarr = [
						"uid"               => self::UID_TAHSEEEL,
						"pwd"               => self::PWD_TAHSEEEL,
						"secret"            => self::CODE_TAHSEEEL,
						"cust_name"         => auth()->user()->name,
						"cust_email"        => auth()->user()->email,
						'cust_mobile'				=> auth()->user()->mobile,
						"order_amt"         => Cart::getTotal(),
						"delivery_charges"  => 0,
						"order_no"          => rand(0,5).time(),
						"total_items"       => 1,
						"callback_url"      => 'imtiazkw.com/checkout/result',
						// "callback_url"      => 'imtiaz.test/checkout/result',
						"knet_allowed"      => 1,
						"cc_allowed"        => 1,
				];

				$fields_string='';

				foreach($postarr as $key=>$value) {
					$fields_string .= $key.'='.$value.'&';
				}

				rtrim($fields_string, '&');

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, self::URL_TAHSEEEL."?p=order");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch,CURLOPT_POST, count($postarr));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
				$result = curl_exec($ch);
				$datas=json_decode($result,true);
				curl_close($ch);
				return $datas['link'];
				exit;
		}


		public function result($request)
		{
				$data = $this->checkResponse($request);

				if ($request['cancelled'] == 1)
						return redirect()->route('front.checkout.payment-failed');

				if ($request['tx_mode'] == "CC")
						return $result = $this->ccMethod($data,$request);

				if ($request['tx_mode'] == "KNET")
						return $result = $this->knetMethod($data,$request);
		}

		public function checkResponse($request)
		{
				$params = $request;

				$request_params='?p=order_info&uid='.self::UID_TAHSEEEL.'&pwd='.self::PWD_TAHSEEEL.'&secret='.self::CODE_TAHSEEEL.'&id='.$params['order_id'].'&hash='.$params['hash'];

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, self::URL_TAHSEEEL.$request_params);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				$result = curl_exec($ch);
				$datas=json_decode($result,true);
				return $datas;
				curl_close($ch);
		}


		public function ccMethod($data,$request)
		{
				if($request['Result'] == "APPROVED"){

						$order = $this->order->create($data,'success');

						Cart::clear();
						session()->forget('coupons');

						return redirect()->route('front.checkout.payment-success');
				}

				return redirect()->route('front.checkout.payment-failed');
		}

		public function knetMethod($data,$request)
		{
				if($request['Result'] == "CAPTURED"){

						$order = $this->order->create($data,'success');

						Cart::clear();
						session()->forget('coupons');

						return redirect()->route('front.checkout.payment-success');
				}

				return redirect()->route('front.checkout.payment-failed');
		}
}
