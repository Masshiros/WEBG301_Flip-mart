<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function BrandView(){
       $brands = Brand::latest()->get();
       return view('backend.brand.brand_view',compact('brands')) ;
    }
    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_vn' => 'required',
            'brand_name_cn' => 'required',
            'brand_image'   => 'required',
        ],[
            'brand_name_en.required' => 'Please Input Brand English Name',
            'brand_name_vn.required' => 'Please Input Brand Vietnamese Name',
            'brand_name_cn.required' => 'Please Input Brand Chinese Name',
            'brand_image.required'   => 'Please Input Brand Image',
        ]);
        $image = $request->file('brand_image');
        $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.):
    }
}