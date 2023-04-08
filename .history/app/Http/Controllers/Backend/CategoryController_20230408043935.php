<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }
}