<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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


Route::get('/',[HomeController::class,'index']);
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_products', [AdminController::class, 'add_products']);
Route::post('/add_new', [AdminController::class, 'add_new']);
Route::get('/view_products', [AdminController::class, 'view_products']);
Route::get('/update/{id}', [AdminController::class, 'update']);
Route::get('/delete/{id}', [AdminController::class, 'delete']);
Route::post('/update_product/{id}', [AdminController::class, 'update_product']);
Route::get('/search', [HomeController::class, 'search']);
Route::post('/cart/{id}', [HomeController::class, 'cart']);
Route::get('/view_cart', [HomeController::class, 'view_cart']);
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);
Route::post('/confirmed_orders/{id}', [HomeController::class, 'confirmed_orders']);
Route::get('/deliveries', [AdminController::class, 'deliveries']);