<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function UserView(){
        $user = User::latest()->get();
        return view('backend.user.user_view', compact('user'));
    }

    public function UserEdit($id){
        $user = User::findOrFail($id);
    }

}

