@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Slider list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($slider as $item)
                        <tr>
                            <td>{{$item->slider_image}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                              @if($item->status == 1)
                              <span class="badge badge-pill badge-success">Active</span>
                              @else
                              <span class="badge badge-pill badge-danger">Inactive</span>
                              @endif
                            </td>

                            <td width="30%">
                                <a href="{{route('slider.edit', $item->id)}}" class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"></i></a>
                                <a href="{{route('slider.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Data"> <i class="fa fa-trash"></i></a>
                                @if($item->status == 1)
                                <a href="{{route('slider.inactive', $item->id)}}" class="btn btn-danger" title="Inactive now"> <i class="fa fa-arrow-down"></i></a>
                                @else
                                <a href="{{route('slider.active', $item->id)}}" class="btn btn-success" title="Active now"> <i class="fa fa-arrow-up"></i></a>
                                @endif
                              </td>

                        </tr>
                        @endforeach

                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <!---------------ADD SLIDER PAGE------------>
        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add slider</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class=" form-group">
                                    <h5>Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file"
                                        name="slider_image" class="form-control"
                                    >
                                    @error('slider_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                            </div>

                            <div class=" form-group">
                                    <h5>Title <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="title"
                                            class="form-control"  ">
                                                @error('title')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                            </div>
                                        <div class=" form-group">
                                                <h5>Description <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"  name="description"
                                                        class="form-control"  ">
                                                        @error('description')
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
