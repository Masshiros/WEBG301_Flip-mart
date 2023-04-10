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
        return view('backend.user.user_edit', compact('user'));
    }

    public function UserUpdate(Request $request){
        $user_id = $request->id;
        $data = User::find($user_id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();
        $notification = array(
        'message' => 'User Update Successfully',
        'alert-type' =>'info',
        );
        return redirect()->route('all.user')->with($notification);
    }

    public function UserDelete($id)
    {
        User::findOrFail($id)->delete();
        $notification = array(
            'message' => 'User Delete Successfully',
            'alert-type' =>'info',
            );
            return redirect()->back()->with($notification);
    }

}
