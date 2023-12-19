<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {
        $suppliers = Supplier::orderBy('company_name', 'ASC')->get();
        return response()->json($suppliers);
    }

    public function view(Supplier $supplier) {
        
        return response()->json($supplier);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'contact_person' => 'required|string',
        ]);

        $supplier = supplier::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new supplier record has been created with an ID# of ' . $supplier->id
        ]);
    }

    //update
    public function update(Request $request, Supplier $supplier){
        $fields = $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'contact_person' => 'required|string',
        ]);

        $supplier->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Supplier with ID # ' . $supplier->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(Supplier $supplier){
        $details = $supplier->company_name;
        $supplier->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The supplier $details has been deleted."
        ]);
    }
}
