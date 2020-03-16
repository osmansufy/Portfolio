@extends('back-end.master')

@section('body')
    <div class="content-wrapper">
        <section class="content mt-5">
            <div class="row">

                <div class=" offset-3 col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Budget</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <form action="{{url('services/'.$services->id)}}"  enctype="multipart/form-data" method="post">
                            @METHOD('PATCH')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Title</label>
                                    <input type="text" name="service_title" value="{{$services->service_title}}" id="" class="form-control">
                                    <input type="hidden" name="{{$services->id}}"  id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputSpentBudget">Image</label>
                                    <input type="file" name="service_img">
                                    <img width="400" height="200" src="{{asset($services->service_img)}}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="service_desc">Services details</label>
                                    <input type="text" value="{{$services->service_desc}}" name="service_desc" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Publication Status</label>
                                    <select class="form-control" name="status" required>
                                        <option>---Select Status---</option>
                                        <option value="1" {{$services->status==1? 'selected':''}}>Published</option>
                                        <option value="0" {{$services->status==0?"selected":""}}>Unpublished</option>
                                    </select>


                                </div>
                            </div>


                            <input type="submit" value="Create new service" class="btn btn-success float-right">

                        </form>
                        <!-- /.card-body -->
                    </div>


                    <!-- /.card -->
                </div>
            </div>
            <div class="row">

            </div>
        </section>
    </div>
@endsection