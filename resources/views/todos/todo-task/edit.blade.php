@extends('todos.master')
@section('title')
    Edit Todo Task
@endsection

@section('body')

    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Todo Task</h4>


                    <form class="form-horizontal p-t-20" method="POST"
                          action="{{route('task.update',['id'=>$single_todo->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Todo List Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="todo_id" id="">
                                    <option value="" selected disabled>-- Select Todo List --</option>

                                    @foreach($todos as $todo)
                                        <option
                                            value="{{$todo->id}}" {{$single_todo->id == $todo->id?'selected':''}}>{{$todo->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">Tasks</label>
                            <div class="row col-md-9">
                                <div class="col-12" id="nearest-place-box">
                                    <div class="row inputFeatures">
                                        @foreach($single_todo->tasks as $key=>$option)

                                            @if($option != null)
                                                <div class="col-12 delete-dynamic-location">
                                                    <div class="row">
                                                        <div class="col-md-11 mt-2">
                                                            <input type="text" class="form-control" name="tasks[]"
                                                                   value="{{$option->name}}" id="inputFeature">
                                                        </div>
                                                        @if($key == 0)
                                                            <div class="col-md-1 mt-2">
                                                                <button id="addFeaturesRow" type="button"
                                                                        class="btn btn-success btn-sm nearest-row-btn">
                                                                    <i class="bi bi-plus-square"></i></button>
                                                            </div>
                                                        @else
                                                            <div class="col-md-1">
                                                                <button type="button"
                                                                        class="btn btn-danger btn-sm nearest-row-btn removeNearestPlaceRow">
                                                                    <i class="bi bi-trash"></i></button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @endif
                                                </div>
                                                @endforeach
                                    </div>
                                </div>
                            </div>

                            <div id="hidden-location-box" class="d-none pl-3 pr-3">
                                <div class="delete-dynamic-location">
                                    <div class="row mt-2">
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="tasks[]" id="inputFeautres">
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button"
                                                    class="btn btn-danger btn-sm nearest-row-btn removeNearestPlaceRow">
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                        <path
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                    </svg>
                                                </i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update
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
