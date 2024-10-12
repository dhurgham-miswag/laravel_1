<script src="https://cdn.tailwindcss.com"></script>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Create Order</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="bg-red-200 text-red-700 border border-red-500 rounded p-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="orderForm" action="{{ route('orders.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="customer_id" class="block text-gray-700 text-sm font-bold mb-2">Customer</label>
            <select name="customer_id" class="form-select block w-full p-2 border border-gray-300 rounded" required>
                <option value="">Select Customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="productSelect" class="block text-gray-700 text-sm font-bold mb-2">Product</label>
            <select id="productSelect" class="form-select block w-full p-2 border border-gray-300 rounded">
                <option value="">Select Product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }} - Stock: {{ $product->stock }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="quantityInput" class="block text-gray-700 text-sm font-bold mb-2">Quantity</label>
            <input type="number" id="quantityInput" class="form-control block w-full p-2 border border-gray-300 rounded" placeholder="Quantity" min="1">
        </div>

        <button type="button" id="addProductButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Item</button>

        <h3 class="text-lg font-semibold mt-6">Selected Products</h3>
        <ul id="productList" class="border border-gray-300 rounded p-2 mb-4"></ul>

        <input type="hidden" name="products" id="productsInput" required>
        
        <div class="mb-4">
            <label for="total_amount" class="block text-gray-700 text-sm font-bold mb-2">Total Amount</label>
            <input type="text" id="total_amount" name="total_amount" class="form-control block w-full p-2 border border-gray-300 rounded" value="0.00" readonly>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Order Status</label>
            <input type="text" id="status" name="status" class="form-control block w-full p-2 border border-gray-300 rounded" value="pending">
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Place Order</button>
    </form>
</div>

<script>
    let products = []; // Array to hold selected products

    document.getElementById('addProductButton').addEventListener('click', function() {
        const productSelect = document.getElementById('productSelect');
        const productId = productSelect.value;
        const quantity = document.getElementById('quantityInput').value;

        // Check for valid quantity
        if (!productId || !quantity || quantity <= 0) {
            alert('Please select a product and enter a valid quantity.');
            return;
        }

        const productOption = productSelect.options[productSelect.selectedIndex];
        const productPrice = parseFloat(productOption.getAttribute('data-price'));
        const totalPrice = productPrice * quantity;

        // Add to products array
        products.push({
            product_id: productId,
            quantity: quantity,
            price: totalPrice
        });

        // Update the UI to show the added products
        updateProductList();
        clearInputs();
        calculateTotalAmount(); // Update the total amount
    });

    function updateProductList() {
        const productList = document.getElementById('productList');
        productList.innerHTML = ''; // Clear current list

        products.forEach((product, index) => {
            productList.innerHTML += `<li class="flex justify-between items-center py-1 border-b">
                <span>Product ID: ${product.product_id}, Quantity: ${product.quantity}, Price: $${product.price.toFixed(2)}</span>
                <button onclick="removeProduct(${index})" class="text-red-500 hover:text-red-700">Remove</button>
            </li>`;
        });
    }

    function clearInputs() {
        document.getElementById('productSelect').value = '';
        document.getElementById('quantityInput').value = '';
    }

    function removeProduct(index) {
        products.splice(index, 1);
        updateProductList();
        calculateTotalAmount(); // Recalculate total amount
    }

    function calculateTotalAmount() {
        const totalAmount = products.reduce((sum, product) => sum + product.price, 0);
        document.getElementById('total_amount').value = totalAmount.toFixed(2); // Update total amount input
    }

    document.getElementById('orderForm').addEventListener('submit', function(event) {
        // Set the hidden input with the products array
        document.getElementById('productsInput').value = JSON.stringify(products);

        // Validate if products input is an array
        if (products.length === 0) {
            alert('You must add at least one product.');
            event.preventDefault(); // Prevent submission if no products
            return;
        }

        // Now submit the form
        this.submit();
    });
</script>
