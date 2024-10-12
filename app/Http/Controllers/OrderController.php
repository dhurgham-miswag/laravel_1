<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderController extends Controller
{
    public function orderItems($id = null)
    {
        try {
            $order = Order::with('products')->findOrFail($id);

            if (request()->expectsJson()) {
                $items = $order->products->map(function ($product) {
                    return [
                        'product_id' => $product->id,
                        'name' => $product->name,
                        'quantity' => $product->pivot->quantity,
                    ];
                });
                return response()->json($items);
            }

            return view('orders.items', compact('order'));
        } catch (ModelNotFoundException $e) {
            if (request()->expectsJson()) {
                return response()->json(['message' => 'Order not found'], 404);
            }
            return redirect()->route('orders.index')->with('error', 'Order not found');
        }
    }

    public function index(Request $request)
    {
        $dateFilter = $request->get('date_filter', null);
        $ordersQuery = Order::when($dateFilter, function ($query, $dateFilter) {
            return $query->whereDate('created_at', $dateFilter);
        });
        if ($request->expectsJson()) {
            $orders = $ordersQuery->with('products')->get();
            return response()->json($orders);
        }
        $orders = $ordersQuery->paginate(10);
        return view('orders.index', compact('orders', 'dateFilter'));
    }

    public function viewOrder($id)
    {
        try {
            $order = Order::with('customer', 'products')->findOrFail($id);
            \Log::info($order->customer->orders); 
            return view('orders.view', compact('order'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('orders.index')->with('error', 'Order not found');
        }
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $isApiRequest = $request->is('api/*');
        $request->validate([
            'customer_id' => 'required|integer|exists:customers,id',
            'status' => $isApiRequest ? 'required|string' : 'nullable|string',
            'total_amount' => 'required|numeric',
            'products' => 'required|array',
            'products.*.product_id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'status' => $isApiRequest ? $request->status : 'pending', 
            'total_amount' => $request->total_amount,
        ]);

        foreach ($request->products as $product) {
            $item = Product::find($product['product_id']);

            if ($item->stock < $product['quantity']) {
                $message = 'Not enough stock for product ID: ' . $product['product_id'];
                if ($isApiRequest) {
                    return response()->json(['message' => $message], 400);
                } else {
                    return redirect()->back()->withErrors(['products' => $message])->withInput();
                }
            }

            $order->products()->attach($product['product_id'], ['quantity' => $product['quantity']]);
            $item->decrement('stock', $product['quantity']);
        }

        if ($isApiRequest) {
            return response()->json([
                'message' => 'Order created successfully',
                'order' => $order,
            ], 201);
        } else {
            return redirect()->route('orders.dashboard')->with('success', 'Order created successfully.');
        }
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.edit', compact('order', 'customers', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|integer|exists:customers,id',
            'status' => 'required|string',
            'products' => 'required|array',
            'products.*.product_id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'customer_id' => $request->customer_id,
            'status' => $request->status,
        ]);
        $order->products()->detach();
        foreach ($request->products as $product) {
            $order->products()->attach($product['product_id'], ['quantity' => $product['quantity']]);
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Order updated successfully.']);
        }
        return redirect()->route('orders.dashboard')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        if (request()->expectsJson()) {
            return response()->json(['message' => 'Order deleted successfully.'], 200);
        }

        return redirect()->route('orders.dashboard')->with('success', 'Order deleted successfully.');
    }

    private function calculateTotalAmount($productQuantities)
    {
        $total = 0;
        foreach ($productQuantities as $productId => $quantity) {
            $product = Product::find($productId);
            $total += $product->price * $quantity;
        }
        return $total;
    }
}
