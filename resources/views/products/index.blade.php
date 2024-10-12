<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 p-6">
<a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white p-2 rounded">Go to Home</a>
<a href="{{ url('/products/add') }}" class="bg-blue-600 text-white p-2 rounded">Add Product</a>
    <h1 class="text-2xl mb-4">Product List</h1>
    @if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded mt-4">
        {{ session('success') }}
    </div>
@endif

    <form method="GET" action="{{ route('products.index') }}" class="mb-4">
        <input type="text" name="search" placeholder="Search products" value="{{ request('search') }}" class="border border-gray-600 bg-gray-800 text-gray-100 p-2 rounded">
        <select name="category_id" class="border border-gray-600 bg-gray-800 text-gray-100 p-2 rounded">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Filter</button>
    </form>
    <table class="min-w-full bg-gray-800">
        <thead>
            <tr>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Description</th>
                <th class="py-2 px-4">Category</th>
                <th class="py-2 px-4">Price</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="border-t border-gray-700">
                    <td class="py-2 px-4">{{ $product->name }}</td>
                    <td class="py-2 px-4">{{ $product->description }}</td>
                    <td class="py-2 px-4">{{ $product->category->name ?? 'No Category' }}</td>
                    <td class="py-2 px-4">{{ $product->price }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-400">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $products->appends(request()->query())->links() }}
    </div>
</body>
</html>
