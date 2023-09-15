<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\Response;

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

/* BACKEND */
//products view  (table) 
Route::get('/products', function () {
    $products = \App\Models\Product::all();
    return view('backend.productsTable', compact('products'));
})->name('products.table');

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

/*Route::delete('/products/{id}', function ($id) {
    $product = \App\Models\Product::findOrFail($id);
    return view('backend.productsTable');
})->name('products.destroy');*/
Route::delete('/products/{id}', 'App\Http\Controllers\Api\ProductController@destroy')->name('products.destroy');

/* FRONTEND */
Route::get('/shop', function () {
    $products = \App\Models\Product::all();
    return view('frontend.shop', compact('products'));
});

Route::get('/index', function () {
    return view('frontend.index');
});

Route::get('/product/{id}', function ($id) {
    $product = \App\Models\Product::findOrFail($id);
    return view('frontend.product');
});