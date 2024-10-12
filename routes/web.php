<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;

// Auth Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Dashboard
Route::get('/dashboard', function () {
    $totalProducts = Product::count();
    $totalCategories = Category::count();
    $totalOrders = Order::count();
    $totalOrderProducts = Order::withCount('products')->get()->sum('products_count');
    $totalCustomers = Customer::count();

    return view('dashboard', compact('totalProducts', 'totalCategories', 'totalOrders', 'totalOrderProducts', 'totalCustomers'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Product Routes
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/order_products', [OrderController::class, 'index'])->name('order.products');
    Route::get('/orders/{id?}/items', [OrderController::class, 'orderItems'])->name('orders.items');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('/products/add', function() {
        $categories = Category::all(); 
        return view('products.add_product', compact('categories')); 
    });
    Route::post('/products/add', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products_dashboard', function (Request $request) {
        $query = Product::with('category');
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $products = $query->paginate(10);
        $categories = Category::all();
        return view('products.index', ['products' => $products, 'categories' => $categories]);
    })->name('products.dashboard');

    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/category/{category}', [ProductController::class, 'getProductsByCategory'])->name('products.byCategory');
    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/products/search2', [ProductController::class, 'search2'])->name('products.search2');

    // Orders
    Route::get('/orders_dashboard', [OrderController::class, 'index'])->name('orders.dashboard');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/orders/{id}/view', [OrderController::class, 'viewOrder'])->name('orders.view');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    // Customers
    Route::get('/customers_dashboard', [CustomerController::class, 'index'])->name('customers.dashboard'); 
    Route::get('/customers/add', function() {
        return view('customers.add'); 
    })->name('customers.add');
    Route::post('/customers/add', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id}/edit', function ($id) {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', ['customer' => $customer]); 
    })->name('customers.edit');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    // Categories
    Route::get('/categories_dashboard', [CategoryController::class, 'index'])->name('categories.dashboard');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/add', function() {
        return view('categories.create');
    });
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Profile Management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





// Include Auth Routes
require __DIR__.'/auth.php';
