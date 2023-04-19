@extends('backend.admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!---------------EDIT COUPON PAGE------------>
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Coupon</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('coupon.update')}}" >
                        @csrf
                        <input type="hidden" name="id" value="{{$coupon->id}}">
                            <div class="form-group">
                                <h5>Coupon Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="coupon_name"
                                            class="form-control" value="{{$coupon->coupon_name}}">
                                            @error('coupon_name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                            </div>
                            <div class=" form-group">
                                    <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="coupon_discount"
                                            class="form-control" value="{{$coupon->coupon_discount}}"
                                                @error('coupon_discount')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                            </div>
                                        <div class=" form-group">
                                                <h5>Coupon Validity Date<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date"  name="coupon_validity"
                                                        class="form-control" value="{{$coupon->coupon_validity}}"
                                                        min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                                                        @error('coupon_validity')
                                                            <span class="text-danger">{{$message}}</span>
                                                         @enderror
                                            </div>
                                        </div>

                                     
                                        <div class=" text-xs-right">
                                                        <input type="submit"
                                                            class="btn btn-rounded btn-primary mb-5" value="Update">
                                        </div>
                    </form>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>
                 
           </div>
           <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>

@endsection