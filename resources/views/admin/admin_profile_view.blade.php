@extends('admin.admin_master');

@section('admin')
<div class="page-content">
    <div class="container-fluid">
        {{-- (!empty($profileData->profile_image)) ? url(''.$profileData->profile_image.'') : url('') --}}
        <div class="row">
            <div class="col-lg-6">
                <div class="card py-4 px-4">
                    <center class="mb-2">
                        <img src="{{ (!empty($profileData->profile_image) ? url('/uploads/admin_images/'.$profileData->profile_image) : url('/uploads/no_image.png')) }}" class="rounded-circle"  alt="">
                    </center>
                    <div class="car-body">
                        <span>
                            <h4 class="card-title">Name: {{ $profileData->name }}</h4>
                            <hr>
                        </span>
                        <span>
                            <h4 class="card-title">Email: {{ $profileData->email }}</h4>
                            <hr>
                        </span>
                        <span>
                            <h4 class="card-title">Username: {{ $profileData->username }}</h4>
                            <hr>
                        </span>
                    </div>
                    <div>
                        <a href="{{ route('admin_edit.profile') }}" class="btn btn-secondary rounded-md">Edit Profile</a>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
</div>

@endsection