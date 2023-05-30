<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ItemController;
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

//Route login
Route::get('login', [LoginController::class, 'index']);

//Route register
Route::get('register', [RegisterController::class, 'index']);

// Route for CRUD Users
Route::get('/pengguna', [UserController::class, 'index']);
Route::get('/daftarpengguna/formtambah', [UserController::class, 'create']);
Route::post('/daftarpengguna/create', [UserController::class, 'store']);
Route::get('/daftarpengguna/detail/{id}', [UserController::class, 'show']);
Route::get('/daftarpengguna/formedit/{id}', [UserController::class, 'edit']);
Route::put('/daftarpengguna/update', [UserController::class, 'update']);
Route::get('/daftarpengguna/hapus/{id}', [UserController::class, 'destroy']);

// Route for CRUD Products
// Route::get('/welcome', [ProductController::class, 'index']);
Route::get('/daftarproduk/formtambah', [ProductController::class, 'create']);
Route::post('/daftarproduk/create', [ProductController::class, 'store']);
Route::get('/daftarproduk/detail/{id}', [ProductController::class, 'show']);
Route::get('/daftarproduk/formedit/{id}', [ProductController::class, 'edit']);
Route::put('/daftarproduk/update', [ProductController::class, 'update']);
Route::get('/daftarproduk/hapus/{id}', [ProductController::class, 'destroy']);

// Route for CRUD Categories
Route::get('/daftarkategori', [CategoriesController::class, 'index']);
Route::get('/daftarkategori/formtambah', [CategoriesController::class, 'create']);
Route::post('/daftarkategori/create', [CategoriesController::class, 'store']);
Route::get('/daftarkategori/detail/{id}', [CategoriesController::class, 'show']);
Route::get('/daftarkategori/formedit/{id}', [CategoriesController::class, 'edit']);
Route::put('/daftarkategori/update', [CategoriesController::class, 'update']);
Route::get('/daftarkategori/hapus/{id}', [CategoriesController::class, 'destroy']);

// Route for CRUD Group Users
Route::get('/daftargruppengguna', [GroupUserController::class, 'index']);
Route::get('/daftargruppengguna/formtambah', [GroupUserController::class, 'create']);
Route::post('/daftargruppengguna/create', [GroupUserController::class, 'store']);
Route::get('/daftargruppengguna/detail/{id}', [GroupUserController::class, 'show']);
Route::get('/daftargruppengguna/formedit/{id}', [GroupUserController::class, 'edit']);
Route::put('/daftargruppengguna/update', [GroupUserController::class, 'update']);
Route::get('/daftargruppengguna/hapus/{id}', [GroupUserController::class, 'destroy']);