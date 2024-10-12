<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Control</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <a href="{{ url('/dashboard') }}" class="bg-blue-500 text-white p-2 rounded">Go to Home</a>
    <a href="{{ url('/categories/add') }}" class="bg-blue-500 text-white p-2 rounded">Add Category</a>
    <h1 class="text-2xl mt-4">Category List</h1>
    <div class="mt-4">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">ID</th>
                    <th class="border border-gray-300 p-2">Name</th>
                    <th class="border border-gray-300 p-2">Description</th>
                    <th class="border border-gray-300 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $category->id }}</td>
                        <td class="border border-gray-300 p-2">{{ $category->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $category->description }}</td>
                        <td class="border border-gray-300 p-2">
                            <a href="{{ url('/categories/' . $category->id . '/edit') }}" class="bg-yellow-500 text-white p-2 rounded">Edit</a>
                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</body>
</html>
