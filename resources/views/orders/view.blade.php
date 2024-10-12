<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .order-icon {
            width: 20px; /* Size of the icons */
            height: 20px; /* Size of the icons */
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Order Details - Order #{{ $order->id }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Left Column: Order and Customer Info -->
            <div class="space-y-4">
                <!-- Customer Orders Icons -->
                <div>
                    <h2 class="block text-sm font-medium text-gray-700">Customer Orders:</h2>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @php
                            $orderCounts = $order->customer->orders->groupBy('status')->map(function($items) {
                                return count($items);
                            });
                        @endphp
                        @foreach($orderCounts as $status => $count)
                            <div class="flex items-center">
                                @if ($status === 'completed')
                                    <img src="{{ Vite::asset('resources/images/done.png') }}" class="order-icon" alt="Completed">
                                    <span class="ml-1">{{ $count }} Completed</span>
                                @elseif ($status === 'pending')
                                    <img src="{{ Vite::asset('resources/images/pending.png') }}" class="order-icon" alt="Pending">
                                    <span class="ml-1">{{ $count }} Pending</span>
                                @elseif ($status === 'cancelled')
                                    <img src="{{ Vite::asset('resources/images/cancel.png') }}" class="order-icon" alt="Cancelled">
                                    <span class="ml-1">{{ $count }} Cancelled</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Order Status -->
                <div>
                    <h2 class="text-lg font-semibold">Order Status:</h2>
                    <p class="text-xl font-bold {{ $order->status === 'cancelled' ? 'text-red-600' : 'text-green-600' }}">
                        {{ ucfirst($order->status) }}
                    </p>
                </div>
            </div>

            <!-- Right Column: Order Items -->
            <div>
                <h2 class="text-lg font-semibold mb-2">Order Items:</h2>
                @if($order->products && $order->products->count() > 0)
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border-b-2 border-gray-300 p-2">Product Name</th>
                                <th class="border-b-2 border-gray-300 p-2">Quantity</th>
                                <th class="border-b-2 border-gray-300 p-2">Stock Remaining</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $product)
                                <tr class="hover:bg-gray-100">
                                    <td class="border-b border-gray-300 p-2">{{ $product->name }}</td>
                                    <td class="border-b border-gray-300 p-2">{{ $product->pivot->quantity }}</td>
                                    <td class="border-b border-gray-300 p-2">{{ $product->stock - $product->pivot->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No items found for this order.</p>
                @endif
            </div>
        </div>

        <!-- Merged Customer and Order Information -->
        <div class="mt-6">
            <h2 class="text-lg font-semibold cursor-pointer" onclick="toggleVisibility('customerOrderInfo')">Customer and Order Information:</h2>
            <div id="customerOrderInfo" class="hidden mt-2">
                <h3 class="text-lg font-semibold">Customer Information:</h3>
                <p><strong>Name:</strong> {{ $order->customer->name }}</p>
                <p><strong>Email:</strong> {{ $order->customer->email }}</p>
                <p><strong>Phone:</strong> {{ $order->customer->phone }}</p>

                <h3 class="text-lg font-semibold mt-4">Order Information:</h3>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                <p><strong>Shipping Address:</strong> {{ $order->customer->address }}</p> <!-- Using customer's address as shipping address -->
            </div>
        </div>
    </div>

    <script>
        function toggleVisibility(id) {
            const element = document.getElementById(id);
            element.classList.toggle('hidden');
        }
    </script>
</body>
</html>
