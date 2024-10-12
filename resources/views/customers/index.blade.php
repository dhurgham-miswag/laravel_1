<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Control</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
<a href="{{ url('/dashboard') }}" class="bg-blue-500 text-white p-2 rounded">Back home</a>
    <a href="{{ url('/customers/create') }}" class="bg-blue-500 text-white p-2 rounded">Add Customer</a>
    <h1 class="text-2xl mt-4">Customer List</h1>

    <div class="mt-4">
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">ID</th>
                    <th class="border border-gray-300 p-2">Name</th>
                    <th class="border border-gray-300 p-2">Email</th>
                    <th class="border border-gray-300 p-2">Phone</th>
                    <th class="border border-gray-300 p-2">Address</th>
                    <th class="border border-gray-300 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $customer->id }}</td>
                        <td class="border border-gray-300 p-2">{{ $customer->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $customer->email }}</td>
                        <td class="border border-gray-300 p-2">{{ $customer->phone }}</td>
                        <td class="border border-gray-300 p-2">{{ $customer->address }}</td>
                        <td class="border border-gray-300 p-2">
                            <a href="{{ url('/customers/' . $customer->id . '/edit') }}" class="bg-yellow-500 text-white p-2 rounded">Edit</a>
                            <form method="POST" action="{{ url('/customers/' . $customer->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded" onclick="return confirm('Are you sure you want to delete this customer?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $customers->links() }}
    </div>
</body>
</html>
