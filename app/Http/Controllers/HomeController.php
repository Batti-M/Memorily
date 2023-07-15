<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memory;
use App\Models\Todo;
class HomeController extends Controller
{
    
    public function index()
    {
        $memories = Memory::all();
        $todos = Todo::all();
        
        return view('home', compact('memories', 'todos'));
    }
}
