<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index() {
        $sales = Sale::orderBy('id')->get();
        return response()->json($sales);
    }

    public function view(Sale $sale) {
        
        return response()->json($sale);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'is_credit' => 'required|boolean',
            'user_id' => 'required|exists:users,id',
        ]);

        $sale = Sale::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new sale record has been created with an ID# of ' . $sale->id
        ]);
    }

    //update
    public function update(Request $request, Sale $sale){
        $fields = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'is_credit' => 'required|boolean',
            'user_id' => 'required|exists:users,id',
        ]);

        $sale->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Sale with ID # ' . $sale->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(Sale $sale){
        $details = $sale->id;
        $sale->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The sale $details has been deleted."
        ]);
    }
}
