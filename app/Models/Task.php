<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Task extends Model
{
    use HasFactory;
    public static $data;

    public static function saveTask($request)
    {
        foreach ($request->tasks as $task) {
            if($task != null){
                self::$data = new Task();
                self::$data->user_id = Auth::user()->id;
                self::$data->todo_id = $request->todo_id;
                self::$data->name = $task;
                self::$data->save();
            }
        }

    }

    public static function updateTask($request, $id)
    {

//      update previous task with status
        foreach ($request->ids as $id) {
            if($id != null){
                self::$data = new Task();
                self::$data->user_id = Auth::user()->id;
                self::$data->todo_id = $request->todo_id;
                self::$data->name = $id['tasks'];
                self::$data->status = $id['status'];
                self::$data->save();
            }
        }

//      update new added task
        foreach ($request->tasks as $task) {
            if($task != null){
                self::$data = new Task();
                self::$data->user_id = Auth::user()->id;
                self::$data->todo_id = $request->todo_id;
                self::$data->name = $task;
                self::$data->save();
            }
        }
    }

    public static function deleteTask($id)
    {
        $tasks = Task::where('todo_id',$id)->get();
        foreach ($tasks as $task){
            $task->delete();
        }

    }
    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
}
