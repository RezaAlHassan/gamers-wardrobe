<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;

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
//Route::post('/storeProduct', 'App\Http\Controllers\Api\ProductController@store');
Route::get('/products', function () {
    $products = \App\Models\Product::all();
    return view('backend.productsTable', compact('products'));
});

Route::get('/products/createProductView', function () {
    return view('backend.createProduct');});
Route::post('/products/createProduct', [ProductController::class, 'storeProduct']);

Route::get('/Api/products/update', [ProductController::class, 'store']);
Route::get('/Api/products/update/{{product}}', 'Api\ProductController@update');

