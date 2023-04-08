<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategories', 'categories'));
    }
    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_vn' => 'required',
            'subcategory_name_cn' => 'required',
        ], [
            'category_id.required' => 'Please select category',
            'subcategory_name_en.required' => 'Please Input SubCategory English Name',
            'subcategory_name_vn.required' => 'Please Input SubCategory Vietnamese Name',
            'subcategory_name_cn.required' => 'Please Input SubCategory Chinese Name',
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
    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory', 'categories'));
    }
    public function SubCategoryUpdate(Request $request)
    {
        $subcat_id = $request->id;
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_vn' => 'required',
            'subcategory_name_cn' => 'required',
        ], [
            'category_id.required' => 'Please select category',
            'subcategory_name_en.required' => 'Please Input SubCategory English Name',
            'subcategory_name_vn.required' => 'Please Input SubCategory Vietnamese Name',
            'subcategory_name_cn.required' => 'Please Input SubCategory Chinese Name',
        ]);

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_vn' => $request->subcategory_name_vn,
            'subcategory_name_cn' => $request->subcategory_name_cn,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_vn' => strtolower(str_replace(' ', '-', $request->subcategory_name_vn)),
            'subcategory_slug_cn' => strtolower(str_replace(' ', '-', $request->subcategory_name_cn)),

        ]);
        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('all.subcategory')->with($notification);
    }
    public function SubCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    ////////////////////////////// SUB SUBCATEGORY ///////////////////
    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
      
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategories', 'categories'));
    }
    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }
    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_vn' => 'required',
            'subsubcategory_name_cn' => 'required',
        ], [
            'category_id.required' => 'Please select category',
            'subsubcategory_name_en.required' => 'Please Input SubCategory English Name',
            'subsubcategory_name_vn.required' => 'Please Input SubCategory Vietnamese Name',
            'subsubcategory_name_cn.required' => 'Please Input SubCategory Chinese Name',
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