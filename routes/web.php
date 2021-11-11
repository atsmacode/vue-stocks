<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockOrderController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::resource('stocks', StockController::class);
Route::resource('portfolio', PortfolioController::class);
Route::resource('user', UserController::class);

Route::post('stock/order', [StockOrderController::class, 'store']);
Route::post('stock/sell', [StockOrderController::class, 'sellStock']);
