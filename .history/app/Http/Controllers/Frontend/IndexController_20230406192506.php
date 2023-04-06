<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }
    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
    }
}