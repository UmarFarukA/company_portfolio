@extends('admin.admin_master');
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title px-3 py-3">
                            <h4>Add New Blog Page</h4><br>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('store.blog') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                
                                <div class="row mb-3">
                                    <label for="blog_title" class="col-sm-2">Title</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            
                                            <input type="text" class="form-control" id="blog_title" name="blog_title">
                                        </div>
                                        @error('blog_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror   
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="blog_description" class="col-sm-2">Description</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                           
                                            <input type="text" class="form-control" id="blog_description" name="blog_description">
                                        </div>
                                        @error('blog_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="blog_content" class="col-sm-2">Content</label>
                                    <div class="col-sm-10 ">
                                        <textarea id="elm1" name="blog_content"></textarea>
                                        @error('blog_content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="category" class="col-sm-2">Category</label>
                                    <div class="col-sm-10 ">
                                        <select class="form-select" name="category" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($categories as $category)
                                                <option value={{ $category->id }} name="category" >{{ $category->cat_title }}</option>
                                            @endforeach                                             
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2">Image</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="image" name="blog_image">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="row mb-3">
                                    <label for="displayImg" class="col-sm-2"></label>
                                    <div class="col-sm-10 ">
                                        <img id="showImage" src="{{(!empty($blogs->blog_image) ? url('/uploads/About_images/'.$blogs->blog_image) : url('/uploads/no_image.png')) }} " class="rounded avatar-lg"  alt="Blog Image">
                                    </div>
                                </div>
                                

                                <div class="row mb-3">
                                    <input type="submit" value="Add blog" class="col-sm-2 btn btn-info waves-light">
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