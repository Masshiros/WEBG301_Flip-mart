<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add',compact('categories','brands'));
    }
    public function StoreProduct(Request $request){
        $image = $request->file('product_thumbnail');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_generate);
        $save_url = 'upload/products/thumbnail/' . $name_generate;
        $product_id = Product::insertGetId([
           'brand_id' => $request->brand_id,
           'subsubcategory_id' => $request->subsubcategory_id,
           'product_name_en' => $request->product_name_en,
           'product_name_cn' => $request->product_name_cn,
           'product_name_vn' => $request->product_name_vn,
           'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
           'product_slug_vn' => strtolower(str_replace(' ','-',$request->product_name_vn)),
           'product_slug_cn' => strtolower(str_replace(' ','-',$request->product_name_cn)),
           
           'product_code' => $request->product_code,
           'product_quantity' => $request->product_quantity,
           'discount_price' => $request->discount_price,
           'selling_price' => $request->brand_id,
           
           'product_tags_en' => $request->product_tags_en,
           'product_tags_vn' => $request->product_tags_vn,
           'product_tags_cn' => $request->product_tags_cn,
           
           'product_size_en' => $request->product_size_en,
           'product_size_vn' => $request->product_size_vn,
           'product_size_cn' => $request->product_size_cn,
           'product_size_vn' => $request->product_size_vn,
           
           'product_color_en' => $request->product_color_en,
           'product_color_vn' => $request->product_color_vn,
           'product_color_cn' => $request->product_color_cn,
           
           'short_description_en' => $request->short_description_en,
           'short_description_vn' => $request->short_description_vn,
           'short_description_cn' => $request->short_description_cn,
           'long_description_en' => $request->long_description_en,
           'long_description_vn' => $request->long_description_vn,
           'long_description_cn' => $request->long_description_cn,
           
           'hot_deals' => $request->hot_deals,
           'featured' => $request->featured,
           'special_offer' => $request->special_offer,
           'special_deals' => $request->special_deals,
           
           'product_thumbnail' => $save_url,
           'status' => 1,
           'created_at' => Carbon::now(),
           
           
            
        ]);
        ////////// MULTIPLE IMAGE UPLOAD 
        $images = $request->file('multi_img');
        foreach ($images as $image) {
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/multi-image/' . $name_generate);
            $uploadPath = 'upload/products/multi-image/' . $name_generate;   
            MultiImg::insert([
               'product_id' =>  
            ]);
        }
        
    }
}