<?php

namespace App\Http\Controllers\Api;

use illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Plate;
use Braintree\Gateway;

class PaymentController extends Controller
{
    public $gateway;

    public function __construct()
    {
        $config = [
            'environment' => env('BRAINTREE_ENVIRONMENT', 'sandbox'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID', 'tjmvt4gq36y96wzw'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY', 'tb7sbwfqxhdxjkj3'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY', 'c91661577df3af7f2afeecb405dea073'),
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

    public function createOrder(Request $request)
    {
        $request["email"] = $request->dataClient["email"];
        $request["address"] = $request->dataClient["address"];
        $request["fullName"] = $request->dataClient["fullName"];
        $request->validate([
            'email' => 'required|email', //tramite email fa' validascion da solo
            'address' => 'required',
            'fullName' => 'required',
        ]);
        $request["total"] = 0;
        $request["paymentStatus"] = false;
        /* unset($request["dataClient"]);
        unset($request["token"]);*/
        $data = $request->all();

        if (isset($data['food'])) {
            foreach ($data['food'] as $key => $food) {
                $food = Plate::where('id', $food)->first();
                $data["total"] += $food["price"] * $data['quantity'][$key];
            }
        }
        $new_order = new Order();
        $new_order->fill($data);
        $new_order->save();
        if (isset($data['food'])) {
            foreach ($data['food'] as $key => $food) {
                $data['foods'][$food["id"]] = ['quantity' => $data['quantity'][$key]];
            }
        }

        // dd($data['foods']);
        if (isset($data['foods'])) {
            $new_order->foods()->attach($data['foods']);
        }
        return $new_order;
    }

    public function makePayment(Request $request)
    {
        return response()->json($request);
        $amount = 10;
        $result = $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success) {


            $data = [
                'ciao' => $request->token,
                "success" => true,
                "message" => "Transazione effetuata",
            ];
            return response()->json($data, 200);
        } else {

            $data = [
                "success" => false,
                "message" => "Transazione fallita",
            ];
            return response()->json($data, 404);
        }
    }

    public function foodOrder(Request $request)
    {
        // return response()->json($request,200);
        $cart = null;
        // foreach($request->food as $food ){
        $cart = Plate::where('id', $request->id)->first();
        // }
        $data = [
            "success" => true,
            "cart" => $cart,
        ];
        return response()->json($data, 200);
    }
}
