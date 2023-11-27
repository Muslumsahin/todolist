<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ToDoControl;


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

Route::get("/", function () {
    return view("auth.login");
});
Route::get('/todo-list', [ToDoControl::class, 'index'])->name('todos.index')->middleware('auth');
Route::get('/todos/create', [ToDoControl::class, 'create'])->name('todos.create');
Route::post('/todos', [ToDoControl::class, 'store'])->name('todos.store');
Route::delete('/todos/{todo}', [ToDoControl::class, 'destroy'])->name('todos.destroy');

// Route::resource("todos", ToDoControl::class);
Auth::routes();


