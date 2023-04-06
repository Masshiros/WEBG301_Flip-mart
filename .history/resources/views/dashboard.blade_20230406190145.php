@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                    <img src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/no_image.jpg') }}" 
                    style="border-radius: 50%" class="card-img-top" height="100%" width="100%">
                    ul.list-group
            </div> <!-- End col-md2-->
            <div class="col-md-2">

            </div> <!-- End col-md-2-->
            <div class="col-md-8">

            </div> <!-- End col-md-8 -->
        </div> <!-- End row-->
    </div>
</div>


@endsection