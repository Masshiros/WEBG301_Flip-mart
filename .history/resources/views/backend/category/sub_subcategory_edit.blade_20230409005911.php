@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
       
    
        <!---------------EDIT SUBSUBCATEGORY PAGE------------>
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit SubSubCategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('subsubcategory.store')}}" >
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
                            <div class="form-group">
                                <h5>Sub-SubCategory English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subsubcategory_name_en"
                                            class="form-control" value="{{$subsubcategories->subsubcategory_name_en}}">
                                            @error('subsubcategory_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                            </div>
                            <div class=" form-group">
                                    <h5>Sub-SubCategory Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subsubcategory_name_vn"
                                            class="form-control" value="{{$subsubcategories->subsubcategory_name_vn}}" >
                                                @error('subsubcategory_name_vn')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                            </div>
                                        <div class=" form-group">
                                                <h5>Sub-SubCategory  Chinese <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"  name="subsubcategory_name_cn"
                                                        class="form-control" value="{{$subsubcategories->subsubcategory_name_cn}}">
                                                        @error('subsubcategory_name_cn')
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
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax')}}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
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
    });
</script>
@endsection