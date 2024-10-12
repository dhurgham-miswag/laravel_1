<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
<a href="{{ url('/dashboard') }}" class="bg-blue-500 text-white p-2 rounded">Go to Home</a><br>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Orders Dashboard</h1>
        @if(session('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">{{ session('error') }}</div>
    @endif

    <form method="GET" action="{{ route('orders.dashboard') }}" class="mb-6">
    <label for="date_filter" class="block text-sm font-medium text-gray-700">Filter by Date:</label>
    <input 
        type="date" 
        name="date_filter" 
        id="date_filter" 
        value="{{ old('date_filter', $dateFilter ?? '') }}" 
        class="border border-gray-300 p-2 rounded mt-1 w-full"
    />
    <button type="submit" class="mt-2 bg-blue-500 text-white p-2 rounded">Filter</button>
</form>


        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="border-b-2 border-gray-300 p-2">ID</th>
                    <th class="border-b-2 border-gray-300 p-2">Customer ID</th>
                    <th class="border-b-2 border-gray-300 p-2">Status</th>
                    <th class="border-b-2 border-gray-300 p-2">Total Amount</th>
                    <th class="border-b-2 border-gray-300 p-2">Created At</th>
                    <th class="border-b-2 border-gray-300 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($orders as $order)
        <tr class="hover:bg-gray-100">
            <td class="border-b border-gray-300 p-2">
                <a href="{{ route('orders.view', $order->id) }}" class="text-blue-500 hover:underline">
                    {{ $order->id }}
                </a>
            </td>
            <td class="border-b border-gray-300 p-2">{{ $order->customer_id }}</td>
            <td class="border-b border-gray-300 p-2">{{ $order->status }}</td>
            <td class="border-b border-gray-300 p-2">{{ $order->total_amount }}</td>
            <td class="border-b border-gray-300 p-2">{{ $order->created_at }}</td>
            <td class="border-b border-gray-300 p-2">
                <a href="{{ route('orders.edit', $order->id) }}" class="text-blue-500 hover:underline">Edit</a>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>


        <div class="mt-4">
            {{ $orders->links() }} 
        </div>
    </div>
    
</body> 
</html>
