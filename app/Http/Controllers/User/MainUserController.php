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

class MainUserController extends Controller
{
    public function MyOrders(){
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.order.view_order',compact('orders'));
    }
    // read order in detail
    public function OrderDetail($id){
        $order = Order::with('district','user')->where('id',$id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('created_at','DESC')->get();
        return view('frontend.user.order.order_detail',compact('order','orderItem'));
    }
}