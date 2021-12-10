<?php

namespace App\Http\Controllers\Api;
use illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree\Gateway;

class PaymentController extends Controller
{
    public $gateway;

    public function __construct() {
        $config = [
            'environment' => env('BRAINTREE_ENVIRONMENT', 'sandbox'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID', 'qcq7zvvn9d762mx3'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY', 'q23fjqkync3k2wmw'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY', '721a189e2041ab7d00ebc6b2bdf17cfd'),
        ];
     
        $this->gateway = new Gateway($config);
        
    }
    
    public function generate()
    {
        // dd( $this->gateway);
        $token = $this->gateway->clientToken()->generate();
        $data = [
            "success" => true,
            "token" => $token,
        ];
        return response()->json($data, 200);
    }
}
