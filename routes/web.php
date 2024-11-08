<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;

Route::middleware('throttle:100,1')->group(function () {
    Route::get('/', [SalesController::class, 'showForm'])->name('sales.form');
    Route::post('/', [SalesController::class, 'findTopTheater'])->name('sales.findTop');
});
