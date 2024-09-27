<?php

use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
use App\Http\Controllers\cartController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login',[userController::class,"login"]);
Route::post("/login",[userController::class,"login_user"])->name('login_user');
Route::get("/register",[userController::class,"register"]);
Route::post("/register",[userController::class,"register_user"])->name("register_user");
Route::get('/home',[productController::class,"home"])->name("home");
Route::get('/showproduct/(id)',[productController::class,"showproduct"])->name("product.show");
Route::get('/product/{id}', [productController::class, 'showproduct'])->name('product.show');
Route::get("/add_to_cart/(id)", [cartController::class,"add_to_cart"])->name("add_to_cart");
Route::post('/add_to_cart/{id}', [cartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get("/cartlist",[cartcontroller::class,"cart_list"]);
Route::put("/checkout",[cartController::class,"checkout"])->name("checkout");