<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
        $product = Product::findOrFail($id);
       
        if($product->discount_price == NULL){
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty'=> $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image'=> $product->product_thumbnail,
                    'size'=> $request->size,
                    'color'=> $request->color
                ]  
            ]);
            
            return response()->json(['success' => 'Successfully Added On Your Cart']);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty'=> $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image'=> $product->product_thumbnail,
                    'size'=> $request->size,
                    'color'=> $request->color
                ]  
            ]);  
            
            return response()->json(['success' => 'Successfully Added On Your Cart']);
        }
    }
    // MINI CART
    public function AddToMiniCart(){
        $carts = Cart::content();
        $cartQuantity = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQuantity' => $cartQuantity,
            'cartTotal' => round($cartTotal),
            
        ));
        
    } // end method
    // remove mini cart
    public function RemoveMiniCart($id){
        Cart::remove($id);
        return response()->json(['success' => 'Product Remove From Cart Successfully']);
    }
}