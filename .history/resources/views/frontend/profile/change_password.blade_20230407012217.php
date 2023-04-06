@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                    <img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}" 
                    style="border-radius: 50%" class="card-img-top" height="100%" width="100%"><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
            </div> <!-- End col-md2-->
            <div class="col-md-2">

            </div> <!-- End col-md-2-->
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">Change Password</span><strong></strong> 
                    </h3>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="current_password">Current Password<span></span></label>
                                <input type="password" id="current_password" " class="form-control " name="oldpassword">
                                
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">New Password <span></span></label>
                                <input type="password" id="password"  class="form-control " name="password">
                                
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password <span></span></label>
                                <input type="password" id="password_confirmation"  class="form-control " name="password_confirmation">
                                
                            </div>
                          
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                                
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div> <!-- End col-md-6 -->
        </div> <!-- End row-->
    </div>
</div>


@endsection