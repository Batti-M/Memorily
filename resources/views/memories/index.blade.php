
@extends('layouts.app')

@section('content')


<h1 class="underline" style="font-size: 36px"> All my memories</h1>
    <div class="grid grid-cols-4 gap-6">
        @foreach ($memories as $memory)
            <div class="memory-card ">
                @if ($memory->image_url)
                <img src=" {{ $memory->image_url }}" alt="{{ $memory->title }}" class="card-img-top"
                >
                @endif
                <h2>{{ $memory->title }}</h2>
                <div class="border p-2">
                    <p>{{ $memory->text }}</p>
                    <small>Created {{ $memory->created_at->diffForHumans() }}</small>
                </div>
                    
                <button class="btn-secondary-outline"><a href="{{ route('memories.edit', $memory) }}">Edit</a> </button>
                <form action="{{ route('memories.destroy', $memory->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger-outline px-2">Delete</button>
                </form>
            </div>
        @endforeach
    </div>

@endsection