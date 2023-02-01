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

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('/home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminlogin'])->name('admin');
// Route::get('/create', [App\Http\Controllers\HomeController::class, 'admincreate'])->name('create');

Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::get('/admin-show', [App\Http\Controllers\ProductController::class, 'show'])->name('admin.show');
Route::post('/admin-update', [App\Http\Controllers\ProductController::class, 'update'])->name('admin.update');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('adminhome');


Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('/cart');
Route::get('/pay', [App\Http\Controllers\PayController::class, 'index'])->name('pay');
Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::get('/tracking', [App\Http\Controllers\TrackingController::class, 'index'])->name('tracking');
Route::get('/qrcode', [App\Http\Controllers\QRcodeController::class, 'index'])->name('qrcode');
Route::get('/listadmin', [App\Http\Controllers\ListAdminController::class, 'index'])->name('listadmin');

