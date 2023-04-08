<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }
    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_vn' => 'required',
            'brand_name_cn' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name_en.required' => 'Please Input Brand English Name',
            'brand_name_vn.required' => 'Please Input Brand Vietnamese Name',
            'brand_name_cn.required' => 'Please Input Brand Chinese Name',
            'brand_image.required' => 'Please Input Brand Image',
        ]);
        $image = $request->file('brand_image');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand_images/' . $name_generate);
        $save_url = 'upload/brand_images/' . $name_generate;
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_vn' => $request->brand_name_vn,
            'brand_name_cn' => $request->brand_name_cn,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_vn' => strtolower(str_replace(' ', '-', $request->brand_name_vn)),
            'brand_slug_cn' => strtolower(str_replace(' ', '-', $request->brand_name_cn)),
            'brand_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }
    public function BrandUpdate(Request $request ){
        $brand_id = $request->id;
        $old_img = $request->
    }
}