<?php

namespace App\Http\Controllers;
use App\Models\SoldItem;
use Illuminate\Http\Request;

class SoldItemController extends Controller
{
    public function index() {
        $solditems = SoldItem::orderBy('id')->get();
        return response()->json($solditems);
    }

    public function view(SoldItem $solditem) {
        
        return response()->json($solditem);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'merchandise_id' => 'required|exists:merchandises,id',
            'sale_id' => 'required|exists:sales,id',
            'qty' => 'required|integer',
            'selling_price' => 'required|numeric',
        ]);

        $solditem = SoldItem::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new sold item record has been created with an ID# of ' . $solditem->id
        ]);
    }

    //update
    public function update(Request $request, SoldItem $solditem){
        $fields = $request->validate([
            'merchandise_id' => 'required|exists:merchandises,id',
            'sale_id' => 'required|exists:sales,id',
            'qty' => 'required|integer',
            'selling_price' => 'required|numeric',
        ]);

        $solditem->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Sold item with ID # ' . $solditem->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(SoldItem $solditem){
        $details = $solditem->id;
        $solditem->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The sold item $details has been deleted."
        ]);
    }
}
