@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
    
        <!---------------EDIT SUBCATEGORY PAGE------------>
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit SubCategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('subcategory.store')}}" >
                        @csrf
                        
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" class="form-control">
                                        <option value="" selected="" disabled="">Select Category </option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>SubCategory English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subcategory_name_en"
                                            class="form-control" value="">
                                            @error('subcategory_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                            </div>
                            <div class=" form-group">
                                    <h5>SubCategory Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subcategory_name_vn"
                                            class="form-control"  >
                                                @error('subcategory_name_vn')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                            </div>
                                        <div class=" form-group">
                                                <h5>SubCategory  Chinese <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"  name="subcategory_name_cn"
                                                        class="form-control">
                                                        @error('subcategory_name_cn')
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