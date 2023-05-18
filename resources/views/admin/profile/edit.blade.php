@extends('admin.admin_master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <h4 class="card-title">Edit Profile</h4>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input id="name" name="name" type="text" value="{{ auth()->user()->name }}" required class="form-control">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input id="email" name="email" type="email" value="{{ auth()->user()->email }}"  required class="form-control">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="profile-image" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input id="image" name="image" type="file" class="form-control">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded-circle avatar-xl" src="{{ asset('upload/admin_images/' . auth()->user()->profile_image) }}" alt="Card Image Cap">
                        </div>
                    </div>
                    <!-- end row -->
                    <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                </div>

            </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#image').change(function (e) {
               var reader = new FileReader();
                reader.onload = function (e) {
                     $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
