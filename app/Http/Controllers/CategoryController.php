<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
{
    $query = Category::query();

    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->sort == 'name_az') {
        $query->orderBy('name', 'asc');
    } elseif ($request->sort == 'name_za') {
        $query->orderBy('name', 'desc');
    } else {
        $query->latest();
    }

    $categories = $query->get();
    return view('categories.index', compact('categories'));
}

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create($request->all());
        return redirect('/categories')->with('success', 'Category added!');
    }

    public function show(Category $category)
    {
        return redirect('/categories');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update($request->all());
        return redirect('/categories')->with('success', 'Category updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/categories')->with('success', 'Category deleted!');
    }
}