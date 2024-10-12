<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Items</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 p-6">
    <a href="{{ route('orders.index') }}" class="bg-blue-500 text-white p-2 rounded">Back to Orders</a>
    
    @if (session('error'))
        <div class="bg-red-500 text-white p-2 mt-4">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="text-2xl mt-4">Order #{{ $order->id }} Items</h1>

    @if($order->products->isEmpty())
        <p class="mt-4">No items found for this order.</p>
    @else
        <table class="mt-4 w-full border border-gray-600">
            <thead>
                <tr>
                    <th class="p-2 border-b border-gray-600">Product Name</th>
                    <th class="p-2 border-b border-gray-600">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td class="p-2 border-b border-gray-600">{{ $product->name }}</td>
                        <td class="p-2 border-b border-gray-600">{{ $product->pivot->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
