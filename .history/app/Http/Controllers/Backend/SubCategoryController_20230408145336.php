<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        sub$categories = SubCategory::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }
}