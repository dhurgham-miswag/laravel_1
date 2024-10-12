<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <a href="{{ url('/dashboard') }}" class="bg-blue-500 text-white p-2 rounded">Back to Dashboard</a>
    
    <h1 class="text-2xl mt-4">Order Products</h1>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Order ID</th>
                <th class="py-2">Customer ID</th>
                <th class="py-2">Total Amount</th>
                <th class="py-2">Status</th>
                <th class="py-2">Products</th>
                <th class="py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="border py-2">{{ $order->id }}</td>
                    <td class="border py-2">{{ $order->customer_id }}</td>
                    <td class="border py-2">{{ $order->total_amount }}</td>
                    <td class="border py-2">{{ $order->status }}</td>
                    <td class="border py-2">
                        <ul>
                            @foreach ($order->products as $product)
                                <li>{{ $product->name }} (Quantity: {{ $product->pivot->quantity }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="border py-2">
                        <a href="{{ route('orders.edit', $order->id) }}" class="bg-yellow-500 text-white p-2 rounded">Edit</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $orders->links() }} 
    </div>
</body>
</html>
