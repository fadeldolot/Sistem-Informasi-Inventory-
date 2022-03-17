<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistributorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarHargaController;
use App\Http\Controllers\DaftarProdukController;


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
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'welcome'])->middleware('guest');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

//logout
Route::get('/logout', [LoginController::class, 'logout']);


// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);



// Dashboard admin
Route::group(['middleware' => ['auth', 'cekAdmin:admin']], function () {
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/produk/printpdf', [ProdukController::class, 'print']);
    Route::post('/produk/create', [ProdukController::class, 'store']);
    Route::post('/produk/{id}/update', [ProdukController::class, 'update']);
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit']);
    Route::get('/produk/{id}/delete', [ProdukController::class, 'destroy']);
    Route::get('/distributor', [DistributorController::class, 'index']);
    Route::post('/distributor/create', [DistributorController::class, 'store']);
    Route::get('/distributor/{distributor}/delete', [DistributorController::class, 'destroy']);
    Route::get('/distributor/{distributor}/edit', [DistributorController::class, 'edit']);
    Route::post('/distributor/{distributor}/update', [DistributorController::class, 'update']);
    Route::get('/data_penjualan', [PenjualanController::class, 'index']);
    Route::get('/data_penjualan/create', [PenjualanController::class, 'create']);
    Route::get('/data_penjualan/printpdf', [PenjualanController::class, 'print']);
    Route::post('/data_penjualan/store', [PenjualanController::class, 'store']);
    Route::get('/home', [HomeController::class, 'index']);
});

//dashboard User
Route::group(['middleware' => ['auth', 'cekAdmin:admin,user']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/daftarharga', [DaftarHargaController::class, 'index']);
    Route::get('/daftarproduk', [DaftarProdukController::class, 'index']);
});
