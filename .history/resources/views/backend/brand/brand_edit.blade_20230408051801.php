@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      <div class="row">      
        <!---------------EDIT BRAND PAGE------------>
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('brand.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$brand->id}}">
                        <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                            <div class="form-group">
                                <h5>Brand Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input value="{{$brand->brand_name_en}}" type="text"  name="brand_name_en"
                                            class="form-control">
                                            @error('brand_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                            </div>
                            <div class=" form-group">
                                    <h5>Brand Name Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input value="{{$brand->brand_name_vn}}" type="text"  name="brand_name_vn"
                                            class="form-control"  ">
                                                @error('brand_name_vn')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                            </div>
                                        <div class=" form-group">
                                                <h5>Brand Name Chinese <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input value="{{$brand->brand_name_cn}}" type="text"  name="brand_name_cn"
                                                        class="form-control"  ">
                                                        @error('brand_name_cn')
                                                            <span class="text-danger">{{$message}}</span>
                                                         @enderror
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" 
                                                            name="brand_image" class="form-control"
                                                            >
                                                        @error('brand_image')
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