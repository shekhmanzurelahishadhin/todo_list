<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Todo;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('todos.home.index',[
            'total_user'=>User::get()->count(),
            'todos'=>Todo::get()->count(),
            'tasks'=>Task::get()->count(),
            'task'=>Todo::where('user_id',Auth::user()->id)->get()->count(),
        ]);
    }
}
