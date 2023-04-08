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
            'category_id.required' => 'Please select category',
            'subcategory_name_en.required' => 'Please Input SubCategory Vietnamese Name',
            'subcategory_name_en.required' => 'Please Input SubCategory Chinese Name',
            'subcategory_name_cn.required' => 'Please Input SubCategory Icon',
        ]);
       
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_vn' => $request->subcategory_name_vn,
            'subcategory_name_cn' => $request->subcategory_name_cn,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_vn' => strtolower(str_replace(' ', '-', $request->subcategory_name_vn)),
            'subcategory_slug_cn' => strtolower(str_replace(' ', '-', $request->subcategory_name_cn)),
            
        ]);
        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}