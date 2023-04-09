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
                       
                        <div class="form-group">
                            <h5>Email Field <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                        </div>
                       
                        <div class="form-group">
                            <h5>File Input Field <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="file" class="form-control" required> </div>
                        </div>
                  
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <h5>Minimum Number <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="number" name="minNum" class="form-control" required data-validation-required-message="This field is required" min="10">
                            </div>
                            <div class="form-control-feedback"><small><i>Must be higher than 10</i></small> - <small>Add <code>min</code> attribute for minimum number to accept. Also use <code>data-validation-min-message</code> attribute for min failure message</small></div>
                        </div>
                        <div class="form-group">
                            <h5>Text Input Range <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="text" class="form-control" required data-validation-required-message="This field is required" minlength="10" maxlength="20" placeholder="Enter number between 10 &amp; 20"> </div>
                        </div>
                        <div class="form-group">
                            <h5>Input with Button <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" required> 
                                    <span class="input-group-append">
                                      <button class="btn btn-info btn-sm" type="button">Go!</button>
                                    </span> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>No Characters, Only Numbers <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="noChar" class="form-control" required data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers"> </div>
                        </div>
                        <div class="form-group">
                            <h5>Pattern <span class="text-danger">*</span> <small><i>Must start with 'a' and end with 'z'</i></small></h5>
                            <div class="controls">
                                <input type="text" name="pattern" pattern="a.*z" data-validation-pattern-message="Must start with 'a' and end with 'z'" class="form-control" required>
                                <div class="form-control-feedback"><small>Add <code>pattern</code> attribute to set input pattern. Also use <code>data-validation-pattern-message</code> attribute for pattern failure message</small></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Enter URL <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" class="form-control" placeholder="Add URL" data-validation-regex-regex="((http[s]?|ftp[s]?):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*" data-validation-regex-message="Only Valid URL's">
                                <div class="form-control-feedback"><small>Add <code>data-validation-regex-regex</code> attribute for regular expression. Also use <code>data-validation-regex-message</code> attribute for regex failure message</small></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Enter Email Address <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Enter Valid Email"> </div>
                        </div>
                        <div class="form-group">
                            <h5>Enter Date <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="date" name="date" class="form-control" required data-validation-required-message="This field is required"> </div>
                            <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>

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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Select Max 2 Checkbox<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_4" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required>
                                        <label for="checkbox_4">I am unchecked Checkbox</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_5">
                                        <label for="checkbox_5">I am unchecked too</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_6">
                                        <label for="checkbox_6">You can check me</label>
                                    </fieldset>
                                </div> <small>Select any 2 options</small> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Minimum 2 Checkbox selection<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_7" value="1" data-validation-minchecked-minchecked="2" data-validation-minchecked-message="Choose at least two" name="styled_min_checkbox" required>
                                        <label for="checkbox_7">I am unchecked Checkbox</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_8" value="2">
                                        <label for="checkbox_8">I am unchecked too</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_9" value="3">
                                        <label for="checkbox_9">You can check me</label>
                                    </fieldset>
                                </div> <small>Select any 2 options</small> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Radio Buttons <span class="text-danger">*</span></h5>
                                <fieldset class="controls">
                                    <input name="group1" type="radio" id="radio_1" value="1" required>
                                    <label for="radio_1">Check Me</label>
                                </fieldset>
                                <fieldset>
                                    <input name="group1" type="radio" id="radio_2" value="2">
                                    <label for="radio_2">Or Me</label>									
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Inline Radio Buttons <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <fieldset>
                                        <input name="group2" type="radio" id="radio_3" value="Yes" required>
                                        <label for="radio_3">Check Me</label>
                                    </fieldset>
                                    <fieldset>
                                        <input name="group2" type="radio" id="radio_4" value="No">
                                        <label for="radio_4">Or Me</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-info">Submit</button>
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