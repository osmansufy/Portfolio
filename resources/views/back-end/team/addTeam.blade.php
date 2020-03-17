@extends('back-end.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Product Page</h1>
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
                        <h3 class="card-title">Add Portfolio</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url('teams')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label>Member name</label>
                                <input type="text" class="form-control" name="member_name" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                                <label>Member Image</label>
                                <input type="file" class="form-control" name="member_image" id="imgInp" >

                            </div>
                            <div class="form-group">
                                <label>Member Designation</label>
                                <input type="text" class="form-control" name="member_designation" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" class="form-control" name="member_facebook" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" class="form-control" name="member_twitter" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                                <label>Github</label>
                                <input type="text" class="form-control" name="member_github" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                                <label>Youtube</label>
                                <input type="text" class="form-control" name="member_youtube" placeholder="Enter Product Name">
                            </div>



                            <div class="form-group">
                                <label>Publication Status</label>
                                <select class="form-control" name="status">
                                    <option>---Select Status---</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection