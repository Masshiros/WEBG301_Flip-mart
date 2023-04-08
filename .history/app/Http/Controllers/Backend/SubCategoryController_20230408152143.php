<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy()
        $subcategories = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategories'));
    }
}