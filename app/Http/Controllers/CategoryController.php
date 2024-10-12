<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json(Category::all());
        }
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'The category name is required.',
            'name.string' => 'The category name must be a string.',
            'name.max' => 'The category name may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $category = Category::create($validator->validated());
        
        if ($request->expectsJson()) {
            return response()->json($category, 201); 
        }

        return redirect()->route('categories.dashboard')->with('success', 'Category created successfully.'); 
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category')); 
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'The category name is required.',
            'name.string' => 'The category name must be a string.',
            'name.max' => 'The category name may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $category = Category::findOrFail($id);
        $category->update($validator->validated());

        if ($request->expectsJson()) {
            return response()->json($category); 
        }

        return redirect()->route('categories.dashboard')->with('success', 'Category updated successfully.'); 
    }

    public function destroy(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Category deleted successfully!'], 200);
        }

        return redirect()->route('categories.dashboard')->with('success', 'Category deleted successfully.');
    }
}
