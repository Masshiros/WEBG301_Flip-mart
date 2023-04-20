<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;

class CartPageController extends Controller
{
   public function MyCart(){
        return view('frontend.cart.view_mycart');
   }
   public function GetCartProduct(){
        $carts = Cart::content();
        $cartQuantity = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQuantity' => $cartQuantity,
            'cartTotal' => round($cartTotal),
            
        ));
   }// end method
   public function RemoveCartProduct($id){
     Cart::remove($id);
     if(Session::has('coupon')){
        Session::forget('coupon');
     };
     return response()->json(['success' => 'Successfully Remove From Cart']);
   }//end 

   public function CartIncrement($id){
     $row = Cart::get($id);
     Cart::update($id,$row->qty + 1);
     if(Session::has('coupon')){
        $coupon_name = Session::get('coupon')['coupon_name'];
        $coupon = Coupon::where('coupon_name',$coupon_name)->first();
        $total = floatval(Cart::total());
        Session::put('coupon', [
          'coupon_name' => $coupon->coupon_name,
          'coupon_discount' => floatval($coupon->coupon_discount),
          'discount_amount' => round($total * $coupon->coupon_discount / 100),
          'total_amount' => floatval(round($total - $total * $coupon->coupon_discount / 100)),
      ]);
     }
     return response()->json('increment' );
   }// end method
   public function CartDecrement($id){
     $row = Cart::get($id);
     Cart::update($id,$row->qty - 1);
     if(Session::has('coupon')){
      $coupon_name = Session::get('coupon')['coupon_name'];
      $coupon = Coupon::where('coupon_name',$coupon_name)->first();
      $total = floatval(Cart::total());
      Session::put('coupon', [
        'coupon_name' => $coupon->coupon_name,
        'coupon_discount' => floatval($coupon->coupon_discount),
        'discount_amount' => round($total * $coupon->coupon_discount / 100),
        'total_amount' => floatval(round($total - $total * $coupon->coupon_discount / 100)),
    ]);
     return response()->json('decrement' );
   }// end method
  }
}