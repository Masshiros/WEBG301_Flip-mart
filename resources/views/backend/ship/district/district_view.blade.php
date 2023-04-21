@extends('backend.admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
       
        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">District list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            
                            <th>Province Name</th>
                            <th>District Name</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($districts as $item)
                        <tr>
                            <td>{{$item->province['province_name']}}</td>
                            <td>{{$item->district_name}}</td>                          
                            <td width="40%">
                                <a href="{{route('district.edit', $item->id)}}" class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"></i></a>
                                <a href="{{route('district.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Data"> <i class="fa fa-trash"></i></a>
                            </td>
                            
                        </tr>
                        @endforeach
                       
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
              
        </div>
        <!-- /.col -->
        <!---------------ADD DISTRICT PAGE------------>
        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add District</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('district.store')}}" >
                        @csrf
                        <div class="form-group">
                            <h5>Province Select <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="province_id" class="form-control">
                                    <option value="" selected="" disabled="">Select Province </option>
                                    @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->province_name}}</option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group">
                                <h5>District Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="district_name"
                                            class="form-control">
                                            @error('district_name')
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