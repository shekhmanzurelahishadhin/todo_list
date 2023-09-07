<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Todo;
use Illuminate\Http\Request;
use Auth;


class TodoController extends Controller
{
    public function index()
    {
        return view('todos.todo-list.index');
    }

    public function create(Request $request)
    {
        Todo::saveTodo($request);
        toastr()->success('Todo List Added Successfully');
        return back();
    }
    public function manage()
    {
        return view('todos.todo-list.manage',[
            'todos'=>Todo::where('user_id',Auth::user()->id)->get(),
        ]);
    }
    public function edit($id)
    {
        return view('todos.todo-list.edit',[
            'todo'=>Todo::find($id),
        ]);
    }
    public function update(Request $request, $id)
    {
        Todo::updateTodo($request,$id);
        toastr()->success('Todo info updated Successfully');
        return redirect()->route('todo.manage');
    }

    public function delete($id)
    {
        Todo::deleteTodo($id);
        $tasks = Task::where('todo_id',$id)->get();
        foreach ($tasks as $task){
            $task->delete();
        }
        toastr()->success('Todo info Deleted Successfully');
        return redirect()->route('todo.manage');
    }
}
