<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/home', [App\Http\Controllers\ProductController::class, 'productList'])->name('products.list');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminlogin'])->name('admin');
// Route::get('/create', [App\Http\Controllers\HomeController::class, 'admincreate'])->name('create');

Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::get('/admin-show', [App\Http\Controllers\ProductController::class, 'show'])->name('admin.show');
Route::post('/admin-update', [App\Http\Controllers\ProductController::class, 'update'])->name('admin.update');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('adminhome');


Route::get('cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/pay', [App\Http\Controllers\PayController::class, 'index'])->name('pay');
Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::get('/tracking', [App\Http\Controllers\TrackingController::class, 'index'])->name('tracking');
Route::get('/qrcode', [App\Http\Controllers\QRcodeController::class, 'index'])->name('qrcode');
Route::get('/listadmin', [App\Http\Controllers\ListAdminController::class, 'index'])->name('listadmin');


Route::get('/', [App\Http\Controllers\ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');





// Route::get('clear', [App\Http\Controllers\API\TambonController::class, 'index'])->name('tambon');


// Route::get('/tambon', [App\Http\Controllers\API\TambonController::class, 'getProvinces'])->name('tambon');
// Route::get('/tambon', [App\Http\Controllers\API\TambonController::class, 'getAmphoes'])->name('tambon');
// Route::get('/tambon', [App\Http\Controllers\API\TambonController::class, 'getTambons'])->name('tambon');
// Route::get('/tambon', [App\Http\Controllers\API\TambonController::class, 'getZipcodes'])->name('tambon');


// Route::get('/tambon', function () {
//     $provinces = Tambon::select('province')->distinct()->get();
//     $amphoes = Tambon::select('amphoe')->distinct()->get();
//     $tambons = Tambon::select('tambon')->distinct()->get();
//     return view("tambon/index", compact('provinces','amphoes','tambons'));
// });



Route::get('/tambon', function () {
    return view("tambon/index");

});


