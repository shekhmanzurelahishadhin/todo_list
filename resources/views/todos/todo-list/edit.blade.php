@extends('todos.master')
@section('title')
    Update Todo List
@endsection

@section('body')
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Todo List</h4>

                    <form class="form-horizontal p-t-20" method="POST"
                          action="{{route('todo.update',['id'=>$todo->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Todo List Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" id="exampleInputuname3" name="name"
                                       value="{{$todo->name??null}}" placeholder="Todo List Name">


                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Todo List
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
