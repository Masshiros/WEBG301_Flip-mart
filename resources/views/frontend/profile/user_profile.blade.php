@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-2">

            </div> <!-- End col-md-2-->
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">Hi....</span><strong>{{ Auth::user()->name}}</strong> Update Your Profile
                    </h3>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
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