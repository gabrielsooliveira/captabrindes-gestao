<?php

use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('produtos')->middleware(['auth'])->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
});
