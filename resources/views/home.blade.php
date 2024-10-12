<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-300">
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Task 1 </h1>
        <div class="navbar">
    <ul class="flex space-x-4 bg-gray-200 text-black p-4 font-bold">
        <li><a href="#customers" class="hover:underline">Customers</a></li>
        <li><a href="#products" class="hover:underline">Products</a></li>
        <li><a href="#orders" class="hover:underline">Orders</a></li>
        <li><a href="#categories" class="hover:underline">Categories</a></li>
        <li><a href="#o_products" class="hover:underline">Order Products</a></li>
    </ul>
    
</div>
<hr><hr>
        <h2 id="products" class="text-2xl font-semibold mb-2">1. Products</h2>
        <p class="mb-2">Endpoint: <code class="bg-gray-200 dark:bg-gray-700">/products</code></p>
        
        <h3 class="text-xl font-semibold mb-2">Retrieve All Products</h3>
        <p>Method: <code>GET</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>GET /api/products</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>[
    {
        "id": 1,
        "name": "Product 1",
        "description": "Description for Product 1",
        "cost": 50.00,
        "price": 75.00,
        "category_id": 2,
        "stock": 100,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    },
    {
        "id": 2,
        "name": "Product 2",
        "description": "Description for Product 2",
        "cost": 40.00,
        "price": 60.00,
        "category_id": 1,
        "stock": 50,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    }
]</code></pre>

        <h3 class="text-xl font-semibold mb-2">Create a New Product</h3>
        <p>Method: <code>POST</code></p>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "name": "Product 3",
    "description": "Description for Product 3",
    "cost": 30.00,
    "price": 45.00,
    "category_id": 1,
    "stock": 200
}</code></pre>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>POST /api/products</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "id": 3,
    "name": "Product 3",
    "description": "Description for Product 3",
    "cost": 30.00,
    "price": 45.00,
    "category_id": 1,
    "stock": 200,
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:00:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Update an Existing Product</h3>
        <p>Method: <code>PUT</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>PUT /api/products/3</code></pre>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "stock": 180
}</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "id": 3,
    "name": "Product 3",
    "description": "Description for Product 3",
    "cost": 30.00,
    "price": 45.00,
    "category_id": 1,
    "stock": 180,
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:05:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Delete a Product</h3>
        <p>Method: <code>DELETE</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>DELETE /api/products/3</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "message": "Product deleted successfully."
}</code></pre>

        <h2 id="categories" class="text-2xl font-semibold mb-2">2. Categories</h2>
        <p class="mb-2">Endpoint: <code class="bg-gray-200 dark:bg-gray-700">/categories</code></p>
        
        <h3 class="text-xl font-semibold mb-2">Retrieve All Categories</h3>
        <p>Method: <code>GET</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>GET /api/categories</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>[
    {
        "id": 1,
        "name": "Category 1",
        "description": "Description for Category 1",
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    },
    {
        "id": 2,
        "name": "Category 2",
        "description": "Description for Category 2",
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    }
]</code></pre>

        <h3 class="text-xl font-semibold mb-2">Create a New Category</h3>
        <p>Method: <code>POST</code></p>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "name": "Category 3",
    "description": "Description for Category 3"
}</code></pre>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>POST /api/categories</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "id": 3,
    "name": "Category 3",
    "description": "Description for Category 3",
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:00:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Update an Existing Category</h3>
        <p>Method: <code>PUT</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>PUT /api/categories/3</code></pre>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "description": "Updated description for Category 3"
}</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "id": 3,
    "name": "Category 3",
    "description": "Updated description for Category 3",
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:05:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Delete a Category</h3>
        <p>Method: <code>DELETE</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>DELETE /api/categories/3</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "message": "Category deleted successfully."
}</code></pre>

        <h2 id="orders" class="text-2xl font-semibold mb-2">3. Orders</h2>
        <p class="mb-2">Endpoint: <code class="bg-gray-200 dark:bg-gray-700">/orders</code></p>
        
        <h3 class="text-xl font-semibold mb-2">Retrieve All Orders</h3>
        <p>Method: <code>GET</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>GET /api/orders</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>[
    {
        "id": 1,
        "customer_id": 1,
        "status": "completed",
        "total_amount": 150.00,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    },
    {
        "id": 2,
        "customer_id": 2,
        "status": "pending",
        "total_amount": 200.00,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    }
]</code></pre>

        <h3 class="text-xl font-semibold mb-2">Create a New Order</h3>
        <p>Method: <code>POST</code></p>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "customer_id": 1,
    "status": "pending",
    "total_amount": 200.00
}</code></pre>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>POST /api/orders</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "id": 3,
    "customer_id": 1,
    "status": "pending",
    "total_amount": 200.00,
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:00:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Update an Existing Order</h3>
        <p>Method: <code>PUT</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>PUT /api/orders/3</code></pre>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "status": "completed"
}</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "id": 3,
    "customer_id": 1,
    "status": "completed",
    "total_amount": 200.00,
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:05:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Delete an Order</h3>
        <p>Method: <code>DELETE</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>DELETE /api/orders/3</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "message": "Order deleted successfully."
}</code></pre>

        <h2 id="o_products" class="text-2xl font-semibold mb-2">4. Order Products</h2>
        <p class="mb-2">Endpoint: <code class="bg-gray-200 dark:bg-gray-700">/order_products</code></p>
        
        <h3 class="text-xl font-semibold mb-2">Retrieve All Order Products</h3>
        <p>Method: <code>GET</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>GET /api/order_products</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>[
    {
        "order_id": 1,
        "product_id": 1,
        "quantity": 2,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    },
    {
        "order_id": 1,
        "product_id": 2,
        "quantity": 1,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    }
]</code></pre>

        <h3 class="text-xl font-semibold mb-2">Create a New Order Product</h3>
        <p>Method: <code>POST</code></p>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "order_id": 1,
    "product_id": 3,
    "quantity": 2
}</code></pre>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>POST /api/order_products</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "order_id": 1,
    "product_id": 3,
    "quantity": 2,
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:00:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Update an Existing Order Product</h3>
        <p>Method: <code>PUT</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>PUT /api/order_products/1</code></pre>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "quantity": 3
}</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "order_id": 1,
    "product_id": 1,
    "quantity": 3,
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:05:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Delete an Order Product</h3>
        <p>Method: <code>DELETE</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>DELETE /api/order_products/1</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "message": "Order product deleted successfully."
}</code></pre>

        <h2 id="customers" class="text-2xl font-semibold mb-2">5. Customers</h2>
        <p class="mb-2">Endpoint: <code class="bg-gray-200 dark:bg-gray-700">/customers</code></p>
        
        <h3 class="text-xl font-semibold mb-2">Retrieve All Customers</h3>
        <p>Method: <code>GET</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>GET /api/customers</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>[
    {
        "id": 1,
        "name": "Customer 1",
        "email": "customer1@example.com",
        "address": "123 Main St",
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    },
    {
        "id": 2,
        "name": "Customer 2",
        "email": "customer2@example.com",
        "address": "456 Elm St",
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    }
]</code></pre>

        <h3 class="text-xl font-semibold mb-2">Create a New Customer</h3>
        <p>Method: <code>POST</code></p>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "name": "Customer 3",
    "email": "customer3@example.com",
    "address": "789 Pine St"
}</code></pre>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>POST /api/customers</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "id": 3,
    "name": "Customer 3",
    "email": "customer3@example.com",
    "address": "789 Pine St",
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:00:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Update an Existing Customer</h3>
        <p>Method: <code>PUT</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>PUT /api/customers/3</code></pre>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "email": "updated_email@example.com"
}</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "id": 3,
    "name": "Customer 3",
    "email": "updated_email@example.com",
    "address": "789 Pine St",
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:05:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Delete a Customer</h3>
        <p>Method: <code>DELETE</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>DELETE /api/customers/3</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "message": "Customer deleted successfully."
}</code></pre>

        <h2 class="text-2xl font-semibold mb-2">6. Products</h2>
        <p class="mb-2">Endpoint: <code class="bg-gray-200 dark:bg-gray-700">/products</code></p>
        
        <h3 class="text-xl font-semibold mb-2">Retrieve All Products</h3>
        <p>Method: <code>GET</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>GET /api/products</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>[
    {
        "id": 1,
        "name": "Product 1",
        "price": 100.00,
        "category_id": 1,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    },
    {
        "id": 2,
        "name": "Product 2",
        "price": 200.00,
        "category_id": 2,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    }
]</code></pre>

        <h3 class="text-xl font-semibold mb-2">Create a New Product</h3>
        <p>Method: <code>POST</code></p>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "name": "Product 3",
    "price": 150.00,
    "category_id": 1
}</code></pre>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>POST /api/products</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "id": 3,
    "name": "Product 3",
    "price": 150.00,
    "category_id": 1,
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:00:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Update an Existing Product</h3>
        <p>Method: <code>PUT</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>PUT /api/products/3</code></pre>
        <p>Request Body:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "price": 120.00
}</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "id": 3,
    "name": "Product 3",
    "price": 120.00,
    "category_id": 1,
    "created_at": "2024-10-11T12:00:00",
    "updated_at": "2024-10-11T12:05:00"
}</code></pre>

        <h3 class="text-xl font-semibold mb-2">Delete a Product</h3>
        <p>Method: <code>DELETE</code></p>
        <p>Example Request:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>DELETE /api/products/3</code></pre>
        <p>Response:</p>
        <pre class="bg-gray-200 dark:bg-gray-700 p-4"><code>{
    "message": "Product deleted successfully."
}</code></pre>
    </div>
</div>
