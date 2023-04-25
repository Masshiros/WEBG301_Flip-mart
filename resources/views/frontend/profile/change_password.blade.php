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
                        <span class="text-danger">Change Password</span><strong></strong> 
                    </h3>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.password.update') }}" >
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="current_password">Current Password<span></span></label>
                                <input type="password" id="current_password" " class="form-control " name="oldpassword">
                                @error('oldpassword')
                                <span class="invalid-feedback" style="color:red" role="alert">
                                    <strong>You need to enter your old password</strong>
                                </span>
                                @enderror    
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">New Password <span></span></label>
                                <input type="password" id="password"  class="form-control " name="password">
                                @error('password')
                                <span class="invalid-feedback" style="color:red" role="alert">
                                    <strong>You need to enter your password</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password <span></span></label>
                                <input type="password" id="password_confirmation"  class="form-control " name="password_confirmation">
                                @error('password_confirmation')
			                    <span class="invalid-feedback" style="color:red" role="alert">
				                    <strong>{{ $message }}</strong>
			                    </span>
			                    @enderror
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