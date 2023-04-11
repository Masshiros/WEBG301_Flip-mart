<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add',compact('categories','brands'));
    }
    public function StoreProduct(Request $request){
        Product::insert([
           'brand_id' => $request->brand_id,
           'subsubcategory_id' => $request->subsubcategory_id,
           'product_name_en' => $request->product_name_en,
           'product_name_cn' => $request->product_name_cn,
           'product_name_vn' => $request->product_name_vn,
           'product_slug_en' => $request->brand_id,
           'product_slug_vn' => $request->brand_id,
           'product_slug_en' => $request->brand_id,
           'product_code' => $request->product_code,
           'brand_id' => $request->brand_id,
           'brand_id' => $request->brand_id,
           'brand_id' => $request->brand_id,
           'brand_id' => $request->brand_id,
           'brand_id' => $request->brand_id,
           'brand_id' => $request->brand_id,
           'brand_id' => $request->brand_id,
           'brand_id' => $request->brand_id,
           'brand_id' => $request->brand_id,
           'brand_id' => $request->brand_id,
           'brand_id' => $request->brand_id,
           
            
        ]);
    }
}