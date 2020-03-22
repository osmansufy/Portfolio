@extends('back-end.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Category Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if(Session::get('message'))
            <div class="offset-2 col-md-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
    @endif
    <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="offset-2 col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url('blog/'.$blog->id)}}" method="post"  enctype="multipart/form-data">
                        @METHOD('PATCH')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category Name</label>

                                <select class="form-control" name="cat_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id==$blog->cat_id ? 'Selected' :''}}>{{$category->cat_name}}</option>
                                    @endforeach
                                </select>



                                {{--<input type="hidden" class="form-control" value="$portfolio->portfolio_title" name="id" placeholder="Enter Category Name">--}}
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <input type="text" class="form-control" value="{{$blog->post_title}}" name="post_title" placeholder="Enter Category Description">
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <input type="text" class="form-control" value="{{$blog->post_author}}" name="post_author" placeholder="Enter Category Description">
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <input type="text" class="form-control" value="{{$blog->post_desc}}" name="post_desc" placeholder="Enter Category Description">
                            </div>

                            <div class="form-group">
                                <label>portfolio image</label>
                                <input type="file" class="form-control" value="{{$blog->post_image}}" name="post_image" placeholder="Enter Category Description">
                                <img src="{{asset($blog->post_image)}}" alt="" width="100">
                            </div>
                            <div class="form-group">
                                <label>Publication Status</label>
                                <select class="form-control" name="status">
                                    <option>---Select Status---</option>
                                    <option value="1" {{$blog->status == 1 ? 'Selected':''}}>Published</option>
                                    <option value="0" {{$blog->status == 0 ? 'Selected':''}}>Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection