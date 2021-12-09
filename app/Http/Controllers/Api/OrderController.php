<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function payment(Request $request)
    {
        // validazioni 
        $request->validate([
            'total'=>'required',
            'email'=> 'required|email', //tramite email fa' validascion da solo
            'address'=>'required',
            'fullName'=>'required',
        ]);


        $data = $request->all();
        $new_order = new Order();
        $new_order->fill($data);
        $new_order->save();

        if(isset($data['plate'])){
            foreach($data['plate'] as $key => $plate){
                $data['plates'][$plate] = [ 'quantity' => $data['quantity'][$key]];
            }
        }
        // dd($data['plates']);
        $new_order->plates()->attach($data['plates']);
        

        return redirect()->route('user.orders.index')->with('inserted', 'L\'Order è stato correttamente salvato');
    }
}
