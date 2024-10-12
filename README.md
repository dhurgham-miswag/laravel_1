# E-Commerce API

This API allows you to manage products, categories, orders, and customers for an e-commerce platform. It provides endpoints for CRUD (Create, Read, Update, Delete) operations on each of these resources.



### 1. Products

- **Endpoint:** `/products`
- **Methods:** `GET`, `POST`, `PUT`, `DELETE`

#### Product Model:
- **id:** Integer (Auto-increment)
- **name:** String (Name of the product)
- **description:** Text (Detailed description of the product)
- **cost:** Decimal (Cost of the product)
- **price:** Decimal (Price of the product)
- **category_id:** Integer (Foreign key to the Category model)
- **stock:** Integer (Quantity in stock)
- **created_at:** Timestamp
- **updated_at:** Timestamp

#### Example Requests:
- **GET** `/products`: Retrieve a list of all products.
- **POST** `/products`: Create a new product with details like name, description, price, category_id, and stock.
- **PUT** `/products/{id}`: Update the details of a specific product.
- **DELETE** `/products/{id}`: Remove a product from the catalog.

---

### 2. Categories

- **Endpoint:** `/categories`
- **Methods:** `GET`, `POST`, `PUT`, `DELETE`

#### Category Model:
- **id:** Integer (Auto-increment)
- **name:** String (Name of the category)
- **description:** Text (Optional description of the category)
- **created_at:** Timestamp
- **updated_at:** Timestamp

#### Example Requests:
- **GET** `/categories`: Retrieve a list of all categories.
- **POST** `/categories`: Create a new category with a name and optional description.
- **PUT** `/categories/{id}`: Update the details of a specific category.
- **DELETE** `/categories/{id}`: Remove a category.

---

### 3. Orders

- **Endpoint:** `/orders`
- **Methods:** `GET`, `POST`, `PUT`, `DELETE`

#### Order Model:
- **id:** Integer (Auto-increment)
- **customer_id:** Integer (Foreign key to the Customer model)
- **status:** String (e.g., pending, completed, cancelled)
- **total_amount:** Decimal (Total amount for the order)
- **created_at:** Timestamp
- **updated_at:** Timestamp

#### Example Requests:
- **GET** `/orders`: Retrieve a list of all orders.
- **POST** `/orders`: Create a new order for a customer with details like customer_id, order_date, and status.
- **PUT** `/orders/{id}`: Update the status or other details of a specific order.
- **DELETE** `/orders/{id}`: Cancel or delete an order.

---

### 4. Order Products

- **Endpoint:** `/orders/{order_id}/items`
- **Methods:** `GET`

#### Order_Product (Pivot) Table:
- **order_id:** Integer (Foreign key to the Order model)
- **product_id:** Integer (Foreign key to the Product model)
- **quantity:** Integer (Quantity of the product in the order)

#### Example Requests:
- **GET** `/orders/{order_id}/items`: Retrieve the items associated with a specific order, including product details and quantities.

---

### 5. Customers

- **Endpoint:** `/customers`
- **Methods:** `GET`, `POST`, `PUT`, `DELETE`

#### Customer Model:
- **id:** Integer (Auto-increment)
- **name:** String (Name of the customer)
- **email:** String (Email address of the customer)
- **phone:** String (Phone number of the customer)
- **address:** Text (Address of the customer)
- **created_at:** Timestamp
- **updated_at:** Timestamp

#### Example Requests:
- **GET** `/customers`: Retrieve a list of all customers.
- **POST** `/customers`: Create a new customer with details like name, email, phone, and address.
- **PUT** `/customers/{id}`: Update the details of a specific customer.
- **DELETE** `/customers/{id}`: Remove a customer from the database.


