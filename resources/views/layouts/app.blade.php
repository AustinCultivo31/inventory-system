<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-4">
  <a class="navbar-brand" href="/">Inventory</a>
  <div>
    <a class="text-white me-3" href="/categories">Categories</a>
    <a class="text-white" href="/products">Products</a>
  </div>
</nav>
<div class="container mt-4">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @yield('content')
</div>
</body>
</html>