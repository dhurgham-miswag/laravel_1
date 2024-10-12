<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 p-6">
    <a href="{{ url('/products_dashboard') }}" class="bg-blue-500 text-white p-2 rounded">Go to Product List</a>
    <h1 class="text-2xl mt-4">Add New Product</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 mt-4">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="bg-red-500 text-white p-2 mt-4">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="bg-red-500 text-white p-2 mt-4">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
    <form method="POST" action="{{ url('/products/add') }}" class="mt-4">
        @csrf
        <div class="mt-2">
            <input type="text" name="name" placeholder="Product Name" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 w-full rounded">
        </div>
        <div class="mt-2">
            <input type="text" name="description" placeholder="Description" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 w-full rounded">
        </div>
        <div class="mt-2">
            <input type="number" step="0.01" name="cost" placeholder="Cost" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 w-full rounded">
        </div>
        <div class="mt-2">
            <input type="number" step="0.01" name="price" placeholder="Price" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 w-full rounded">
        </div>
        <div class="mt-2">
            <select name="category_id" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 w-full rounded">
                <option value="" disabled selected>Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-2">
            <input type="number" name="stock" placeholder="Stock" required class="border border-gray-600 bg-gray-800 text-gray-100 p-2 w-full rounded">
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Add Product</button>
        </div>
    </form>
</body>
</html>
