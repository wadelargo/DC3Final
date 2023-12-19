<?php

namespace App\Http\Controllers;
use App\Models\PurchasedItem;
use Illuminate\Http\Request;

class PurchasedItemController extends Controller
{
    public function index() {
        $purchaseditems = PurchasedItem::orderBy('id')->get();
        return response()->json($purchaseditems);
    }

    public function view(PurchasedItem $purchaseditems) {
        
        return response()->json($purchaseditems);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'merchandise_id' => 'required|exists:merchandises,id',
            'purchase_id' => 'required|exists:purchase,id',
            'whole_sale_qty' => 'required|integer',
            'purchase_price' => 'required|numeric',
        ]);

        $purchaseditems = PurchasedItem::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new purchased item record has been created with an ID# of ' . $purchaseditems->id
        ]);
    }

    //update
    public function update(Request $request, PurchasedItem $purchaseditems){
        $fields = $request->validate([
            'merchandise_id' => 'required|exists:merchandises,id',
            'purchase_id' => 'required|exists:purchase,id',
            'whole_sale_qty' => 'required|integer',
            'purchaseitem_price' => 'required|numeric',
        ]);

        $purchaseditems->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Purchased item with ID # ' . $purchaseditems->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(PurchasedItem $purchaseditems){
        $details = $purchaseditems->id;
        $purchaseditems->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The purchased item $details has been deleted."
        ]);
    }
}
