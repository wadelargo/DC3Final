<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::orderBy('name', 'ASC')->get();
        return response()->json($customers);
    }

    public function view(Customer $customer) {
        
        $customerWithSales = $customer->load('sales');

        return response()->json($customerWithSales);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'balance' => 'required|numeric',
        ]);

        $customer = Customer::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => "Customer with ID # {$customer->id} has been updated",
            'data'=> $customer,
        ]);
    }

    //update
    public function update(Request $request, Customer $customer){
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'balance' => 'required|numeric',
        ]);

        $customer->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Customer with ID # ' . $customer->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(Customer $customer){
        $details = $customer->name;
        $customer->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The customer $details has been deleted."
        ]);
    }
}
