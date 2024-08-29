@extends('admin.admin_master');
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

@section('admin')
<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Blogs</h4> <br>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($allBlogs as $blog)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $blog->blog_title }}</td>
                                <td>{{ $blog->blog_description }}</td>
                                <td >
                                    <img src="{{ url($blog->blog_image) }}" alt="" style="width:20px; height:20px;" class="img-fluid">
                                </td>
                                <td>{{ $blog['category']['cat_title'] }}</td>
                                <td class="d-flex gap-3">
                                    <a href="{{ route('edit.portfolio', $blog->id) }}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('delete.portfolio', $blog->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    </div>
</div>
@endsection