<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use App\step;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $get_todo = auth()->user()->todos->sortBy('completed');
        return view('todos.index', compact('get_todo'));
    }

    public function create()
    {
        return view('todos.create');
    }
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }
    public function store(TodoCreateRequest $request)
    {
        // dd($request->all());
        $todo =  auth()->user()->todos()->create($request->all());
        if ($request->step) {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        return redirect(route('todo.index'))->with('message', 'Todo created successfully!');
    }

    public function edit(Todo $todo)
    {
        // dd($todo->title);
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title]);
        if ($request->stepName) {
            foreach ($request->stepName as $key => $val) {
                $id = $request->stepId[$key];
                if (!$id) {
                    $todo->steps()->create(['name' => $val]);
                } else {
                    $step = step::find($id);
                    $step->update(['name' => $val]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message', 'Updated');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Marked as completed');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Marked as Incompleted');
    }

    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', 'Task deleted!');
    }
}
