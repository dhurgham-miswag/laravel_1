<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json(Customer::all());
        }

        $customers = Customer::paginate(10);
        return view('customers.index', ['customers' => $customers]);
    }

    public function store(Request $request)
    {
        $validator = $this->validateCustomer($request);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $customer = Customer::create($validator->validated());

        if ($request->expectsJson()) {
            return response()->json($customer, 201);
        }

        return redirect()->route('customers.dashboard')->with('success', 'Customer created successfully.');
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validateCustomer($request, $id);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $customer = Customer::findOrFail($id);
        $customer->update($validator->validated());

        if ($request->expectsJson()) {
            return response()->json($customer);
        }

        return redirect()->route('customers.dashboard')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Customer deleted successfully!'], 200);
        }

        return redirect()->route('customers.dashboard')->with('success', 'Customer deleted successfully.');
    }

    private function validateCustomer(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email' . ($id ? ',' . $id : ''),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ], [
            'name.required' => 'The customer name is required.',
            'name.string' => 'The customer name must be a string.',
            'name.max' => 'The customer name must not exceed 255 characters.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email must not exceed 255 characters.',
            'email.unique' => 'The email has already been taken.',
            'phone.string' => 'The phone number must be a valid string.',
            'phone.max' => 'The phone number must not exceed 20 characters.',
            'address.string' => 'The address must be a valid string.',
            'address.max' => 'The address must not exceed 255 characters.',
        ]);

        return $validator;
    }
}
