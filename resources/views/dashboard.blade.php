@extends('layouts.app')

@section('content')
<h2 class="mb-4">Dashboard</h2>

<div class="row mb-4">
  <div class="col-md-4">
    <div class="card text-white bg-primary">
      <div class="card-body">
        <h5 class="card-title">Total Products</h5>
        <h2>{{ $totalProducts }}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-white bg-success">
      <div class="card-body">
        <h5 class="card-title">Total Categories</h5>
        <h2>{{ $totalCategories }}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-white bg-danger">
      <div class="card-body">
        <h5 class="card-title">Low Stock Items</h5>
        <h2>{{ $lowStock }}</h2>
      </div>
    </div>
  </div>
</div>

<h4>Recent Products</h4>
<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>Name</th>
      <th>Category</th>
      <th>Price</th>
      <th>Stock</th>
    </tr>
  </thead>
  <tbody>
    @foreach($recentProducts as $product)
    <tr>
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
    </tr>
    @endforeach
  </tbody>
</table>
@endsection