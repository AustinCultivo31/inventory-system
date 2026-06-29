@extends('layouts.app')

@section('content')
<h2>Edit Product</h2>
<form action="/products/{{ $product->id }}" method="POST" class="mt-3">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-control" required>
      @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
          {{ $category->name }}
        </option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ $product->description }}</textarea>
  </div>
  <div class="mb-3">
    <label>Price</label>
    <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <div class="mb-3">
    <label>Stock</label>
    <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
    @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="/products" class="btn btn-secondary">Cancel</a>
</form>
@endsection