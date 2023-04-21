@extends('backend.admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!---------------ADD DISTRICT PAGE------------>
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit District</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('district.update')}}" >
                        @csrf
                        <input type="hidden" name="id" value="{{$district->id}}">
                        <div class="form-group">
                            <h5>Province Select <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="province_id" class="form-control">
                                    <option value="" selected="" disabled="">Select Province </option>
                                    @foreach($provinces as $province)
                                    <option value="{{$province->id}}" {{$province->id == $district->province_id ? 'selected' : ''}}>{{$province->province_name}}</option>
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
                                        <input type="text"  name="district_name" value="{{$district->district_name}}"
                                            class="form-control">
                                            @error('district_name')
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