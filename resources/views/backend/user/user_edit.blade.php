@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!---------------EDIT user PAGE------------>
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit User</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('user.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="old_image" value="{{$user->profile_photo_path}}">
                            <div class="form-group">
                                <h5>User Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input value="{{$user->name}}" type="text"  name="name"
                                            class="form-control">
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                            </div>
                            <div class=" form-group">
                                    <h5>User Email <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input value="{{$user->email}}" type="text"  name="email"
                                            class="form-control">
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                            </div>
                                        <div class=" form-group">
                                                <h5>user Phone <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input value="{{$user->phone}}" type="text"  name="phone"
                                                        class="form-control"  ">
                                                        @error('phone')
                                                            <span class="text-danger">{{$message}}</span>
                                                         @enderror
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                                    <h5>User Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file"
                                                            name="profile_photo_path" class="form-control"
                                                            >
                                                        @error('profile_photo_path')
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
