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
            'category_name_en.required' => 'Please Input Category English Name',
            'category_name_vn.required' => 'Please Input Category Vietnamese Name',
            'category_name_cn.required' => 'Please Input Category Chinese Name',
            'category_icon.required' => 'Please Input Category Image',
        ]);
       
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_vn' => $request->category_name_vn,
            'category_name_cn' => $request->category_name_cn,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_vn' => strtolower(str_replace(' ', '-', $request->category_name_vn)),
            'category_slug_cn' => strtolower(str_replace(' ', '-', $request->category_name_cn)),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}