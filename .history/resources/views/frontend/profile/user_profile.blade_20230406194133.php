@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                    <img src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/no_image.jpg') }}" 
                    style="border-radius: 50%" class="card-img-top" height="100%" width="100%"><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
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
                        <span class="text-danger">Hi....</span><strong>{{ Auth::user()->name}}</strong> Update Your Profile
                    </h3>
                    <div class="card-body">
                        <form method="post" action="{{}}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="name">Name <span></span></label>
                                <input type="text" id="name" value="{{$user->name}}" class="form-control " name="name">
                                
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Email <span></span></label>
                                <input type="email" id="email" value="{{$user->email}}" class="form-control " name="email">
                                
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone <span></span></label>
                                <input type="text" id="phone" value="{{$user->phone}}" class="form-control " name="phone">
                                
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="profile_photo_path">User Image <span></span></label>
                                <input type="file" id="profile_photo_path" " class="form-control " name="profile_photo_path">
                                
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