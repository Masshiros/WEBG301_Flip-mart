@extends('frontend.main_master')
@section('content')
@section('title')
My Checkout
@endsection
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">		

                                        <!-- guest-login -->			
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle"> <b>Shipping Address</b></h4>


                                            <form class="register-form" action="{{route('checkout.store')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Shipping Name</b> <span>*</span></label>
                                                    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" 
                                                    id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name}}" require="">
                                            </div> {{--end form group --}}
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Email </b><span>*</span></label>
                                                    <input type="text" name="shipping_email" class="form-control unicase-form-control text-input" 
                                                    id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email}}" require="">
                                            </div> {{--end form group --}}
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Phone </b><span>*</span></label>
                                                    <input type="text" name="shipping_phone" class="form-control unicase-form-control text-input" 
                                                    id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone}}" require="">
                                            </div> {{--end form group --}}
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Post code</b> <span>*</span></label>
                                                    <input type="text" name="post_code" class="form-control unicase-form-control text-input" 
                                                    id="exampleInputEmail1" placeholder="Post code" require="">
                                            </div> {{--end form group --}}
                                                
                            
                                            
                                            
                                        </div>	
                                        <!-- guest-login -->



                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            
                                            
                                            <div class="form-group">
                                                <h5><b>Province Select </b><span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="province_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Province </option>
                                                        @foreach($provinces as $item)
                                                        <option value="{{$item->id}}" >{{$item->province_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('province_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div> 
                                            </div><!--end form group -->
                                            <div class="form-group">
                                                <h5><b>District Select</b> <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="district_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select District </option>
                                                    
                                                    </select>
                                                    @error('district_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div> 
                                            </div><!--end form group -->
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>Notes</b> <span>*</span></label>
                                                <textarea name="notes" cols="30" rows="5" class="form-control" placeholder="Notes"></textarea>
                                        </div> {{--end form group --}}
                                           
                                            
                                        </div>	
                                        <!-- already-registered-login -->		

                                    </div>			
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- End checkout-step-01  -->

					</div><!-- /.checkout-steps -->
				</div>
                <div class="col-md-4">
                                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        @foreach($carts as $item)
                                        <li>
                                            <strong>Image: </strong>
                                            <img src="{{asset($item->options->image)}}" style="height: 80px; width: 80px;" alt="">
                                        </li>
                                        <li>
                                            <strong>Qty : </strong>
                                            ( {{ $item->qty}} )
                                            <strong>Color : </strong>
                                            {{ $item->options['color']}}
                                            <strong>Size :</strong>
                                            {{ $item->options['size']}}
                                        </li>
                                        @endforeach()
                                        <hr>
                                        <li>
                                            @if(Session::has('coupon'))
                                            <strong>SubTotal: </strong> ${{$cartTotal}} 
                                            <hr>
                                            <strong>Coupon Name: </strong> {{session()->get('coupon')['coupon_name']}}
                                            ( {{session()->get('coupon')['coupon_discount']}} %)
                                            <hr>
                                            <strong>Coupon Discount: </strong> ${{session()->get('coupon')['discount_amount']}}
                                            <hr>
                                            <strong>GrandTotal:</strong> ${{session()->get('coupon')['total_amount']}}
                                            <hr>
                                            @else
                                            <strong>SubTotal: </strong> ${{$cartTotal}} 
                                            <hr>
                                            <strong>GrandTotal: </strong> ${{$cartTotal}} 
                                            <hr>
                                            @endif
                                            
                                        </li> 
                                        <hr>

                                        
                                        
                                    </ul>		
                                </div>
                            </div>
                        </div>
                    </div> 
                <!-- checkout-progress-sidebar -->				
                </div>
                <div class="row ">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"  >
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">                        
                                            <label for="">Stripe</label>
                                            <input type="radio" name="payment_method" value="stripe">
                                            <img src="{{asset('frontend/assets/images/payments/4.png')}}" alt="">
                                        </div><!-- end col-md-4-->
                                        <div class="col-md-4">                        
                                            <label for="">Card</label>
                                            <input type="radio" name="payment_method" value="card">
                                            <img src="{{asset('frontend/assets/images/payments/3.png')}}" alt="">
                                        </div><!-- end col-md-4-->
                                        <div class="col-md-4">                        
                                            <label for="">Cash</label>
                                            <input type="radio" name="payment_method" value="cash">
                                            <img src="{{asset('frontend/assets/images/payments/2.png')}}" alt="">
                                        </div><!-- end col-md-4-->
                                        
                                    </div> <!-- end row-->
                                    <hr>
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>
    
                                </div>
                            </div>
                        </div> 
                    <!-- checkout-progress-sidebar -->
                    </div>
                </div>
                                        </form>


			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <br>
    @include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="province_id"]').on('change',function(){
            var province_id = $(this).val();
            if(province_id){
                $.ajax({
                    url: "{{  url('/district/ajax')}}/"+province_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                       
                        var d = $('select[name="district_id"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="district_id"]').append('<option value= "'+ value.id +'">' + value.district_name + '</option>');
                        });
                    }
                })
            } else{
                alert('danger');
            }
        });
      
    });
</script>
@endsection















