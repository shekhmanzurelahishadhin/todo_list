<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

//    add todo list start
    Route::get('/todo-add', [TodoController::class, 'index'])->name('todo.add');
    Route::get('/todo-manage', [TodoController::class, 'manage'])->name('todo.manage');
    Route::post('/todo-new', [TodoController::class, 'create'])->name('todo.new');
    Route::get('/todo-edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
    Route::post('/todo-update/{id}', [TodoController::class, 'update'])->name('todo.update');
    Route::get('/todo-delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
//    add todo list end

//    add todo task start
    Route::get('/task-add', [TaskController::class, 'index'])->name('task.add');
    Route::get('/task-manage', [TaskController::class, 'manage'])->name('task.manage');
    Route::post('/task-new', [TaskController::class, 'create'])->name('task.new');
    Route::get('/task-edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/task-update/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::get('/task-delete/{id}', [TaskController::class, 'delete'])->name('task.delete');
//    add todo task end

//    mark task as complete start
    Route::get('/task-complete/{id}', [TaskController::class, 'complete'])->name('task.complete');
//    mark task as complete end

//    profile settings start
    Route::get('/profile-settings', [ProfileController::class, 'index'])->name('profile.settings');
    Route::post('/profile-update', [ProfileController::class, 'profile_update'])->name('profile.update');
    Route::post('/password-update', [ProfileController::class, 'update_password'])->name('password.update');


//    profile settings end

});
