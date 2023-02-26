@extends('admin.admin_master');
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title px-3 py-3">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin_store.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- Name Field --}}
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2">Name</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $editData->name }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- End Name field --}}

                                {{-- Userame Field --}}
                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2">Username</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" id="username" name="username" value="{{ $editData->username }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- End username field --}}

                                {{-- Email Field --}}
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2">Email</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $editData->email }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- End uEmail field --}}

                                {{-- profile image Field --}}
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-sm-2">Profile Picture</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="profileImage" name="profileImage">
                                        </div>
                                    </div>
                                </div>
                                {{-- End profile image  field --}}

                                <div class="row mb-3">
                                    <label for="profileImage" class="col-sm-2"></label>
                                    <div class="col-sm-10 ">
                                        <img id="showImage" src="{{(!empty($editData->profile_image) ? url('/uploads/admin_images/'.$editData->profile_image) : url('/uploads/no_image.png')) }} " class="rounded avatar-lg"  alt="Profile Image">
                                    </div>
                                </div>
                                {{-- End username field --}}

                                <div class="row mb-3">
                                    <input type="submit" value="Update profile" class="col-sm-2 btn btn-info waves-light">
                                    <div class="col-sm-10 ">
                                        
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#profileImage').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection