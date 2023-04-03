<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view', compact('adminData'));
    }
    public function AdminProfileEdit(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view', compact('adminData'));
    }
}