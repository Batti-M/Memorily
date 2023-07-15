<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Kommentar für Niclas :D habe die index und show function nicht mit eingebaut, da ich sie für diese anwendung nicht für nötig halte
    // hab sie aber mal drin gelassen, um zu zeigen wie ich sie eingebaut hätte
    
    // public function index()
    // {
    //     return view('todos.index', [
    //         'todos' => Todo::all()
    //     ]);
    // }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $todo = new Todo();
        $todo->text = $validatedData['text'];
        $todo->save();

        return redirect("/");
    }
   
    // public function show(Todo $todo)
    // {
    //     return view('todos.show', compact('todo'));
    // }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $validatedData = $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $todo->text = $validatedData['text'];
        $todo->is_done = $request->is_done;
        $todo->save();

        return redirect("/");
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        
        return redirect("/");
    }
}
