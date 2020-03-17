@extends('back-end.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Page</h1>
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

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>
                    <a href="{{url('teams/create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square"></i></a>
                </div>
                @if(Session::get('message'))
                    <div class="col-md-8 offset-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{Session::get('message')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

            @endif
            <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Member Name</th>
                            <th>Member Image</th>
                            <th>Member Designation</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Github</th>
                            <th>Youtube</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach( $teams as  $team)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $team->member_name}}</td>
                                <td><img src="{{asset($team->member_image)}}" alt="" width="100"></td>
                                <td>{{$team->member_designation}}</td>
                                <td><a href="{{$team->member_facebook}}"><i class="fa fa-facebook-f"></i></a></td>
                                <td><a href="{{$team->member_youtube}}"><i class="fa fa-twitter"></i></a></td>
                                <td><a href="{{$team->member_twitter}}"><i class="fa fa-github"></i></a></td>
                                <td><a href="{{$team->member_github}}"><i class="fa fa-youtube"></i></a></td>


                                <td class="project-state">
                                    <span class="badge badge-success">{{$team->status == 1 ? 'Published' : 'Unpublished'}}</span>
                                </td>
                                <td class="project-actions text-right">
                                    @if($team->status==1)
                                        <a href="{{route('unpublished-team',['id' => $team->id])}}" class="btn btn-info btn-sm" onclick="return confirm('Are You Sure ?')">
                                            <i class="fa fa-arrow-up"></i>
                                        </a>
                                    @else
                                        <a href="{{route('published-team',['id' => $team->id])}}" class="btn btn-warning btn-sm" onclick="return confirm('Are You Sure ?')">
                                            <i class="fa fa-arrow-down"></i>
                                        </a>
                                    @endif
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{url('team/'.$team->id.'/edit')}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <form action="{{url('team/'.$team->id)}}" method="post">

                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure')" type="submit">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Member Name</th>
                            <th>Member Image</th>
                            <th>Member Designation</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Github</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection