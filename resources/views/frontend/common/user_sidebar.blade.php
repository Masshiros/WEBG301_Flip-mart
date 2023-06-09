@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp
<div class="col-md-2"><br>
    @if($user->facebook_id != NULL || $user->google_id != NULL)
    <img src="{{ (!empty($user->profile_photo_path)) ? $user->profile_photo_path : url('upload/no_image.jpg') }}" 
    @else
    <img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}" 
    @endif
    style="border-radius: 50%" class="card-img-top" height="100%" width="100%"><br><br>
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        <a href="{{route('change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{route('my.orders')}}" class="btn btn-primary btn-sm btn-block">Orders</a>
        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>
</div> <!-- End col-md2-->