<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 p-6">
<a href="{{ url('/') }}" class="bg-blue-500 text-white p-2 rounded">Go to Home</a>
    <h1 class="text-2xl mb-4">Product Search</h1>

    <form action="{{ url('/products/search') }}" method="GET" class="mb-6">
        <div class="flex items-center space-x-4">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search Amigo..." 
                class="p-2 border border-gray-600 bg-gray-800 text-gray-100 rounded w-full"
            >
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
        </div>
    </form>

    @if ($products->isEmpty())
        <p class="text-gray-400">No products found.</p>
    @else
        <table class="min-w-full border border-gray-600">
            <thead>
                <tr class="bg-gray-800 text-gray-100">
                    <th class="border border-gray-600 p-2">ID</th>
                    <th class="border border-gray-600 p-2">Name</th>
                    <th class="border border-gray-600 p-2">Description</th>
                    <th class="border border-gray-600 p-2">Price</th>
                    <th class="border border-gray-600 p-2">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="bg-gray-800 text-gray-100">
                        <td class="border border-gray-600 p-2">{{ $product->id }}</td>
                        <td class="border border-gray-600 p-2">{{ $product->name }}</td>
                        <td class="border border-gray-600 p-2">{{ $product->description }}</td>
                        <td class="border border-gray-600 p-2">{{ $product->price }}</td>
                        <td class="border border-gray-600 p-2">{{ $product->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    @endif
</body>
</html>
