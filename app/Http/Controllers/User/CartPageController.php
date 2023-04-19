<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

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
     return response()->json(['success' => 'Successfully Remove From Cart']);
   }//end 

   public function CartIncrement($id){
     $row = Cart::get($id);
     Cart::update($id,$row->qty + 1);
     return response()->json('increment' );
   }// end method
   public function CartDecrement($id){
     $row = Cart::get($id);
     Cart::update($id,$row->qty - 1);
     return response()->json('decrement' );
   }// end method
}