<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.category_view', compact('categories'));
    }
}