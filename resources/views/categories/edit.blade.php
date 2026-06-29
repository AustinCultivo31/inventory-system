@extends('layouts.app')

@section('content')
<h2>Edit Category</h2>
<form action="/categories/{{ $category->id }}" method="POST" class="mt-3">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ $category->description }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="/categories" class="btn btn-secondary">Cancel</a>
</form>
@endsection