<?php

namespace App\Http\Controllers;
use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    public function index() {
        $merchandises = Merchandise::orderBy('brand', 'ASC')->get();
        return response()->json($merchandises);
    }

    public function view(Merchandise $merchandise) {
        
        return response()->json($merchandise);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'brand' => 'required|string|max:255',
            'description' => 'required|string',
            'retail_price' => 'required|numeric',
            'whole_sale_price' => 'required|numeric',
            'whole_sale_qty' => 'required|integer',
            'qty_stock' => 'required|integer',
        ]);

        $merchandise = Merchandise::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new merchandise record has been created with an ID# of ' . $merchandise->id
        ]);
    }

    //update
    public function update(Request $request, Merchandise $merchandise){
        $fields = $request->validate([
            'brand' => 'required|string|max:255',
            'description' => 'required|string',
            'retail_price' => 'required|numeric',
            'whole_sale_price' => 'required|numeric',
            'whole_sale_qty' => 'required|integer',
            'qty_stock' => 'required|integer',
        ]);

        $merchandise->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => "Merchandise with ID # {$merchandise->id} has been updated",
            'data' => $merchandise,
        ]);
    }

    //delete

    public function delete(Merchandise $merchandise){
        $details = $merchandise->brand;
        $merchandise->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The merchandise $details has been deleted."
        ]);
    }
}
