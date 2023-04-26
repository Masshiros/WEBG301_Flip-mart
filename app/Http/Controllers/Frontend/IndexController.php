<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
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

        // COLOR
        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);
        $color_cn = $product->product_color_cn;
        $product_color_cn = explode(',',$color_cn);
        $color_vn = $product->product_color_vn;
        $product_color_vn = explode(',',$color_vn);

        // SIZE
        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);
        $size_cn = $product->product_size_cn;
        $product_size_cn = explode(',',$size_cn);
        $size_vn = $product->product_size_vn;
        $product_size_vn = explode(',',$size_vn);
        
        $multiImages = MultiImg::where('product_id',$id)->get();

        // related product
        $cat_id = $product->subsubcategory->subcategory->category['id'];
        $relatedProduct = Product::whereHas('subsubcategory.subcategory.category', function ($query) use ($cat_id) {
            $query->where('id', $cat_id);
        })->where('id','!=',$id)->orderBy('id','DESC')->get();
       
        
        return view('frontend.product.product_detail',compact('product','multiImages',
        'product_color_en','product_color_cn','product_color_vn','product_size_en','product_size_cn','product_size_vn','relatedProduct'));
    }
    // tag-wised product
    public function ProductByTags($tag){
        $tag = $tag;
        $products = Product::where('status',1)->where('product_tags_en',$tag)
        ->orWhere('product_tags_cn',$tag)->orWhere('product_tags_vn',$tag)
        ->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.tags.tags_view',compact('products','categories','tag'));
    }
    // subcategory-wised product
    public function SubCatWiseProduct($id, $slug){
        $products = Product::where('status', 1)
            ->whereHas('subsubcategory.subcategory', function ($query) use ($id) {
            $query->where('subcategory_id', $id);
        })
        ->orderBy('id', 'DESC')
        ->paginate(3);
        $subcategory = SubCategory::findOrFail($id);
        $sub_name_en = $subcategory['subcategory_name_en'];
        $sub_name_cn = $subcategory['subcategory_name_cn'];
        $sub_name_vn = $subcategory['subcategory_name_vn'];
        
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.subcategory_view',compact('products','categories','sub_name_en','sub_name_cn','sub_name_vn'));
    }
    // subsubcategory-wised product
    public function SubSubCatWiseProduct($id, $slug){
        $products = Product::where('status', 1)->where('subsubcategory_id',$id)
        ->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        $subsub_name_en = $subsubcategory['subsubcategory_name_en'];
        $subsub_name_cn = $subsubcategory['subsubcategory_name_cn'];
        $subsub_name_vn = $subsubcategory['subsubcategory_name_vn'];
        return view('frontend.product.subsubcategory_view',compact('products','categories','subsub_name_en','subsub_name_cn','subsub_name_vn'));
    }
    // AJAX - product modal view
    public function ProductViewAjax($id){
        $product = Product::findOrFail($id);
        // name 
        $product_name_en = $product->product_name_en;
        $product_name_cn = $product->product_name_cn;
        $product_name_vn = $product->product_name_vn;
        // category
        $category_name_en = $product->subsubcategory->subcategory->category['category_name_en'];
        $category_name_cn = $product->subsubcategory->subcategory->category['category_name_cn'];
        $category_name_vn = $product->subsubcategory->subcategory->category['category_name_vn'];
        // brand
        $brand_name_en = $product->brand['brand_name_en'];
        $brand_name_cn = $product->brand['brand_name_cn'];
        $brand_name_vn = $product->brand['brand_name_vn'];
        // COLOR
        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);
        $color_cn = $product->product_color_cn;
        $product_color_cn = explode(',',$color_cn);
        $color_vn = $product->product_color_vn;
        $product_color_vn = explode(',',$color_vn);

        // SIZE
        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);
        $size_cn = $product->product_size_cn;
        $product_size_cn = explode(',',$size_cn);
        $size_vn = $product->product_size_vn;
        $product_size_vn = explode(',',$size_vn);
        $language = session('language');
        switch($language){
            case 'chinese' :
                return response()->json(array(
                    'product' => $product,
                    'brand' => $brand_name_cn,
                    'pname' =>$product_name_cn,
                    'category' => $category_name_cn,
                    'color' => $product_color_cn,
                    'size' => $product_size_cn,
                ));
                break;
            case 'vietnamese' :
                return response()->json(array(
                    'product' => $product,
                    'brand' => $brand_name_vn,
                    'pname' =>$product_name_vn,
                    'category' => $category_name_vn,
                    'color' => $product_color_vn,
                    'size' => $product_size_vn,
                ));
                break;
            default: 
                return response()->json(array(
                    'product' => $product,
                    'brand' => $brand_name_en,
                    'pname' =>$product_name_en,
                    'category' => $category_name_en,
                    'color' => $product_color_en,
                    'size' => $product_size_en,
                ));
                break;

        }
        
    }
}