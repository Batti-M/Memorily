@extends('layouts.app')

@section('content')
<form action="{{ route('memories.update', $memory->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class=".paper container-sm">
    <label for="title">Title</label>
    <input class="paper-input" type="text" id="title" name="title" value="{{ $memory->title }}">
  </div>
  @error('title')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="form-group">
    <label for="text">Text</label>
    <textarea class="large-input" id="text" name="text" style="width: 20rem;">{{ $memory->text }}</textarea>
  </div>
  @error('text')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="form-group">
    <label for="color">Choose a color for your background:</label>
    <input class="paper-input" type="color" id="color" name="color" value="{{ $memory->color }}">

    <select class="paper-input" id="colorFallback" name="colorFallback" style="display: none;">
      <option value="red">Rot</option>
      <option value="green">Grün</option>
      <option value="blue">Blau</option>
      <option value="yellow">Gelb</option>
      <option value="orange">Orange</option>
    </select>
  </div>

  <div class="form-group">
    <label for="image_url">Image URL:</label>
    <input class="paper-input" type="text" id="image_url" name="image_url" value="{{ $memory->image_url }}">
  </div>

  <button class="paper-btn paper-btn-primary" type="submit">Update Memory</button>

</form>

<script>
  // Check if the color input type is supported
  if (typeof document.createElement("input").type === "color") {
    // If not supported, hide the color input and show the fallback select field
    document.getElementById("color").style.display = "block";
    document.getElementById("colorFallback").style.display = "none";
  }
</script>

@endsection