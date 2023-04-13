<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function English(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }
    public function Chinese(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','chinese');
        return redirect()->back();
    }
    public function Vietnamese(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','vietnamese');
        return redirect()->back();
    }
}