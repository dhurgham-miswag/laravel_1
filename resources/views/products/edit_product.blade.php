<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 p-6">
    <a href="{{ url('/products') }}" class="bg-blue-500 text-white p-2 rounded">Back to Product List</a>
    <h1 class="text-2xl mt-4">Edit Product</h1>
    <form method="POST" action="{{ url('/api/products/' . $product->id) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="Product Name" value="{{ $product->name }}" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 mt-2 rounded">
        <input type="text" name="description" placeholder="Description" value="{{ $product->description }}" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 mt-2 rounded">
        <input type="number" step="0.01" name="cost" placeholder="Cost" value="{{ $product->cost }}" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 mt-2 rounded">
        <input type="number" step="0.01" name="price" placeholder="Price" value="{{ $product->price }}" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 mt-2 rounded">
        <input type="number" name="category_id" placeholder="Category ID" value="{{ $product->category_id }}" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 mt-2 rounded">
        <input type="number" name="stock" placeholder="Stock" value="{{ $product->stock }}" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 mt-2 rounded">
        <button type="submit" class="bg-yellow-500 text-white p-2 mt-2 rounded">Update Product</button>
    </form>
</body>
</html>
