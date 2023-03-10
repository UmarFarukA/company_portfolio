@extends('admin.admin_master');
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title px-3 py-3">
                            <h4>Edit Home Slider Page</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin_home_slider') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div>
                                    <input type="hidden" id=1, name="id" value="{{ $aboutpage->id }}">
                                </div>
                                {{-- Title Field --}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2">Title</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ $aboutpage->title }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- End Title field --}}

                                {{-- Short Title Field --}}
                                <div class="row mb-3">
                                    <label for="short_title" class="col-sm-2">Short title</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" id="short_title" name="short_title" value="{{ $aboutpage->short_title }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- End uShort Title field --}}

                                {{-- Short description Field --}}
                                <div class="row mb-3">
                                    <label for="short_title" class="col-sm-2">Short Description</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" id="short_description" name="short_description" value="{{ $aboutpage->short_description }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- End Short description field --}}

                                 {{-- Short description Field --}}
                                 <div class="row mb-3">
                                    <label for="short_title" class="col-sm-2">Long Description</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" id="long_description" name="long_description" value="{{ $aboutpage->long_description }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- End Short description field --}}

                                {{-- Home slider image Field --}}
                                <div class="row mb-3">
                                    <label for="about_img" class="col-sm-2">About Image</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="about_img" name="about_img">
                                        </div>
                                    </div>
                                </div>
                                {{-- End Home slider image  field --}}

                                <div class="row mb-3">
                                    <label for="displayImg" class="col-sm-2"></label>
                                    <div class="col-sm-10 ">
                                        <img id="showImage" src="{{(!empty($aboutpage->home_img) ? url('/uploads/About_images/'.$aboutpage->home_img) : url('/uploads/no_image.png')) }} " class="rounded avatar-lg"  alt="Home Image">
                                    </div>
                                </div>
                                {{-- End field --}}

                                <div class="row mb-3">
                                    <input type="submit" value="Update Home Slide" class="col-sm-2 btn btn-info waves-light">
                                    <div class="col-sm-10 "></div>
                                    
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
            $('#about_img').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection