<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Todo extends Model
{
    use HasFactory;
    public static $data;

    public static function saveTodo($request)
    {
        self::$data = new Todo();
        self::$data->user_id = Auth::user()->id;
        self::$data->name = $request->name;
        self::$data->save();
    }

    public static function updateTodo($request, $id)
    {
        self::$data = Todo::find($id);
        self::$data->user_id = Auth::user()->id;
        self::$data->name = $request->name;
        self::$data->save();
    }

    public static function deleteTodo($id)
    {
        self::$data = Todo::find($id);
        self::$data->delete();

    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
