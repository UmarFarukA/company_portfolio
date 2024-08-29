@extends('admin.admin_master');
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title px-3 py-3">
                            <h4>Add Category</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('update.category', $editCategory->id) }}" method="POST">
                                @csrf

                                {{-- Title Field --}}
                                <div class="row mb-3">
                                    <label for="cat_title" class="col-sm-2">Category Title</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" id="cat_title" name="cat_title" value="{{ $editCategory->cat_title }}">
                                        </div>
                                        @error('cat_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror   
                                    </div>
                                </div>
                                {{-- End Title field --}}

                                

                                <div class="row mb-3">
                                    <input type="submit" value="Update Category" class="col-sm-2 btn btn-info waves-light">
                                    <div class="col-sm-10 "></div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script> --}}
@endsection