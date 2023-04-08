<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }
    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_vn' => 'required',
            'category_name_cn' => 'required',
            'category_icon' => 'required',
        ], [
            'cateogory_name_en.required' => 'Please Input Brand English Name',
            'cateogory_name_vn.required' => 'Please Input Brand Vietnamese Name',
            'cateogory_name_cn.required' => 'Please Input Brand Chinese Name',
            'cateogory_image.required' => 'Please Input Brand Image',
        ]);
       
        Brand::insert([
            'cateogory_name_en' => $request->cateogory_name_en,
            'cateogory_name_vn' => $request->cateogory_name_vn,
            'cateogory_name_cn' => $request->cateogory_name_cn,
            'cateogory_slug_en' => strtolower(str_replace(' ', '-', $request->cateogory_name_en)),
            'cateogory_slug_vn' => strtolower(str_replace(' ', '-', $request->cateogory_name_vn)),
            'cateogory_slug_cn' => strtolower(str_replace(' ', '-', $request->cateogory_name_cn)),
            'cateogory_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}