<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


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
    return view('about');
});


// Login
Route::get('/login', [UsersController::class, 'DisplayLoginPage']);
Route::post('/login', [UsersController::class, 'LoginToAccount']);
Route::get('/logout', [UsersController::class, 'Logout']);

// Register
Route::get('/register', [UsersController::class, 'DisplayRegisterPage']);
Route::post('/register', [UsersController::class, 'CreateAccount']);

// Products
Route::get('/products', [ProductsController::class, 'DisplayProductsList']);
Route::get('/createproduct', [ProductsController::class, 'DisplayCreateProductPage']);
Route::post('/createproduct', [ProductsController::class, 'CreateNewProduct']);
Route::get('delete-product/{id}', [ProductsController::class, 'DeleteProduct']);
Route::get('edit/{id}', [ProductsController::class, 'EditProduct']);
Route::post('edit/edit-product', [ProductsController::class, 'ModifyProduct']);

// Cart
Route::post('addtocart', [ProductsController::class, 'AddToCart']);
Route::get('cartlist', [ProductsController::class, 'CartList']);
Route::get('cart-delete-item/{id}', [ProductsController::class, 'RemoveProductFromCart']);