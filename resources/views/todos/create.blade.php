@extends('layouts.app')

@section('content')

<form action="{{ route('todos.store') }}" method="POST">
    @csrf
    <div class=".paper container-sm">
        <label for="text">My Todo:</label>
        <input class="paper-input" type="text" name="text">
    </div>
    
    @error('text')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <button type="submit" class="btn-secondary px-4"> Create Todo </button>
</form>

@endsection