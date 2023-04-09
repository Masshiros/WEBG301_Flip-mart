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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_quantity" class="form-control" >
                                        @error('product_quantity')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div> <!--Start col-2-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control" >
                                        @error('discount_price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div> <!--Start col-3-->                           
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control" >
                                        @error('selling_price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div> <!--Start col-3-->                           
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
                                   
                                        <h5>Product Size En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_en" class="form-control" value="Small, Medium, Large" data-role="tagsinput" >
                                            @error('product_tags_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    
                                </div>
                            </div> <!--End col-4-->    
                            <div class="col-md-4">
                                <div class="form-group">
                                   
                                        <h5>Product Size Chinese <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_cn" class="form-control" value="小, 中, 大" data-role="tagsinput" >
                                            @error('product_tags_cn')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    
                                </div>
                            </div> <!--End col-4-->    
                            <div class="col-md-4">
                                <div class="form-group">
                                   
                                        <h5>Product Size Vn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_vn" class="form-control" value="Nhỏ,Vừa,To" data-role="tagsinput" >
                                            @error('product_tags_vn')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    
                                </div>
                            </div> <!--End col-4-->    
                        </div>	<!-- End 5th row-->
                       	<div class="row"> <!-- Start 6th row-->
                            <div class="col-md-4">
                                <div class="form-group">
                                   
                                        <h5>Product Color En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_en" class="form-control" value="Black,Red,Blue" data-role="tagsinput" >
                                            @error('product_color_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    
                                </div>
                            </div> <!--End col-4-->    
                            <div class="col-md-4">
                                <div class="form-group">
                                   
                                        <h5>Product Color Chinese <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_cn" class="form-control" value="黑,红,蓝" data-role="tagsinput" >
                                            @error('product_color_cn')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    
                                </div>
                            </div> <!--End col-4-->    
                            <div class="col-md-4">
                                <div class="form-group">
                                   
                                        <h5>Product Color Vn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_vn" class="form-control" value="Đen, Đỏ, Xanh" data-role="tagsinput" >
                                            @error('product_color_vn')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    
                                </div>
                            </div> <!--End col-4-->    
                        </div>	<!-- End 5th row-->
                       
                        <div class="row"> <!--Start 7th row-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Thumbnail <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="product_thumbnail" class="form-control" required> 
                                        @error('product_thumbnail')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Multiple Images <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="multi_img[]" class="form-control" required> 
                                        @error('multi_img[]"')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="row"> <!--Start 9th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Short Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_description_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Short Description Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_description_vn" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Short Description Chinese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_description_cn" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                    
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End 9th row-->
                        <div class="row"> <!--Start 8th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Long Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="long_description_en" id="editor1" rows="10" cols="80" class="form-control" required placeholder="Textarea text"></textarea>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Long Description Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="long_description_vn" id="editor2" rows="10" cols="80"  class="form-control" required placeholder="Textarea text"></textarea>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Long Description Chinese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="long_description_cn" id="editor3" rows="10" cols="80" class="form-control" required placeholder="Textarea text"></textarea>
                                    
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End 8th row-->
                       
                      
                      
                    
                 
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
  

 
  
  </div>

@endsection