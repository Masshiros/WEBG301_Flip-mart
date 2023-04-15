<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id','DESC')->limit(3)->get();
        $featuredProduct = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $hot_dealProduct = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
        $special_offerProduct = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();
        $special_dealsProduct = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();
        $skip_category = Category::skip(0)->first();
        return view('frontend.index',compact('categories','products','featuredProduct','hot_dealProduct','special_offerProduct','special_dealsProduct','sliders'));

    }
    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }
    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('dashboard')->with($notification);
    }
    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }
    public function UserPasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',

        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();
            return redirect()->route('user.logout');
        } else {
            return redirect()->back();
        }
    }
    public function ProductDetail($id,$slug){
        $product = Product::findOrFail($id);
        $multiImages = MultiImg::where('product_id',$id)->get();
        return view('frontend.product.product_detail',compact('product','multiImages'));
    }

    public function ProductByTags($tag){
        $products = Product::where('status',1)->where('product_tags_en',$tag)
        ->where('product_tags_cn',$tag)->where('product_tags_vn',$tag)->orderBy('id','DESC')->get();
        return view('frontend.tags.tags_view',compact('products'));
    }
}