<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Control</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 p-6">
    <a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white p-2 rounded">Go to Home</a>
    <a href="{{ url('/products/add') }}" class="bg-blue-600 text-white p-2 rounded">Add Product</a>
    <h1 class="text-2xl mt-4">Product List</h1>
    
    <form method="GET" action="{{ route('products.dashboard') }}" class="mb-4">
    <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}" class="border border-gray-600 bg-gray-800 text-gray-100 p-2 mb-2">
    
    <select name="category_id" onchange="this.form.submit()" class="border border-gray-600 bg-gray-800 text-gray-100 p-2">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    
    <button type="submit" class="bg-blue-600 text-white p-2 rounded ml-2">Search</button>
</form>


    <div class="mt-4">
        <table class="min-w-full border border-gray-700">
            <thead>
                <tr class="bg-gray-800 text-gray-100">
                    <th class="border border-gray-700 p-2">ID</th>
                    <th class="border border-gray-700 p-2">Name</th>
                    <th class="border border-gray-700 p-2">Description</th>
                    <th class="border border-gray-700 p-2">Cost</th>
                    <th class="border border-gray-700 p-2">Price</th>
                    <th class="border border-gray-700 p-2">Category</th>
                    <th class="border border-gray-700 p-2">Stock</th>
                    <th class="border border-gray-700 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="bg-gray-900 hover:bg-gray-800">
                        <td class="border border-gray-700 p-2">{{ $product->id }}</td>
                        <td class="border border-gray-700 p-2">{{ $product->name }}</td>
                        <td class="border border-gray-700 p-2">{{ $product->description }}</td>
                        <td class="border border-gray-700 p-2">{{ $product->cost }}</td>
                        <td class="border border-gray-700 p-2">{{ $product->price }}</td>
                        <td class="border border-gray-700 p-2">{{ $product->category->name ?? 'No Category' }}</td>
                        <td class="border border-gray-700 p-2">{{ $product->stock }}</td>
                        <td class="border border-gray-700 p-2">
                            <a href="{{ url('/products/' . $product->id . '/edit') }}" class="bg-yellow-500 text-white p-2 rounded">Edit</a>
                            <form method="POST" action="{{ url('/api/products/' . $product->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</body>
</html>