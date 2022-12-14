<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);


//Route::get('/products', [ProductController::class, 'index']);
//Route::post('/products', [ProductController::class, 'store'])->name('products.create');
//Route::get('/products/{product}', [ProductController::class, 'store'])->name('products.show');
//....  it is the same to down
Route::resource('products', ProductController::class);


Route::get('/categories/json', [CategoryController::class, 'indexJson'])->name('categories.json');