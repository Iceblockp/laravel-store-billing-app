<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('product.index');
// });

Route::resource('/product', ProductController::class);
Route::resource('/bill', BillController::class);
Route::resource('/record', RecordController::class);
