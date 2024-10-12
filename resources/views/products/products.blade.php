<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Control</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 p-6">
    <a href="{{ url('/') }}" class="bg-blue-600 text-white p-2 rounded">Go to Home</a>
    <h1 class="text-2xl mt-4">Products Control</h1>
    <div class="mt-8">
        <div class="bg-gray-800 p-6 rounded shadow-lg">
            <h2 class="text-xl font-bold mb-4">All Products</h2>
            <p class="text-gray-300">Total Products: <span class="font-semibold">{{ $totalProducts }}</span></p>
            <a href="{{ url('/products_dashboard') }}" class="mt-4 inline-block bg-green-600 text-white p-2 rounded">View Products</a>
        </div>
    </div>
</body>
</html>
