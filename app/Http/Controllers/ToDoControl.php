<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ToDoControl extends Controller
{
    /**
     * Display a listing of the resource.
     */  public function index()
    {
        $todos = Todo::where("user_id", Auth::user()->id)->orderBy("created_at","desc")->paginate(10);

        return view('index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {    $user = Auth::user();
        $request->validate([
            'text' =>' required',
        ]);
        /** @var \App\Models\User $user **/
        $todo = $user->todos()->create($request->all());
        return redirect()->route('todos.index')->with('success' ,'Başarılı');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        sleep(1);
        return redirect()->route('todos.index')->with('success','');
    }
}
