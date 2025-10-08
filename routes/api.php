<?php

use App\Http\Controllers\staffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Api\InvoiceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/student', StudentController::class);
Route::get('staff',[staffController::class,'index']);
Route::post('staff',[staffController::class,'store']);
Route::get('staff/{id}',[staffController::class,'show']);
Route::put('staff/{id}/edit',[staffController::class,'update']);
Route::delete('staff/{id}/delete',[staffController::class,'destroy']);
Route::post('/calculate-invoice', [InvoiceController::class, 'calculateInvoice']);
