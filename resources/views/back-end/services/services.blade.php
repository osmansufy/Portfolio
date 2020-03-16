@extends('back-end.master')

@section('body')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Projects</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <a class="btn btn-primary btn-sm" href="{{url('services/create')}}">
            <i class="fas fa-plus">
            </i>
            ADD
        </a>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Services</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
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
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                               Services Name
                            </th>
                            <th style="width: 30%">
                                Services image
                            </th>
                            <th>
                               Services Details
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                       @foreach($services as $service)
                       
                        <tr>
                            <td>
                                #
                            </td>
                            <td>
                                <a>
                                  {{$service->service_title}}
                                </a>
                                <br/>
                                <small>
                                    {{$service->created_at}}
                                </small>
                            </td>
                            <td>
                                <img width="400" height="200" src="{{$service->service_img}}" alt="">
                            </td>
                            <td class="project_progress">
                                <textarea name="" id="" cols="30" rows="10">{{$service->service_desc}}</textarea>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-success">{{$service->status==1?'Published': 'Unpublished'}}</span>
                            </td>
                            <td class="project-actions text-right">
                                @if($service->status==1)
                                    <a href="{{route('unpublished-service',['id' => $service->id])}}" class="btn btn-info btn-sm" onclick="return confirm('Are You Sure ?')">
                                        <i class="fa fa-arrow-up"></i>
                                    </a>
                                @else
                                    <a href="{{route('published-service',['id' => $service->id])}}" class="btn btn-warning btn-sm" onclick="return confirm('Are You Sure ?')">
                                        <i class="fa fa-arrow-down"></i>
                                    </a>
                                @endif
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{url('services/'.$service->id.'/edit')}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                    <form action="{{url('services/'.$service->id)}}" method="post">

                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm"  type="submit">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                    </button>
                                    </form>
                            </td>
                        </tr>
@endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection