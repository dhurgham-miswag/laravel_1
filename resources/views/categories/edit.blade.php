<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <a href="{{ url('/categories_dashboard') }}" class="bg-blue-500 text-white p-2 rounded">Back to Categories</a>
    <h1 class="text-2xl mt-4">Edit Category</h1>

    <form method="POST" action="{{ route('categories.update', $category->id) }}" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Name:</label>
            <input type="text" name="name" value="{{ $category->name }}" class="border border-gray-300 p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Description:</label>
            <textarea name="description" class="border border-gray-300 p-2 w-full">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update Category</button>
    </form>
</body>
</html>
