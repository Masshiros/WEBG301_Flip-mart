<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
class CouponController extends Controller
{
    public function CouponView(){
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('backend.coupon.coupon_view',compact('coupons'));
    }
    public function CouponStore(Request $request){
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
            
        ], [
            'coupon_name.required' => 'Please Input Coupon Name',
            'coupon_discount.required' => 'Please Input Coupon Discount',
            'coupon_validity.required' => 'Please Input Coupon Validity Date',
        ]);
       
        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Coupon Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function CouponEdit($id){
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.coupon_edit',compact('coupon'));
    }
    public function CouponUpdate(Request $request){
        $cat_id = $request->id;
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
            
        ], [
            'coupon_name.required' => 'Please Input Coupon Name',
            'coupon_discount.required' => 'Please Input Coupon Discount',
            'coupon_validity.required' => 'Please Input Coupon Validity Date',
        ]);
        Coupon::findOrFail($cat_id)->update([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now()
           
        ]);
        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('manage-coupon')->with($notification);
    }
    public function CouponDelete($id){
        Coupon::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
        
    }
}