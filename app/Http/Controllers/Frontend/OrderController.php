<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Shipping;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $billingData = self::validate($request,[
            'b_first_name'      => 'required',
            'b_last_name'      => 'required',
            'b_email'      => 'required|email',
            'b_address'      => 'required',
            'b_city'      => 'required',
            'b_country'      => 'required',
            'b_zip_code'      => 'required',
            'b_phone'      => 'required',
            'payment'=>'required',
            'trams_and_conditions'=>'required'
        ]);

        if ($request->input('shipping_address')){
            $shippingData = self::validate($request,[
                's_first_name'      => 'required',
                's_last_name'      => 'required',
                's_email'      => 'required|email',
                's_address'      => 'required',
                's_city'      => 'required',
                's_country'      => 'required',
                's_zip_code'      => 'required',
                's_phone'      => 'required',
            ]);
            $shippingData['user_id'] = auth()->id();
            Shipping::create($shippingData);
        }
        $billingData['user_id']= auth()->id();
        Billing::create($billingData);


        $order_id = Str::limit(env('app_name'),3).rand(11111,99999);
        $order = Order::create([
            'user_id'=>auth()->id(),
            'order_id'=>$order_id,
            'customer_name'=>$request->input('b_first_name')." ".$request->input('b_last_name'),
            'order_time'=>now(),
            'payment_status'=>'pending',
            'order_status'=>'pending',
            'payment_method'=>$request->input('payment'),
        ]);

        Payment::create([
            'user_id'=>auth()->id(),
            'order_id'=>$order->order_id,
            'payment_method'=>$request->input('payment'),
        ]);


        $cartProduct = \Cart::getContent();
        foreach ($cartProduct as $c_product){
            OrderProduct::create([
                'order_id'=>$order->order_id,
                'product_id'=>$c_product->associatedModel->id,
                'product_name'=>$c_product->associatedModel->name,
                'product_image'=>$c_product->associatedModel->image,
                'product_price'=>$c_product->price,
            ]);
        }

        OrderDetails::create([
            'order_id'=>$order->order_id,
            'grand_total'=>\Cart::getTotal(),
            'shipping_charge'=>"free",
            'total'=>\Cart::getTotal(),
            'shipping_information'=>json_encode($request->input('s_address')),
            'billing_information'=>json_encode($request->input('b_address')),
            'payment_method'=>$request->input('payment'),
            'payment_status'=>'pending',
        ]);


        \Cart::clear();

        toast("Order Submited",'success');
        return view('frontend.order.order_submitted');
    }
}
