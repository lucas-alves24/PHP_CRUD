<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('produtos' , [ProductController::class, 'index'])->name('products');
Route::post('produto/cadastro',[ProductController::class, 'store'])->name('products.store');
Route::put('produto/{id}/atualizar',[ProductController::class,'update'])->name('products.update');
Route::delete('produto/{id}/delete',[ProductController::class,'destroy'])->name('products.destroy');
