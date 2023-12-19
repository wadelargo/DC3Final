<?php

use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasedItemController;
use App\Http\Controllers\SoldItemController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//getting the data
Route::get('/merchandises', [MerchandiseController::class, 'index']);
Route::get('/merchandises/{merchandise}', [MerchandiseController::class,'view']);
//updating the data
Route::patch('/merchandises/{merchandise}', [MerchandiseController::class, 'update']);
Route::put('merchandises/{merchandise}', [MerchandiseController::class, 'update']);
//creating the data
Route::post('/merchandises', [MerchandiseController::class, 'store']);
//deleting the data
Route::delete('/merchandises/{merchandise}', [MerchandiseController::class, 'delete']);



//getting the data
Route::get('/suppliers', [SupplierController::class, 'index']);
Route::get('/suppliers/{supplier}', [SupplierController::class,'view']);
//updating the data
Route::patch('/suppliers/{supplier}', [SupplierController::class, 'update']);
Route::put('suppliers/{supplier}', [SupplierController::class, 'update']);
//creating the data
Route::post('/suppliers', [SupplierController::class, 'store']);
//deleting the data
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'delete']);



//getting the data
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{customer}', [CustomerController::class,'view']);
//updating the data
Route::patch('/customers/{customer}', [CustomerController::class, 'update']);
Route::put('customers/{customer}', [CustomerController::class, 'update']);
//creating the data
Route::post('/customers', [CustomerController::class, 'store']);
//deleting the data
Route::delete('/customers/{customer}', [CustomerController::class, 'delete']);



//getting the data
Route::get('/sales', [SaleController::class, 'index']);
Route::get('/sales/{sale}', [SaleController::class,'view']);
//updating the data
Route::patch('/sales/{sale}', [SaleController::class, 'update']);
Route::put('sales/{sale}', [SaleController::class, 'update']);
//creating the data
Route::post('/sales', [SaleController::class, 'store']);
//deleting the data
Route::delete('/sales/{sale}', [SaleController::class, 'delete']);



//getting the data
Route::get('/purchases', [PurchaseController::class, 'index']);
Route::get('/purchases/{purchase}', [PurchaseController::class,'view']);
//updating the data
Route::patch('/purchases/{purchase}', [PurchaseController::class, 'update']);
Route::put('purchases/{purchase}', [PurchaseController::class, 'update']);
//creating the data
Route::post('/purchases', [PurchaseController::class, 'store']);
//deleting the data
Route::delete('/purchases/{purchase}', [PurchaseController::class, 'delete']);



//getting the data
Route::get('/purchaseditems', [PurchasedItemController::class, 'index']);
Route::get('/purchaseditems/{purchaseditem}', [PurchasedItemController::class,'view']);
//updating the data
Route::patch('/purchaseditems/{purchaseditem}', [PurchasedItemController::class, 'update']);
Route::put('purchaseditems/{purchaseditem}', [PurchasedItemController::class, 'update']);
//creating the data
Route::post('/purchaseditems', [PurchasedItemController::class, 'store']);
//deleting the data
Route::delete('/purchaseditems/{purchaseditem}', [PurchasedItemController::class, 'delete']);



//getting the data
Route::get('/solditems', [SoldItemController::class, 'index']);
Route::get('/solditems/{solditem}', [SoldItemController::class,'view']);
//updating the data
Route::patch('/solditems/{solditem}', [SoldItemController::class, 'update']);
Route::put('solditems/{solditem}', [SoldItemController::class, 'update']);
//creating the data
Route::post('/solditems', [SoldItemController::class, 'store']);
//deleting the data
Route::delete('/solditems/{solditem}', [SoldItemController::class, 'delete']);






