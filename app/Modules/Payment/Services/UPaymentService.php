<?php

namespace App\Modules\Payment\Services;

class UPaymentService
{
    public const MERCHANT_ID = "679";
    public const USERNAME = "tocaan";
    public const PASSWORD = "ml4nf9wx2utuogcr";
    public const API_KEY = "nLuf1cAgcx2KFEViDSzxN785vXqlNx4FawQaQ086";

    /*
     * Test CREDENTIALS
     */
    // public const MERCHANT_ID = "1201";
    // public const USERNAME = "test";
    // public const PASSWORD = "test";
    // public const API_KEY = "jtest123";

    protected $paymentMode = 'test_mode';
    protected $test_mode = 1;
    protected $whitelabled = true;
    protected $paymentUrl = "https://api.upayments.com/test-payment";
    protected $apiKey = '';

    public function __construct()
    {
        if (env('UPAY_PAYMENT_MODE') == 'live_mode') {
            $this->paymentMode = 'live_mode';
            $this->test_mode = false;
            $this->paymentUrl = "https://api.upayments.com/payment-request";
            $this->apiKey = password_hash(config('services.payment_gateway.upayment.' . $this->paymentMode . '.API_KEY') ?? self::API_KEY, PASSWORD_BCRYPT);
            $this->whitelabled = false;
        } else {
            $this->apiKey = config('services.payment_gateway.upayment.' . $this->paymentMode . '.API_KEY') ?? self::API_KEY;
        }
    }

    public function send($order, $payment, $userToken = '')
    {
        if (auth()->check()) {
            $user = [
                'name' => auth()->user()->name ?? '',
                'email' => auth()->user()->email ?? '',
                'mobile' => auth()->user()->calling_code ?? '' . auth()->user()->mobile ?? '',
            ];
        } else {
            $user = [
                'name' => 'Guest User',
                'email' => 'test@test.com',
                'mobile' => '12345678',
            ];
        }

        $extraMerchantsData = array();
        $extraMerchantsData['amounts'][0] = $order['total'];
        $extraMerchantsData['charges'][0] = 0.350;
        $extraMerchantsData['chargeType'][0] = 'fixed'; // or 'percentage'
        $extraMerchantsData['cc_charges'][0] = 2.7; // or 'percentage'
        $extraMerchantsData['cc_chargeType'][0] = 'percentage'; // or 'percentage'
        $extraMerchantsData['ibans'][0] = env('IBAN', 'KW37GULB0000000000000096326345');

        $url = $this->paymentUrls();

        $fields = [
            'api_key' => $this->apiKey,
            'merchant_id' => config('setting.payment_gateway.upayment.' . $this->paymentMode . '.MERCHANT_ID') ?? self::MERCHANT_ID,
            'username' => config('setting.payment_gateway.upayment.' . $this->paymentMode . '.USERNAME') ?? self::USERNAME,
            'password' => stripslashes(config('setting.payment_gateway.upayment.' . $this->paymentMode . '.PASSWORD') ?? self::PASSWORD),
            'order_id' => $order['id'],
            'CurrencyCode' => 'KWD', //only works in production mode
            'CstFName' => $user['name'],
            'CstEmail' => $user['email'],
            'CstMobile' => $user['mobile'],
            'success_url' => $url['success'],
            'error_url' => $url['failed'],
            'ExtraMerchantsData' => json_encode($extraMerchantsData),
            'test_mode' => $this->test_mode, // 1 == test mode enabled
            'whitelabled' => $this->whitelabled, // false == in live mode
            'payment_gateway' => $payment,// knet / cc
            'reference' => $order['id'],
            'notifyURL' => url(route('front.checkout.webhooks')),
            'total_price' => $order['total'],
            // 'userToken' => $userToken,
        ];

        $fields_string = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->paymentUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        $server_output = json_decode($server_output, true);

        return $server_output['paymentURL'];
    }

    public function paymentUrls()
    {
        $url['success'] = url(route('front.checkout.payment-success'));
        $url['failed'] = url(route('front.checkout.payment-failed'));
        return $url;
    }
}
