@extends('frontend.main_master')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Forget Password</li>
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
	<h4 class="">Forget Password</h4>
	<p class="">Forgot your password? No Problem</p>

    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login')  }}">
        @csrf
		<div class="form-group">
		    <label class="info-title" for="email">Email Address <span>*</span></label>
		    <input type="email" id="email" class="form-control unicase-form-control text-input" name="email">
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


<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brands')  
@endsection
