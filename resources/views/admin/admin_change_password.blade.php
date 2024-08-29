@extends('admin.admin_master');
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title px-3 py-3">
                            <h4>Change Password</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($errors->all() as $err)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $err }}
                                </div>
                            @endforeach  
                            <form action="{{ route('admin.store_password') }}" method="POST">
                                @csrf
                                {{-- Name Field --}}
                                <div class="row mb-3">
                                    <label for="oldpassword" class="col-sm-2">Old Password</label>
                                    <div class="col-sm-10 ">
                                        <input type="password" class="form-control" id="oldpassword" name="oldpassword">
                                    </div>
                                </div>
                                {{-- End Name field --}}

                                {{-- New Password Field --}}
                                <div class="row mb-3">
                                    <label for="newpassword" class="col-sm-2">New Password</label>
                                    <div class="col-sm-10 ">
                                        <input type="password" class="form-control" id="newpassword" name="newpassword">
                                    </div>
                                </div>
                                {{-- End password field --}}

                                {{-- New Password Field --}}
                                <div class="row mb-3">
                                    <label for="confirm_password" class="col-sm-2">Confirm Password</label>
                                    <div class="col-sm-10 ">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                    </div>
                                </div>
                                {{-- End password field --}}

                                <div class="row mb-3">
                                    <input type="submit" value="Change Password" class="col-sm-2 btn btn-info waves-light">
                                    <div class="col-sm-10 "></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection