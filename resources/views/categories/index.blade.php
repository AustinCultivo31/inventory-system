@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Categories</h2>
  <a href="/categories/create" class="btn btn-primary">Add Category</a>
</div>

<form method="GET" action="/categories" class="row g-2 mb-3">
  <div class="col-md-6">
    <input
      type="text"
      name="search"
      class="form-control"
      placeholder="Search categories..."
      value="{{ request('search') }}"
    >
  </div>
  <div class="col-md-3">
    <select name="sort" class="form-control">
      <option value="">-- Sort By --</option>
      <option value="name_az" {{ request('sort') == 'name_az' ? 'selected' : '' }}>Name A-Z</option>
      <option value="name_za" {{ request('sort') == 'name_za' ? 'selected' : '' }}>Name Z-A</option>
    </select>
  </div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-secondary w-100">Search</button>
  </div>
  <div class="col-md-1">
    <a href="/categories" class="btn btn-outline-secondary w-100">Clear</a>
  </div>
</form>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($categories as $category)
    <tr>
      <td>{{ $category->id }}</td>
      <td>{{ $category->name }}</td>
      <td>{{ $category->description }}</td>
      <td>
        <a href="/categories/{{ $category->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
        <form action="/categories/{{ $category->id }}" method="POST" style="display:inline">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
      </td>
    </tr>
    @empty
      <tr>
        <td colspan="4" class="text-center text-muted">No categories found.</td>
      </tr>
    @endforelse
  </tbody>
</table>
@endsection