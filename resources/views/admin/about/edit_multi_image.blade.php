@extends('admin.admin_master');
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title px-3 py-3">
                            <h4>Edit Image Page</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('update.edit_image') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="input-group">
                                    <input type="hidden" name="id", id="", value="{{ $editImage->id }}">
                                </div>

                                {{-- Home slider image Field --}}
                                <div class="row mb-3">
                                    <label for="image_path" class="col-sm-2">Upload Image</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="image_path" name="image_path">
                                        </div>
                                        @error('image_path')
                                            <span class="fs-6">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- End Home slider image  field --}}

                                <div class="row mb-3">
                                    <label for="displayImg" class="col-sm-2"></label>
                                    <div class="col-sm-10 ">
                                        <img id="showImage" src="{{(!empty($editImage->image_path) ? url('/uploads/About_images/'.$editImage->image_path) : url('/uploads/no_image.png')) }} " class="rounded avatar-lg"  alt="Home Image">
                                    </div>
                                </div>
                                {{-- End field --}}

                                <div class="row mb-3">
                                    <input type="submit" value="Update Image" class="col-sm-2 btn btn-info waves-light">
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
            $('#image_path').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection