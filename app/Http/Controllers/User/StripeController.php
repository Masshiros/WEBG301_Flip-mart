<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
class StripeController extends Controller
{
    public function StripeOrder(Request $request){
        
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }
        else{
            $total_amount = round(Cart::total());
        }
        
        \Stripe\Stripe::setApiKey('sk_test_51N02WBLE9QPY8aPNmMNUwEw9aQfmBB4o69LouVWadWFaqRynRDlPAXmHrvchNNz5BwtuKH1zZWubQm6zLnhR5cDM00mmixEAS6');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $total_amount*100,
        'currency' => 'usd',
        'description' => 'Flip Mart',
        'source' => $token,
        'metadata' => [
            'order_id' => uniqid(),
        ]
        ]);
        // dd($charge);
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'district_id' => $request->district_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,
            
            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
            
            'invoice_no' => 'FM'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending' ,
            'created_at' => Carbon::now(),
            
        ]);
        // Start Send Email

        $invoice = Order::findOrFail($order_id)
;        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];
        Mail::to($request->email)->send(new OrderMail($data));
         // End Send Email
        $carts = Cart::content();
        foreach($carts as $cart ){
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color, 
                'size' => $cart->options->size, 
                'quantity' => $cart->qty, 
                'price' => $cart->price, 
                'created_at' => Carbon::now(),
                
            ]);
        }
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        Cart::destroy();
        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('dashboard')->with($notification);
    } // end method
}