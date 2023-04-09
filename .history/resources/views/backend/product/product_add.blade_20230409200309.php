@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Add Product</h4>
         
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form novalidate>
                  <div class="row">
                    <div class="col-12">	
                        <div class="row"> <!--Start 1st row-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Brand </option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" >{{$brand->brand_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!--Start col-4-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category </option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" >{{$category->category_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!--Start col-4-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control">
                                            <option value="" selected="" disabled="">Select SubCategory </option>
                                           
                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!--Start col-4-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subsubcategory_id" class="form-control">
                                            <option value="" selected="" disabled="">Select SubSubCategory </option>
                                           
                                        </select>
                                        @error('subsubcategory_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!--Start col-3-->
                           
                        </div>	<!--End 1st row-->	

                        <div class="row"> <!--Start 2nd row-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Product Name En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control" >
                                        @error('product_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div> <!--Start col-3-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-group">
                                        <h5>Product Name Cn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_cn" class="form-control" >
                                            @error('product_name_cn')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> <!--Start col-4-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-group">
                                        <h5>Product Name Vn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_vn" class="form-control" >
                                            @error('product_name_vn')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> <!--Start col-4-->
                           
                        </div>	<!--End 2nd row-->
                        <div class="row"> <!--Start 3rd row-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" >
                                        @error('product_code')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div> <!--Start col-3-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_quantity" class="form-control" >
                                        @error('product_quantity')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div> <!--Start col-4-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                        <h5>Product Tags En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" >
                                            @error('product_tags_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    
                                </div>
                            </div> <!--Start col-4-->                           
                        </div>	<!--End 3rd row-->	

                        <div class="row"> <!--Start 4th row-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                        <h5>Product Tags En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" >
                                            @error('product_tags_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    
                                </div>
                            </div> <!--Start col-4-->                           
                            <div class="col-md-4">
                                
                                    <div class="form-group">
                                        <h5>Product Tags Vn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_vn" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" >
                                            @error('product_tags_vn')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    </div>
                                
                            </div> <!--Start col-3-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags Cn <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_cn" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" >
                                        @error('product_tags_cn')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div> <!--Start col-4-->      
                           
                        </div>	<!--End 4th row-->				
                       	<div class="row"> <!-- Start 5th row-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <h5>Product Size En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_en" class="form-control" value="Small, Medium, Large" data-role="tagsinput" >
                                            @error('product_tags_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> <!--End col-4-->    
                        </div>	<!-- t 5th row-->
                       
                        
                       
                        <div class="form-group">
                            <h5>File Input Field <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="file" class="form-control" required> </div>
                        </div>
                                   
                        <div class="form-group">
                            <h5>Basic Select <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="select" id="select" required class="form-control">
                                    <option value="">Select Your City</option>
                                    <option value="1">India</option>
                                    <option value="2">USA</option>
                                    <option value="3">UK</option>
                                    <option value="4">Canada</option>
                                    <option value="5">Dubai</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Textarea <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                            </div>
                        </div>
                    
                 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Checkbox <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="checkbox" id="checkbox_1" required value="single">
                                    <label for="checkbox_1">Check this custom checkbox</label>
                                </div>								
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Checkbox Group <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" required value="x">
                                        <label for="checkbox_2">I am unchecked Checkbox</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" value="y">
                                        <label for="checkbox_3">I am unchecked too</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="text-xs-right">
                        <input type="submit" value="Add New Product" class="btn rounded btn-primary mb-5">
                    </div>
                </form>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
       
        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Category list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category Icon</th>
                            <th>Category English</th>
                            <th>Category Vietnam</th>
                            <th>Category Chinese</th>
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
        <!-- /.col -->
        <!---------------ADD CATEGORY PAGE------------>
        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Category</h3>
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
                                            class="form-control">
                                            @error('category_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                            </div>
                            <div class=" form-group">
                                    <h5>Category Name Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="category_name_vn"
                                            class="form-control"  >
                                                @error('category_name_vn')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                            </div>
                                        <div class=" form-group">
                                                <h5>Category Name Chinese <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"  name="category_name_cn"
                                                        class="form-control">
                                                        @error('category_name_cn')
                                                            <span class="text-danger">{{$message}}</span>
                                                         @enderror
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                                <h5>Category Icon <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"  name="category_icon"
                                                        class="form-control">
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