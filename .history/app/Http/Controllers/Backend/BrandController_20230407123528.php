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
            'brand_name_en.required' => 'required',
            'brand_name_vn.required' => 'required',
            'brand_name_cn.required' => 'required',
            'brand_image.required'   => 'required',
        ]);
    }
}