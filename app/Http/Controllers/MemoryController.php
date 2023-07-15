<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    //
    public function index()
    {
        return view('memories.index', [
            'memories' => Memory::all()
        ]);
    }

    public function create()
    {
        return view('memories.create');
    }

    public function store(Request $request)
    {

        $validatedData = $this->validateMemory($request);

        $memory = new Memory();
        $memory->title = $validatedData['title'];
        $memory->text = $validatedData['text'];
        $memory->color = $validatedData['color'];
        $memory->image_url = $validatedData['image_url'];
        $memory->save();

        return redirect("/");
    }
    // show function nicht mit eingebaut, da ich sie für diese Anwendung nicht für nötig halte
    // public function show(Memory $memory)
    // {
    //     return view('memories.show', compact('memory'));
    // }

    public function edit(Memory $memory)
    {
        return view('memories.edit', compact('memory'));
    }

    public function update(Request $request, Memory $memory)
    {
        $validatedData = $this->validateMemory($request);

        //$memory->fill($validatedData); andere Lösung
        $memory->title = $validatedData['title'];
        $memory->text = $validatedData['text'];
        $memory->color = $validatedData['color'];
        $memory->image_url = $validatedData['image_url'];
        $memory->save();

        return redirect()->route('memories.index');
    }

    public function destroy(Memory $memory)
    {
        $memory->delete();

        return redirect("/");
    }

    protected function validateMemory(Request $request)
    {

        return $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'color' => 'nullable|string|max:10',
            'image_url' => 'nullable|url',
        ]);
    }
}
