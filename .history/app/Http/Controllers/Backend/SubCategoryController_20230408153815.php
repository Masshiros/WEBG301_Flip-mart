<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategories','categories'));
    }
    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_vn' => 'required',
            'subcategory_name_cn' => 'required',
        ], [
            'category_id.required' => 'Please Input Category English Name',
            'subcategory_name_en.required' => 'Please Input Category Vietnamese Name',
            'subcategory_name_en.required' => 'Please Input Category Chinese Name',
            'category_icon.required' => 'Please Input Category Icon',
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