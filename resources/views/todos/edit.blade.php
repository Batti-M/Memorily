@extends('layouts.app')

@section('content')

<form action="{{ route('todos.update', $todo->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class=".paper container-sm">
        <label for="text">My Todo:</label>
        <input class="paper-input" type="text" name="text" value="{{ $todo->text}}">
        <input type="hidden" name="is_done" value="{{$todo->is_done}}">
    </div>
    @error('text')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <button type="submit" class="btn-secondary"> Update Todo </button>
</form>

@endsection