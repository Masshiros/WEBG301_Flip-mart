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
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_vn.required' => 'Input Brand Vietnamese Name',
            'brand_name_cn.required' => 'Input Brand English Name',
            'brand_image.required'   => 'Input Brand English Name',
        ]);
    }
}