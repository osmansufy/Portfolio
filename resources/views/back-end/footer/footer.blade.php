@extends('back-end.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Footer section</h1>
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
                        <h3 class="card-title">Footer section</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                        <div class="card-body">
                            <div class="form-group">
                                <label>Category Name</label>

                                <input type="hidden" class="form-control" value="$portfolio->portfolio_title" name="id" placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                                <label>Facebook </label>
                                <input type="text" class="form-control" value="{{$footer->facebook}}" name="facebook" placeholder="Enter Category Description">

                            </div>
                            <div class="form-group">
                                <label>Linkedin </label>
                                <input type="text" class="form-control" value="{{$footer->linkdin}}" name="linkdin" placeholder="Enter Category Description">
                            </div>
                            <div class="form-group">
                                <label>Youtube </label>
                                <input type="text" class="form-control" value="{{$footer->youtube}}" name="youtube" placeholder="Enter Category Description">
                            </div>
                            <div class="form-group">
                                <label>Twitter </label>
                                <input type="text" class="form-control" value="{{$footer->twitter}}" name="twitter" placeholder="Enter Category Description">
                            </div>
                            <div class="form-group">
                                <label>Category </label>
                                <input type="text" class="form-control" value="{{$footer->copyright}}" name="copyright" placeholder="Enter Category Description">
                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{route('footer/edit')}}" class="btn-info">Edit</a>

                        </div>


                </div>
            </div>
            {{--<!-- /.card -->--}}

        </section>
        <!-- /.content -->
    </div>
@endsection