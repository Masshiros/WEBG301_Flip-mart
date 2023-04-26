<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDistrict;
use App\Models\ShipProvince;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($id){
        $ship = ShipDistrict::where('province_id',$id)->orderBy('district_name','ASC')->get();
        return json_encode($ship);
    }
    public function CheckoutStore(Request $request){
        // dd($request->all());
        $request->validate([
            'province_id' => 'required',
            'district_id' => 'required',
            'payment_method' => 'required',
        ], [
            'province_id.required' => 'Please Select Your Province For Shipping Purpose',
            'district_id.required' => 'Please Select Your District For Shipping Purpose',
            'payment_method.required' => 'Please Select Payment Method',
        ]);
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['district_id'] = $request->district_id;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();
        if($request->payment_method == 'stripe'){
            return view('frontend.payment.stripe',compact('data','cartTotal'));
        }elseif($request->payment_method == 'card'){
           return 'card';
        }else{
            return view('frontend.payment.cash',compact('data','cartTotal'));
        }
        
        
    }
}