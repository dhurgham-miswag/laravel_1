# API Documentation

This document provides an overview of the available endpoints for managing customers, products, orders, and categories in the application.

## Table of Contents
- [1. Products](#1-products)
- [2. Categories](#2-categories)
- [3. Orders](#3-orders)
- [4. Customers](#4-customers)
- [5. Order Products](#5-order-products)

## 1. Products

### Endpoint: `/products`

#### Retrieve All Products
- **Method:** `GET`
- **Example Request:**
    ```
    GET /api/products
    ```
- **Response:**
    ```json
    [
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
        ...
    ]
    ```

#### Create a New Product
- **Method:** `POST`
- **Request Body:**
    ```json
    {
        "name": "Product 3",
        "description": "Description for Product 3",
        "cost": 30.00,
        "price": 45.00,
        "category_id": 1,
        "stock": 200
    }
    ```
- **Example Request:**
    ```
    POST /api/products
    ```
- **Response:**
    ```json
    {
        "id": 3,
        "name": "Product 3",
        "description": "Description for Product 3",
        "cost": 30.00,
        "price": 45.00,
        "category_id": 1,
        "stock": 200,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    }
    ```

#### Update an Existing Product
- **Method:** `PUT`
- **Example Request:**
    ```
    PUT /api/products/3
    ```
- **Request Body:**
    ```json
    {
        "stock": 180
    }
    ```
- **Response:**
    ```json
    {
        "id": 3,
        "name": "Product 3",
        "description": "Description for Product 3",
        "cost": 30.00,
        "price": 45.00,
        "category_id": 1,
        "stock": 180,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:05:00"
    }
    ```

#### Delete a Product
- **Method:** `DELETE`
- **Example Request:**
    ```
    DELETE /api/products/3
    ```
- **Response:**
    ```json
    {
        "message": "Product deleted successfully."
    }
    ```

---

## 2. Categories

### Endpoint: `/categories`

#### Retrieve All Categories
- **Method:** `GET`
- **Example Request:**
    ```
    GET /api/categories
    ```
- **Response:**
    ```json
    [
        {
            "id": 1,
            "name": "Category 1",
            "description": "Description for Category 1",
            "created_at": "2024-10-11T12:00:00",
            "updated_at": "2024-10-11T12:00:00"
        },
        ...
    ]
    ```

#### Create a New Category
- **Method:** `POST`
- **Request Body:**
    ```json
    {
        "name": "Category 3",
        "description": "Description for Category 3"
    }
    ```
- **Example Request:**
    ```
    POST /api/categories
    ```
- **Response:**
    ```json
    {
        "id": 3,
        "name": "Category 3",
        "description": "Description for Category 3",
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    }
    ```

#### Update an Existing Category
- **Method:** `PUT`
- **Example Request:**
    ```
    PUT /api/categories/3
    ```
- **Request Body:**
    ```json
    {
        "description": "Updated description for Category 3"
    }
    ```
- **Response:**
    ```json
    {
        "id": 3,
        "name": "Category 3",
        "description": "Updated description for Category 3",
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:05:00"
    }
    ```

#### Delete a Category
- **Method:** `DELETE`
- **Example Request:**
    ```
    DELETE /api/categories/3
    ```
- **Response:**
    ```json
    {
        "message": "Category deleted successfully."
    }
    ```

---

## 3. Orders

### Endpoint: `/orders`

#### Retrieve All Orders
- **Method:** `GET`
- **Example Request:**
    ```
    GET /api/orders
    ```
- **Response:**
    ```json
    [
        {
            "id": 1,
            "customer_id": 1,
            "status": "completed",
            "total_amount": 150.00,
            "created_at": "2024-10-11T12:00:00",
            "updated_at": "2024-10-11T12:00:00"
        },
        ...
    ]
    ```

#### Create a New Order
- **Method:** `POST`
- **Request Body:**
    ```json
    {
        "customer_id": 1,
        "status": "pending",
        "total_amount": 200.00
    }
    ```
- **Example Request:**
    ```
    POST /api/orders
    ```
- **Response:**
    ```json
    {
        "id": 3,
        "customer_id": 1,
        "status": "pending",
        "total_amount": 200.00,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:00:00"
    }
    ```

#### Update an Existing Order
- **Method:** `PUT`
- **Example Request:**
    ```
    PUT /api/orders/3
    ```
- **Request Body:**
    ```json
    {
        "status": "completed"
    }
    ```
- **Response:**
    ```json
    {
        "id": 3,
        "customer_id": 1,
        "status": "completed",
        "total_amount": 200.00,
        "created_at": "2024-10-11T12:00:00",
        "updated_at": "2024-10-11T12:05:00"
    }
    ```

#### Delete an Order
- **Method:** `DELETE`
- **Example Request:**
    ```
    DELETE /api/orders/3
    ```
- **Response:**
    ```json
    {
        "message": "Order deleted successfully."
    }
    ```

---

## 4. Customers

### Endpoint: `/customers`

_TODO: Add customer-related endpoints and examples here._

---

## 5. Order Products

### Endpoint: `/order_products`

_TODO: Add order product-related endpoints and examples here._

---

## Conclusion
This API allows you to manage customers, products, orders, and categories efficiently. For any additional information, please refer to the codebase or reach out to the development team.
