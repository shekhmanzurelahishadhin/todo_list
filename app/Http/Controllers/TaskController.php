<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Todo;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
{

    public function index()
    {
        return view('todos.todo-task.index',[
            'todos'=>Todo::where('user_id',Auth::user()->id)->get(),
        ]);
    }

    public function create(Request $request)
    {

        Task::saveTask($request);
        toastr()->success('Task Added Successfully');
        return back();
    }
    public function manage()
    {
        return view('todos.todo-task.manage',[
            'tasks'=>Task::where('user_id',Auth::user()->id)->get(),
            'todos'=>Todo::where('user_id',Auth::user()->id)->get(),
        ]);
    }
    public function edit($id)
    {
        return view('todos.todo-task.edit',[
            'todos'=>Todo::get(),
            'single_todo'=>Todo::find($id)
        ]);
    }
    public function update(Request $request, $id)
    {

        $tasks = Task::where('todo_id',$id)->get();
        foreach ($tasks as $task){
            $task->delete();
        }
        Task::updateTask($request,$id);
        toastr()->success('Task info updated Successfully');
        return redirect()->route('task.manage');
    }

    public function delete($id)
    {
        Task::deleteTask($id);
        toastr()->success('Task info Deleted Successfully');
        return redirect()->route('task.manage');
    }

    public function complete($id)
    {
        $task = Task::find($id);
        if ($task->status == 0){
            $task->status = 1;
            $task->save();
        }
        toastr()->success('Task Completed');
        return back();
    }
}
