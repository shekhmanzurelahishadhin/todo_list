@extends('todos.master')
@section('title')
    Manage Todo Task
@endsection

@section('body')

    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title">Manage Todo Task</h4>


            <div class="table-responsive m-t-40 ">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Todo List Name</th>
                        <th>Todo Task List</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp
                    @foreach($todos as $todo)
                        @if($todo->tasks->count()!=0)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$todo->name}}</td>
                                <td>
                                    @php $j=1; @endphp
                                    @foreach($todo->tasks as $key=>$task)
                                        <p class="">{{$j++}}.&nbsp;<span class="{{$task->status == 1?'text-success':''}}">{{$task->name}}</span> &nbsp; @if($task->status == 0) <a href="{{route('task.complete',['id'=>$task->id])}}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete"><i class="bi bi-check2-circle"></i></a> @else <i class="bi bi-check2-all text-success" style="font-size: 20px" data-bs-toggle="tooltip" data-bs-placement="top" title="Completed"></i> @endif </p>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('task.edit',['id'=>$todo->id])}}" class="btn btn-success btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        </svg>
                                    </a>

                                </td>
                                <td>
                                    <a href="{{route('task.delete',['id'=>$todo->id])}}" class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are You sure to delete this')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
