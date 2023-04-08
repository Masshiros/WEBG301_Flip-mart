@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <!---------------EDIT CATEGORY PAGE------------>
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('category.store')}}" >
                        @csrf
                            <div class="form-group">
                                <h5>Category Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="category_name_en"
                                            class="form-control" value="{{$category->category_name_en}}">
                                            @error('category_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                            </div>
                            <div class=" form-group">
                                    <h5>Category Name Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="category_name_vn"
                                            class="form-control" value="{{$category->category_name_vn}}">
                                                @error('category_name_vn')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                            </div>
                                        <div class=" form-group">
                                                <h5>Category Name Chinese <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"  name="category_name_cn"
                                                        class="form-control"  value="{{$category->category_name_cn}}">
                                                        @error('category_name_cn')
                                                            <span class="text-danger">{{$message}}</span>
                                                         @enderror
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                                <h5>Category Icon <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"  name="category_icon"
                                                        class="form-control"  ">
                                                        @error('category_icon')
                                                            <span class="text-danger">{{$message}}</span>
                                                         @enderror
                                            </div>
                                        </div>
                                     
                                        <div class=" text-xs-right">
                                                        <input type="submit"
                                                            class="btn btn-rounded btn-primary mb-5" value="Add New">
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