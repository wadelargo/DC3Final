<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index() {
        $purchases = Purchase::orderBy('id')->get();
        return response()->json($purchases);
    }

    public function view(Purchase $purchase) {
        
        return response()->json($purchase);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'date' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
            'total' => 'required|numeric',
            'invoice_no' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $purchase = Purchase::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new purchase record has been created with an ID# of ' . $purchase->id
        ]);
    }

    //update
    public function update(Request $request, Purchase $purchase){
        $fields = $request->validate([
            'date' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
            'total' => 'required|numeric',
            'invoice_no' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $purchase->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Purchase with ID # ' . $purchase->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(Purchase $purchase){
        $details = $purchase->id;
        $purchase->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The purchase $details has been deleted."
        ]);
    }
}
