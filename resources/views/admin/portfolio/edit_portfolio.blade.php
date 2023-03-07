@extends('admin.admin_master');
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title px-3 py-3">
                            <h4>Edit Portfolio page</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('update.portfolio') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <input type="hidden" name="id" value="{{ $editPortfolio->id }}">
                                </div>

                                {{-- Title Field --}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2">Title</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ $editPortfolio->title }}">
                                        </div>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror   
                                    </div>
                                </div>
                                {{-- End Title field --}}

                                {{-- Short Title Field --}}
                                <div class="row mb-3">
                                    <label for="short_title" class="col-sm-2">Short title</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" id="short_title" name="short_title" value="{{ $editPortfolio->short_title }}">
                                        </div>
                                        @error('short_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                {{-- End uShort Title field --}}

                                 {{-- Short Title Field --}}
                                 <div class="row mb-3">
                                    <label for="description" class="col-sm-2">Description</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" id="description" name="description" value="{{ $editPortfolio->description }}">
                                        </div>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                {{-- End uShort Title field --}}

                                {{-- Home slider image Field --}}
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2">Portfolio Image</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                    </div>
                                </div>
                                {{-- End Home slider image  field --}}

                                <div class="row mb-3">
                                    <label for="displayImg" class="col-sm-2"></label>
                                    <div class="col-sm-10 ">
                                        <img id="showImage" src="{{(!empty($editPortfolio->image) ? url('/uploads/About_images/'.$editPortfolio->image) : url('/uploads/no_image.png')) }} " class="rounded avatar-lg"  alt="Home Image">
                                    </div>
                                </div>
                                {{-- End field --}}

                                <div class="row mb-3">
                                    <input type="submit" value="Update Portfolio" class="col-sm-2 btn btn-info waves-light">
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
            $('#image').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection