<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        if(Session::has('coupon')){
            Session::forget('coupon');
         }
        $product = Product::findOrFail($id);

        if ($product->discount_price == null) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added On Your Cart']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added On Your Cart']);
        }
    }
    // MINI CART
    public function AddToMiniCart()
    {
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
    public function RemoveMiniCart($id)
    {
        Cart::remove($id);
        return response()->json(['success' => 'Product Remove From Cart Successfully']);
    }
    public function CouponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)
            ->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        $total = floatval(Cart::total());

        if ($coupon) {
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => floatval($coupon->coupon_discount),
                'discount_amount' => round($total * $coupon->coupon_discount / 100),
                'total_amount' => floatval(round($total - $total * $coupon->coupon_discount / 100)),
            ]);
            return response()->json(array(
                'success' => 'Coupon Applied Successfully',

            ));
        } else {
            return response()->json(['error', 'Invalid Coupon']);
        }
    } // end method
    public function CouponCalculation()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => floatval(Cart::total()),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => floatval(session()->get('coupon')['coupon_discount']),
                'discount_amount' => floatval(session()->get('coupon')['discount_amount']),
                'total_amount' => floatval(session()->get('coupon')['total_amount']),
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    } // end method
    // remove coupon
    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }// end method
}