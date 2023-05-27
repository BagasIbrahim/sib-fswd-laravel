<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
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

Route::get('/dashboard', function () {
    return view('/DashboardPage/dashboard');
});

Route::get('/daftarpengguna', function () {
    return view('/DashboardPage/d_pengguna');
});

Route::get('/daftarproduk', function () {
    return view('/DashboardPage/d_produk');
});

Route::get('/hello', function () {
    return "Nama saya adalah Bagas";
});

Route::redirect('/nama', '/hello');

Route::fallback(function () {
    return "Maaf, halaman tidak ditemukan";
});

Route::get('/conflict/nokia', function () {
    return "Nama barang saya nokia ";
});

Route::get('/items/{merk}', function ($id) {
    return "Item yang dicari adalah " . $id;
});

Route::get('/conflict/{nama}', function ($namaItem) {
    return "Item yang dicari adalah " . $namaItem;
});

// Route::get('/produk', [ItemController::class, 'items']);

Route::get('/', [ProductController::class, 'index']);

// Route for CRUD Users
Route::get('/pengguna', [UserController::class, 'index']);
Route::get('/daftarpengguna/formtambah', [UserController::class, 'create']);
Route::post('/daftarpengguna/create', [UserController::class, 'store']);
Route::get('/daftarpengguna/detail/{id}', [UserController::class, 'show']);
Route::get('/daftarpengguna/formedit/{id}', [UserController::class, 'edit']);
Route::post('/daftarpengguna/update', [UserController::class, 'update']);
Route::get('/daftarpengguna/hapus/{id}', [UserController::class, 'destroy']);

// Route for CRUD Products
Route::get('/welcome', [ProductController::class, 'index']);
Route::get('/daftarproduk/formtambah', [ProductController::class, 'create']);
Route::post('/daftarproduk/create', [ProductController::class, 'store']);
Route::get('/daftarproduk/detail/{id}', [ProductController::class, 'show']);
Route::get('/daftarproduk/formedit/{id}', [ProductController::class, 'edit']);
Route::post('/daftarproduk/update', [ProductController::class, 'update']);
Route::get('/daftarproduk/hapus/{id}', [ProductController::class, 'destroy']);