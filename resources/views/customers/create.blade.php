<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <a href="{{ url('/customers_dashboard') }}" class="bg-blue-500 text-white p-2 rounded">Back to Customers</a>
    <h1 class="text-2xl mt-4">Add Customer</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/customers') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block mb-2">Name</label>
            <input type="text" name="name" id="name" class="border border-gray-300 p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block mb-2">Email</label>
            <input type="email" name="email" id="email" class="border border-gray-300 p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="phone" class="block mb-2">Phone</label>
            <input type="text" name="phone" id="phone" class="border border-gray-300 p-2 w-full">
        </div>
        <div class="mb-4">
            <label for="address" class="block mb-2">Address</label>
            <textarea name="address" id="address" class="border border-gray-300 p-2 w-full"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Add Customer</button>
    </form>
</body>
</html>
