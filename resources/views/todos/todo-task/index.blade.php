@extends('todos.master')
@section('title')
    Add Todo Task
@endsection

@section('body')

    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Todo Task</h4>


                    <form class="form-horizontal p-t-20" method="POST" action="{{route('task.new')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Todo List Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="todo_id" id="">
                                    <option value="" selected disabled>-- Select Todo List --</option>

                                    @foreach($todos as $todo)
                                        <option value="{{$todo->id}}">{{$todo->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--                        <div class="form-group row">--}}
                        {{--                            <label for="exampleInputuname3" class="col-sm-3 control-label">Task<span class="text-danger">*</span></label>--}}
                        {{--                            <div class="col-sm-9">--}}

                        {{--                                <input type="text" class="form-control" id="exampleInputuname3" name="name" placeholder="Sub Category Name">--}}

                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="form-group row">
                            <label class="col-sm-3">Task</label>
                            <div class="row col-md-9">
                                <div class="col-12" id="nearest-place-box">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="tasks[]" id="inputCategory">
                                        </div>
                                        <div class="col-md-1">
                                            <button id="addFeaturesRow" type="button"
                                                    class="btn btn-success btn-sm nearest-row-btn"><i
                                                    class="bi bi-plus-square"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="hidden-location-box" class="d-none pl-3 pr-3">
                                <div class="delete-dynamic-location">
                                    <div class="row mt-2">
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="tasks[]" id="inputCategory">
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button"
                                                    class="btn btn-danger btn-sm nearest-row-btn removeNearestPlaceRow">
                                                <i class="bi bi-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create
                                    New Todo Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
