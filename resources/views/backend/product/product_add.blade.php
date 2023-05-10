@extends('backend.admin.admin_master')
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
                <form method="POST" action="{{ route('product-store')}}" enctype="multipart/form-data">
                    @csrf
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
                                            <input type="text" name="product_size_en" class="form-control" value="Small, Medium, Large" data-role="tagsinput" >
                                            @error('product_size_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    
                                </div>
                            </div> <!--End col-4-->    
                            <div class="col-md-4">
                                <div class="form-group">
                                   
                                        <h5>Product Size Chinese <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_cn" class="form-control" value="小, 中, 大" data-role="tagsinput" >
                                            @error('product_size_cn')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    
                                </div>
                            </div> <!--End col-4-->    
                            <div class="col-md-4">
                                <div class="form-group">
                                   
                                        <h5>Product Size Vn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_vn" class="form-control" value="Nhỏ,Vừa,To" data-role="tagsinput" >
                                            @error('product_size_vn')
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
                                    <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="product_thumbnail" class="form-control" onChange="mainThumbUrl(this)"> 
                                        @error('product_thumbnail')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    <img src="" id="mainThumb">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Multiple Images <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="multi_img[]" class="form-control" id="multiImg" multiple="multiple"> 
                                        @error('multi_img')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="row" id="preview_img">

                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="row"> <!--Start 8th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Short Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_description_en" id="textarea" class="form-control"  ></textarea>
                                        @error('short_description_en')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Short Description Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_description_vn" id="textarea" class="form-control"  ></textarea>
                                        @error('short_description_vn')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Short Description Chinese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_description_cn" id="textarea" class="form-control"  ></textarea>
                                        @error('short_description_cn')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End 8th row-->
                        <div class="row"> <!--Start 9th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Long Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="long_description_en" id="editor1" rows="10" cols="80" class="form-control"></textarea>
                                        @error('long_description_en')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Long Description Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="long_description_vn" id="editor2" rows="10" cols="80"  class="form-control" ></textarea>
                                        @error('long_description_vn')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Long Description Chinese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="long_description_cn" id="editor3" rows="10" cols="80" class="form-control" ></textarea>
                                        @error('long_description_cn')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End 9th row-->
                        <hr>
                       
                       
                      
                      
                    
                 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" name="hot_deals"  value="1">
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                        <label for="checkbox_3">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                               
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_4" name="special_offer"  value="1">
                                        <label for="checkbox_4">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                        <label for="checkbox_5">Special Deals</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="text-xs-right">
                        <input type="submit" value="Add New Product" class="btn btn-rounded btn-primary mb-5">
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
  <script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url: "{{  url('/admin/category/subcategory/ajax')}}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('select[name="subsubcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="subcategory_id"]').append('<option value= "'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                    }
                })
            } else{
                alert('danger');
            }
        });
        $('select[name="subcategory_id"]').on('change',function(){
            var subcategory_id = $(this).val();
            if(subcategory_id){
                $.ajax({
                    url: "{{  url('/admin/category/sub-subcategory/ajax')}}/"+subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="subsubcategory_id"]').append('<option value= "'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                        });
                    }
                })
            } else{
                alert('danger');
            }
        });
    });
</script>
<script type="text/javascript">
    function mainThumbUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThumb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);


        }
    }
</script>
<!---------------------------Show Multi Image JavaScript Code ------------------------>

<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>
<!--================================= End Show Multi Image JavaScript Code. ==================== --->
@endsection