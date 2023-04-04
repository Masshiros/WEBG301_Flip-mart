@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-full">
    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Admin Profile Edit</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Current password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="oldpassword" class="form-control" required ">
                                                </div>
                                            </div>
                                        </div>
                                        <!--End col-md-6 -->


                                    </div> <!-- End row -->


                                    <div class=" text-xs-right">
                                                    <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                        value="Update">
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

@endsection