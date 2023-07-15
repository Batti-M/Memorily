
@extends('layouts.app')

@section('content')

<div class="flex row flex-spaces">
    <div class="col-8 row">
        <div class="w-full px-4">
            <div class="paper">
                <a href="{{ route('memories.create') }}" class="">Create a new Memory</a>
            </div>
            <div class="flex-start paper">
                <a href="{{ route('memories.index') }}" class="">Only show your Memories</a>
            </div>
            <div class=" row">
                @foreach ($memories as $memory)
                    <div class="card col-4 flex-top" style="width: 15rem; color:whitesmoke">
                        @if ($memory->image_url)
                        <img src=" {{ $memory->image_url }}" alt="{{ $memory->title }}" class="card-img-top"
                        >
                        @endif
                        
                        <div class="card-body flex flex-col space-between" style="background-color: {{ $memory->color}}">
                            <h2 class="card-title underline">{{ $memory->title }}</h2>
                            <p class="card-text">{{ $memory->text }}</p>
                            <small>Created {{ $memory->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="row flex-spaces">
                            <div class="col">
                                <button class="btn-secondary-outline px-2"><a href="{{ route('memories.edit', $memory->id) }}"
                                >Edit</a>
                                </button>
                            </div>
                            <div class="col">
                                <form action="{{ route('memories.destroy', $memory->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger-outline px-2">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-3 row">
        <div>
            <div class=" uppercase paper flex-top">
                <a href="{{ route('todos.create') }}" class="">Create a new Todo</a>
            </div>
                
            @foreach ($todos as $todo)
            <div class="paper p-0 m-1">
                <div class="flex row">
                    <a href="{{ route('todos.edit', $todo->id) }}" class="mx-2">Edit Todo</a>
                    <form action={{ route('todos.destroy', $todo->id) }} method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger-outline px-2">Delete</button>
                    </form>
                </div>
                <form action="{{ route('todos.update', $todo->id) }}" method="POST" class=" p-0">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="is_done" value="{{ !$todo->is_done ? '1' : '0' }}">
                    <input type="hidden" name="text" value="{{ $todo->text}}">
                    
                    <div class="row">
                        <p type="submit" class="uppercase {{ !$todo->is_done ? 'text-danger' : 'text-success ' }} m-2"> {{  !$todo->is_done ? 'still to do' : 'done' }} </p>
                        <button type="submit" class="{{  !$todo->is_done ? "" : 'line-through' }} m-2"> {{  $todo->text }} </button>
                    </div>
                </form>
            </div>
            
            @endforeach
        </div>
    </div>
</div>
@endsection