@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
       
        <div class="col-12">

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
                            <th>Product Eng</th>
                            <th>Product Price</th>
                            <th>Product Discount</th>
                            <th>Product Quantity</th>
                            <th>Product Status</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $item)
                        <tr>
                            <td> <img src="{{asset($item->product_thumbnail)}}" style="width: 60px; height: 50px;"></td>
                            <td>{{$item->product_name_en}}</td>
                            <td>{{$item->selling_price}}</td>
                            <td>{{$item->discount_price}}</td>
                            <td>{{$item->product_quantity}}</td>
                            <td>
                              @if($item->status == 1)
                              <span class="badge badge-pill badge-success">Active</span>
                              @else
                              <span class="badge badge-pill badge-danger">Inactive</span>
                              @endif
                            </td>
                            
                          
                            <td width="30%">
                                <a href="{{route('product.edit', $item->id)}}" class="btn btn-primary" title="Product Details Data"> <i class="fa fa-eye"></i></a>
                                <a href="{{route('product.edit', $item->id)}}" class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"></i></a>
                                <a href="{{route('product.edit',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Data"> <i class="fa fa-trash"></i></a>
                                @if($item->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger">Inactive</span>
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
       
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>

@endsection