@extends('frontend.main_master')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	<div class="social-sign-in outer-top-xs">
		<a href="{{route('login.facebook')}}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="{{route('login.google')}}" class="google-sign-in"><i class="fa fa-google"></i> Sign In with Google</a>
	</div>

    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login')  }} " id="loginForm">
        @csrf
		<input type="hidden" name="form_name" value="login">
		<div class="form-group">
		    <label class="info-title" for="email">Email Address <span>*</span></label>
		    <input type="email" id="email" class="form-control unicase-form-control text-input" name="email">
			
			
			
				<span class="invalid-feedback" role="alert" id="email_error">
					
				</span>
			
			
			

		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input"  >
			
			
				<span class="invalid-feedback" role="alert" id="password_error">
					
				</span>
			
			

		</div>
		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio" id="remember_me" name="remember" value="option2">Remember me!
		  	</label>

		  	<a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>

        </div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
		
	</form>
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Create a new account</h4>
	<p class="text title-tag-line">Create your new account.</p>
	<form method="POST" action="{{ route('register') }}" name="register">
		@csrf
		<input type="hidden" name="form_name" value="register">
		<div class="form-group">
		    <label class="info-title" for="name">Name <span>*</span></label>
		    <input type="text" id="name" name="name" class="form-control unicase-form-control text-input"  >
			<?php if($errors->has('name')): ?>
				<span class="invalid-feedback" role="alert">
					<strong><?php echo e($errors->first('name')); ?></strong>
				</span>
			<?php endif; ?>
		</div>
		<div class="form-group">
	    	<label class="info-title" for="email">Email Address <span>*</span></label>
	    	<input type="text" name="email" class="form-control unicase-form-control text-input" id="email" >
			
			
			<?php if($errors->has('email')): ?>
				<span class="invalid-feedback" role="alert">
					<strong><?php echo e($errors->first('email')); ?></strong>
				</span>
			<?php endif; ?>
			
		</div>

        <div class="form-group">
		    <label class="info-title" for="phone">Phone Number <span>*</span></label>
		    <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" >
			<?php if($errors->has('phone')): ?>
				<span class="invalid-feedback" role="alert">
					<strong><?php echo e($errors->first('phone')); ?></strong>
				</span>
			<?php endif; ?>
		</div>
        <div class="form-group">
		    <label class="info-title" for="password">Password <span>*</span></label>
		    <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" >
			
			<?php if($errors->has('password')): ?>
				<span class="invalid-feedback" role="alert">
					<strong><?php echo e($errors->first('password')); ?></strong>
				</span>
			<?php endif; ?>
			
		</div>
         <div class="form-group">
		    <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
		    <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="password_confirmation" >
			<?php if($errors->has('password_confirmation')): ?>
				<span class="invalid-feedback" role="alert">
					<strong><?php echo e($errors->first('password_confirmation')); ?></strong>
				</span>
			<?php endif; ?>
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	</form>


</div>
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brands')


<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
	 $('#loginForm').submit(function (event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '/login',
                data: formData,
                success: function (response) {
					window.location.href = '/dashboard';
				},
				error: function(xhr, status, error) {
					var errors = xhr.responseJSON.errors;
					// console.log(errors);
					$('#email_error').html(`<strong>${errors.email}</strong>`)
					$('#password_error').html(`<strong>${errors.password ? errors.password : 'Wrong Password or Gmail'}</strong>`)

				}
            });
        });
   
</script>

@endsection
