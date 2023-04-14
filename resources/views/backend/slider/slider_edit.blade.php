@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!---------------EDIT SLIDER PAGE------------>
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit slider</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('slider.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$slider->id}}">
                        <input type="hidden" name="old_image" value="{{$slider->slider_image}}">

                            {{-- <div class="form-group">
                                <h5>Image<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input value="{{$slider->slider_image}}" type="file"  name="slider_image"
                                            class="form-control" ">
                                            @error('slider_image')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class=" form-group">
                                    <h5>Title <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input value="{{$slider->title}}" type="text"  name="title"
                                            class="form-control"  ">
                                                @error('title')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                            </div>

                            <div class=" form-group">
                                    <h5>Description<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="description"
                                        class="form-control" ">
                                        @error('description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                            </div> --}}
                            <div class="form-group">
                                <label for="slider_image">Image</label>
                                <input type="file" class="form-control-file" id="slider_image" name="slider_image">
                                <img src="{{ asset($slider->slider_image) }}" alt="Slider Image" width="100">
                                <input type="hidden" name="old_image" value="{{ $slider->slider_image }}">
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $slider->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" required>{{ $slider->description }}</textarea>
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
