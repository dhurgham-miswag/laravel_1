<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search2(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('name', 'LIKE', "%{$query}%")->get();

    $output = '';
    foreach ($products as $product) {
        $output .= '<div class="border border-gray-300 p-2 mt-1">
            <strong>' . $product->name . '</strong>
            <input type="number" class="quantity" min="1" value="1" placeholder="Quantity" style="width: 70px; margin-left: 10px;" />
            <button class="add-product bg-green-500 text-white p-1 rounded ml-2" data-id="' . $product->id . '" data-name="' . $product->name . '">Add</button>
        </div>';
    }

    return response()->json(['output' => $output]);
}

    public function search(Request $request)
    {
        $query = Product::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        $products = $query->paginate(10);
        if ($request->expectsJson()) {
            return response()->json($products);
        }
        return view('products.search', compact('products'));
    }

    public function index(Request $request)
{
    $query = Product::query();
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }
    if ($request->filled('search')) {
        $query->where(function($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
        });
    }

    $products = $query->paginate(10); 
    if ($request->expectsJson()) {
        return response()->json($products);
    }
    $categories = \App\Models\Category::all();
    return view('products.index', compact('products', 'categories'));
}



public function store(Request $request)
{
    $validated = $request->validate([
        'name'        => 'required|string|max:255|unique:products,name',
        'description' => 'required|string',
        'cost'        => 'required|numeric|min:0',
        'price'       => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'stock'       => 'required|integer|min:0',
    ]);
    if ($validated['price'] <= $validated['cost']) {
        return back()->withErrors(['price' => 'Price must be greater than cost'])->withInput();
    }
    $product = Product::create($validated);
    if ($request->expectsJson()) {
        return response()->json([
            'message' => 'Product added successfully!',
            'product' => $product
        ], 201);
    }

    return redirect()->route('products.index')->with('success', 'Product added successfully!');
}


  
    public function edit($id)
    {
        $product = Product::findOrFail($id); 
        return view('products.edit_product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'cost' => 'numeric',
            'price' => 'numeric',
            'category_id' => 'exists:categories,id',
            'stock' => 'integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Product updated successfully!', 'product' => $product]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

 
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Product deleted successfully!'], 200);
        }

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
