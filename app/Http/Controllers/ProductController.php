<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::with('category');

    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->sort == 'price_high') {
        $query->orderBy('price', 'desc');
    } elseif ($request->sort == 'price_low') {
        $query->orderBy('price', 'asc');
    } elseif ($request->sort == 'stock_high') {
        $query->orderBy('stock', 'desc');
    } elseif ($request->sort == 'stock_low') {
        $query->orderBy('stock', 'asc');
    } elseif ($request->sort == 'name_az') {
        $query->orderBy('name', 'asc');
    } elseif ($request->sort == 'name_za') {
        $query->orderBy('name', 'desc');
    } else {
        $query->latest();
    }

    $products = $query->get();
    return view('products.index', compact('products'));
}

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);
        Product::create($request->all());
        return redirect('/products')->with('success', 'Product added!');
    }

    public function show(Product $product)
    {
        return redirect('/products');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);
        $product->update($request->all());
        return redirect('/products')->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products')->with('success', 'Product deleted!');
    }
}