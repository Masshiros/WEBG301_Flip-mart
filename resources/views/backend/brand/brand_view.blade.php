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
              <h3 class="box-title">Brand list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Brand English</th>
                            <th>Brand Vietnam</th>
                            <th>Brand Chinese</th>
                            <th>Image</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $item)
                        <tr>
                            <td>{{$item->brand_name_en}}</td>
                            <td>{{$item->brand_name_vn}}</td>
                            <td>{{$item->brand_name_cn}}</td>
                            <td>
                                <img src="{{asset($item->brand_image)}}" style="width: 70px; height: 40px">
                            </td>
                            <td>
                                <a href="{{route('brand.edit', $item->id)}}" class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"></i></a>
                                <a href="{{route('brand.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Data"> <i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach

                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
This is a PHP code snippet that defines a model class named "Slider" within the "App\Models" namespace. This class extends the "Illuminate\Database\Eloquent\Model" class and utilizes the "Illuminate\Database\Eloquent\Factories\HasFactory" trait.

The "HasFactory" trait provides a factory builder method to the model, allowing for easy creation of model instances for testing and seeding purposes.

The "protected $guarded = []" statement indicates that no attributes are protected from mass-assignment. This means that any attribute can be set using the "create" or "update" methods of the model without explicitly setting each attribute.

Overall, this code defines a basic model for a slider that can be used to interact with a database using the Laravel framework.
        </div>
        <!-- /.col -->
        <!---------------ADD BRAND PAGE------------>
        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <h5>Brand Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="brand_name_en"
                                            class="form-control">
                                            @error('brand_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                            </div>
                            <div class=" form-group">
                                    <h5>Brand Name Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="brand_name_vn"
                                            class="form-control"  ">
                                                @error('brand_name_vn')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                            </div>
                                        <div class=" form-group">
                                                <h5>Brand Name Chinese <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"  name="brand_name_cn"
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
