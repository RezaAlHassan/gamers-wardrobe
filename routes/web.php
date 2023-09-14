<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//products view  (table)
Route::get('/products', function () {
    $products = \App\Models\Product::all();
    return view('backend.productsTable', compact('products'));
});

//create product view and update product
Route::get('/products/createProductView', function () {
    return view('backend.createProduct');});
Route::post('/products/createProduct', [ProductController::class, 'storeProduct']);

//update product view and update product
Route::get('/products/updateProductView/{id}', function ($id) {
    $product = \App\Models\Product::findOrFail($id);
    return view('backend.updateProduct', compact('product'));
})->name('products.edit');
Route::put('/products/updateProduct/{id}', [ProductController::class, 'updateProduct'])->name('products.update');

Route::get('/products/deleteProduct/{id}', function ($id) {
    $product = \App\Models\Product::findOrFail($id);
    return view('backend.products');
})->name('products.destroy');

Route::delete('/products/{id}', 'ProductController@destroy')->name('products.destroy');
