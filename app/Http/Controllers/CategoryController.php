<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:4|max:25|unique:categories'
        ];

        $this->validate($request, $rules);

        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->with('success','Category added successfully.');
    }

    public function show($category)
    {
        
    }

    public function edit($category)
    {
        $cate = Category::findOrFail($category);
        return view('admin.category.show', compact('cate'));
    }

    public function update(Request $request, $category)
    {
        $rules = [
            'name' => 'required|min:4|max:25|unique:categories'
        ];

        $this->validate($request, $rules);

        $cate = Category::findOrFail($category);
        $cate->name = $request->name;
        $cate->update();
        return redirect()->route('category.index')->with('success','Category updated successfully.');
    }

    public function destroy($category)
    {
        Category::where('id', $category)->delete();
        return redirect()->route('category.index')->with('success','Category deleted successfully.');
    }
}
