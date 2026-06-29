@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Products</h2>
  <a href="/products/create" class="btn btn-primary">Add Product</a>
</div>

<form method="GET" action="/products" class="row g-2 mb-3">
  <div class="col-md-5">
    <input
      type="text"
      name="search"
      class="form-control"
      placeholder="Search products..."
      value="{{ request('search') }}"
    >
  </div>
  <div class="col-md-4">
    <select name="sort" class="form-control">
      <option value="">-- Sort By --</option>
      <option value="name_az"    {{ request('sort') == 'name_az'    ? 'selected' : '' }}>Name A-Z</option>
      <option value="name_za"    {{ request('sort') == 'name_za'    ? 'selected' : '' }}>Name Z-A</option>
      <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price High to Low</option>
      <option value="price_low"  {{ request('sort') == 'price_low'  ? 'selected' : '' }}>Price Low to High</option>
      <option value="stock_high" {{ request('sort') == 'stock_high' ? 'selected' : '' }}>Stock High to Low</option>
      <option value="stock_low"  {{ request('sort') == 'stock_low'  ? 'selected' : '' }}>Stock Low to High</option>
    </select>
  </div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-secondary w-100">Search</button>
  </div>
  <div class="col-md-1">
    <a href="/products" class="btn btn-outline-secondary w-100">Clear</a>
  </div>
</form>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Category</th>
      <th>Price</th>
      <th>Stock</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($products as $product)
    <tr>
      <td>{{ $product->id }}</td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->category->name }}</td>
      <td>₱{{ number_format($product->price, 2) }}</td>
      <td>
        @if($product->stock < 5)
          <span class="badge bg-danger">{{ $product->stock }}</span>
        @else
          <span class="badge bg-success">{{ $product->stock }}</span>
        @endif
      </td>
      <td>
        <a href="/products/{{ $product->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
        <form action="/products/{{ $product->id }}" method="POST" style="display:inline">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
      </td>
    </tr>
    @empty
      <tr>
        <td colspan="6" class="text-center text-muted">No products found.</td>
      </tr>
    @endforelse
  </tbody>
</table>
@endsection