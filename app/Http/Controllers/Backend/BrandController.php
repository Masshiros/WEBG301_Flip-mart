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
        $old_img = $request->old_image;
        // if user choose any image
        if($request->file('brand_image')){
            unlink($old_img);
            $image = $request->file('brand_image');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand_images/' . $name_generate);
            $save_url = 'upload/brand_images/' . $name_generate;
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_vn' => $request->brand_name_vn,
                'brand_name_cn' => $request->brand_name_cn,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_vn' => strtolower(str_replace(' ', '-', $request->brand_name_vn)),
                'brand_slug_cn' => strtolower(str_replace(' ', '-', $request->brand_name_cn)),
                'brand_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.brand')->with($notification);
        }else{
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_vn' => $request->brand_name_vn,
                'brand_name_cn' => $request->brand_name_cn,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_vn' => strtolower(str_replace(' ', '-', $request->brand_name_vn)),
                'brand_slug_cn' => strtolower(str_replace(' ', '-', $request->brand_name_cn)),

            ]);
            $notification = array(
                'message' => 'Br                and Updated Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.brand')->with($notification);
        }
    }
    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);
        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info',
        );
        return redirect()->back()->with($notification);
    }
}
