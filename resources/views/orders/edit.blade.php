<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-800 p-6">
    <a href="{{ url('/orders_dashboard') }}" class="bg-blue-500 text-white p-2 rounded">Back to Orders</a>
    <h1 class="text-2xl mt-4 text-gray-800 dark:text-white">Edit Order</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/orders/' . $order->id) }}">
        @csrf
        @method('PUT')

        <!-- Customer ID -->
        <div class="mb-4">
            <label for="customer_id" class="block mb-2 text-gray-800 dark:text-gray-300">Customer ID</label>
            <input type="number" name="customer_id" id="customer_id" class="border border-gray-300 dark:border-gray-600 p-2 w-full" value="{{ $order->customer_id }}" required>
        </div>

        <!-- Current Order Items -->
        <h2 class="text-xl mt-4 text-gray-800 dark:text-white">Current Order Items</h2>
        <div id="order-items" class="grid grid-cols-1 gap-4 mb-4">
            @foreach ($order->products as $index => $product)
                <div class="flex items-center border p-4 rounded bg-white dark:bg-gray-700 shadow">
                    <select name="products[{{ $index }}][product_id]" class="border border-gray-300 dark:border-gray-600 p-2 w-1/2 mr-2" required>
                        <option value="">Select Product</option>
                        @foreach ($products as $p)
                            <option value="{{ $p->id }}" {{ $product->id == $p->id ? 'selected' : '' }}>
                                {{ $p->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="number" name="products[{{ $index }}][quantity]" class="border border-gray-300 dark:border-gray-600 p-2 w-1/4 mr-2" value="{{ $product->pivot->quantity }}" required>
                    <button type="button" class="bg-red-500 text-white p-2 rounded ml-2" onclick="removeItem(this)">Remove</button>
                </div>
            @endforeach
        </div>

        <!-- Add New Items -->
        <h2 class="text-xl mt-4 text-gray-800 dark:text-white">Add New Items</h2>
        <div class="flex items-center mb-4">
            <select name="new_product_id" id="new_product_id" class="border border-gray-300 dark:border-gray-600 p-2 w-1/2 mr-2" required>
                <option value="">Select Product</option>
                @foreach ($products as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
            <input type="number" name="new_quantity" id="new_quantity" class="border border-gray-300 dark:border-gray-600 p-2 w-1/4 mr-2" placeholder="Quantity" required>
            <button type="button" id="add-item" class="bg-green-500 text-white p-2 rounded">Add Item</button>
        </div>

        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update Order</button>
    </form>

    <script>
        document.getElementById('add-item').addEventListener('click', function() {
            const productId = document.getElementById('new_product_id').value;
            const quantity = document.getElementById('new_quantity').value;

            if (productId && quantity) {
                const itemDiv = document.createElement('div');
                itemDiv.className = 'flex items-center border p-4 rounded bg-white dark:bg-gray-700 shadow';
                itemDiv.innerHTML = `
                    <select name="products[new][product_id][]" class="border border-gray-300 dark:border-gray-600 p-2 w-1/2 mr-2" required>
                        <option value="${productId}">${productId}</option>
                    </select>
                    <input type="number" name="products[new][quantity][]" class="border border-gray-300 dark:border-gray-600 p-2 w-1/4 mr-2" value="${quantity}" required>
                    <button type="button" class="bg-red-500 text-white p-2 rounded ml-2" onclick="removeItem(this)">Remove</button>
                `;
                document.getElementById('order-items').appendChild(itemDiv);
                document.getElementById('new_product_id').value = '';
                document.getElementById('new_quantity').value = '';
            } else {
                alert('Please select a product and enter a quantity.');
            }
        });

        function removeItem(button) {
            button.parentElement.remove();
        }
    </script>
</body>
</html>
