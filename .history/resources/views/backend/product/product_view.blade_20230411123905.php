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
              <h3 class="box-title">Product list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name English</th>
                            <th>Product Name Vietnam</th>
                            <th>Product Name Chinese</th>
                            <th>Product Name Chinese</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $item)
                        <tr>
                            <td><span><i class="{{$item->category_icon}}"></i></span></td>
                            <td>{{$item->category_name_en}}</td>
                            <td>{{$item->category_name_vn}}</td>
                            <td>{{$item->category_name_cn}}</td>
                          
                            <td>
                                <a href="{{route('category.edit', $item->id)}}" class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"></i></a>
                                <a href="{{route('category.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Data"> <i class="fa fa-trash"></i></a>
                            </td>
                            
                        </tr>
                        @endforeach
                       
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
              
        </div>
       
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>

@endsection