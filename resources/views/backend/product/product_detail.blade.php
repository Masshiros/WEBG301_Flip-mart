@extends('backend.admin.admin_master')
@section('admin')
<div class="container-full">


    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title"> Product Detail</h4>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
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
                                            <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}} >{{$brand->brand_name_en}}</option>
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
                                            <option value="{{$category->id}}"
                                                {{$category->id == $product->subsubcategory->subcategory->category['id'] ?
                                                'selected' : '' }}>
                                                {{$category->category_name_en}}
                                            </option>
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
                                            @foreach($subcategories as $subcategory)
                                            <option value="{{$category->id}}"
                                                {{$subcategory->id == $product->subsubcategory->subcategory['id'] ?
                                                'selected' : '' }}>
                                                {{$subcategory->subcategory_name_en}}
                                            </option>
                                            @endforeach
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
                                            @foreach($subsubcategories as $subsubcategory)
                                            <option value="{{$category->id}}"
                                                {{$subsubcategory->id == $product->subsubcategory['id'] ?
                                                'selected' : '' }}>
                                                {{$subsubcategory->subsubcategory_name_en}}
                                            </option>
                                            @endforeach
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
                                        <input type="text" name="product_name_en" class="form-control" value="{{$product->product_name_en}}" >
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
                                            <input type="text" name="product_name_cn" class="form-control" value="{{$product->product_name_cn}}" >
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
                                            <input type="text" name="product_name_vn" class="form-control" value="{{$product->product_name_vn}}">
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
                                        <input type="text" name="product_code" class="form-control" value="{{$product->product_code}}" >
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
                                        <input type="text" name="product_quantity" class="form-control" value="{{$product->product_quantity}}">
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
                                        <input type="text" name="discount_price" class="form-control" value="{{$product->discount_price}}" >
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
                                        <input type="text" name="selling_price" class="form-control" value="{{$product->selling_price}}" >
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
                                            <input type="text" name="product_tags_en" class="form-control" value="{{$product->product_tags_en}}" data-role="tagsinput" >
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
                                            <input type="text" name="product_tags_vn" class="form-control" value="{{$product->product_tags_vn}}" data-role="tagsinput" >
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
                                        <input type="text" name="product_tags_cn" class="form-control" value="{{$product->product_tags_cn}}" data-role="tagsinput" >
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
                                            <input type="text" name="product_size_en" class="form-control" value="{{$product->product_size_en}}" data-role="tagsinput" >
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
                                            <input type="text" name="product_size_cn" class="form-control" value="{{$product->product_tags_cn}}" data-role="tagsinput" >
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
                                            <input type="text" name="product_size_vn" class="form-control" value="{{$product->product_tags_vn}}" data-role="tagsinput" >
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
                                            <input type="text" name="product_color_en" class="form-control" value="{{$product->product_color_en}}" data-role="tagsinput" >
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
                                            <input type="text" name="product_color_cn" class="form-control" value="{{$product->product_color_cn}}" data-role="tagsinput" >
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
                                            <input type="text" name="product_color_vn" class="form-control" value="{{$product->product_color_vn}}" data-role="tagsinput" >
                                            @error('product_color_vn')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>

                                </div>
                            </div> <!--End col-4-->
                        </div>	<!-- End 5th row-->


                        <div class="row"> <!--Start 7th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Short Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_description_en" id="textarea" class="form-control" required placeholder="Textarea text" ">{!! $product->short_description_en!!}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Short Description Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_description_vn" id="textarea" class="form-control" required placeholder="Textarea text" >{!! $product->short_description_vn!!}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Short Description Chinese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_description_cn" id="textarea" class="form-control" required placeholder="Textarea text" >{!! $product->short_description_cn!!}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div> <!-- End 7th row-->
                        <div class="row"> <!--Start 8th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Long Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="long_description_en" id="editor1" rows="10" cols="80" class="form-control" required placeholder="Textarea text" >{!! $product->long_description_en!!}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Long Description Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="long_description_vn" id="editor2" rows="10" cols="80"  class="form-control" required placeholder="Textarea text"> {!! $product->long_description_vn!!}<</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Long Description Chinese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="long_description_cn" id="editor3" rows="10" cols="80" class="form-control" required placeholder="Textarea text" > {!! $product->long_description_cn!!}<</textarea>

                                    </div>
                                </div>
                            </div>
                        </div> <!-- End 8th row-->
                        <hr>






                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" name="hot_deals"  value="1" {{$product->hot_deals == 1 ? 'checked' : ''}}>
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="featured" value="1"  {{$product->featured == 1 ? 'checked' : ''}}>
                                        <label for="checkbox_3">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_4" name="special_offer"  value="1"  {{$product->special_offer == 1 ? 'checked' : ''}}>
                                        <label for="checkbox_4">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_5" name="special_deals" value="1"  {{$product->special_deals == 1 ? 'checked' : ''}}>
                                        <label for="checkbox_5">Special Deals</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>


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
    <!----------------------------------MULTIPLE IMAGE UPDATE AREA --->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
				  </div>

                    <div class="row row-sm">
                        @foreach($multiImgs as $img)
                        <div class="col-md-3">
                            <div class="card" ">
                                <img class="card-img-top" src="{{asset($img->photo_name)}}" style="height: 130px; width: 280px; object-fit:cover">
                              </div>
                        </div> <!-- end col md 3 -->
                        @endforeach
                    </div>

                    <br>
                    <br>


				</div>
			  </div>
        </div> <!--End row-->
    </section>
    <!----------------------------------END MULTIPLE IMAGE UPDATE AREA --->

    <!----------------------------------THUMBNAIL IMAGE UPDATE AREA --->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
				  </div>

                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="oldimage" value="{{$product->product_thumbnail}}">
                    <div class="row row-sm">

                        <div class="col-md-3">
                            <div class="card" ">
                                <img class="card-img-top" src="{{asset($product->product_thumbnail)}}" style="height: 130px; width: 280px; object-fit:cover">
                              </div>
                        </div> <!-- end col md 3 -->

                    </div>
                    <br>
                    <br>


				</div>
			  </div>
        </div> <!--End row-->
    </section>
    <!----------------------------------END THUMBNAIL IMAGE UPDATE AREA --->



  </div>
@endsection
