@extends('layouts.app')

@section('content')
<h2>Add Category</h2>
<form action="/categories" method="POST" class="mt-3">
  @csrf
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required>
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
  <a href="/categories" class="btn btn-secondary">Cancel</a>
</form>
@endsection