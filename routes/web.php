<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get("/", [ProductController::class,"index"])->name("products.index");
Route::get("/portal", [ProductController::class,"showPortal"])->name("products.portal");
Route::get("/admin", [ProductController::class, "showadmin"])->name("products.admin");
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/{id}', [ProductController::class,'delete'])->name('products.delete');
