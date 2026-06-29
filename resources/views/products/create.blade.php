@extends('layouts.app')

@section('content')
<h2>Add Product</h2>
<form action="/products" method="POST" class="mt-3">
  @csrf
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required>
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-control" required>
      <option value="">-- Select Category --</option>
      @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label>Price</label>
    <input type="number" name="price" class="form-control" step="0.01" required>
    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <div class="mb-3">
    <label>Stock</label>
    <input type="number" name="stock" class="form-control" required>
    @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
  <a href="/products" class="btn btn-secondary">Cancel</a>
</form>
@endsection