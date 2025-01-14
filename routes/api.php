<?php


use App\Http\Controllers\Api\V1\InvoiceController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::prefix('/v1/invoice')->group(function (){
    Route::get('manage',  [InvoiceController::class, 'index']);
});
