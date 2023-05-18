@extends('admin.admin_master')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <img class="rounded-circle avatar-xl mt-4" style="align-self: center" src="{{ asset('upload/admin_images/' . auth()->user()->profile_image) }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Name : {{ auth()->user()->name }}</h4>
                <hr>
                <h4 class="card-title">Email : {{ auth()->user()->email }}</h4>
                <hr>
                <a href="{{ route('admin.profile.edit') }}" class="btn btn-success btn-rounded waves-effect waves-light">Edit Profile</a>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
