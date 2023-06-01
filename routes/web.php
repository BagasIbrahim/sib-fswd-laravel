<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DashboardController;
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
//     return view('welcome');
// });

Route::get('/daftarpengguna', function () {
    return view('/DashboardPage/d_pengguna');
})->middleware('auth');


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


//Route landing page
Route::get('/', [LandingPageController::class, 'index']);

//Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Route for CRUD Users
Route::get('/pengguna', [UserController::class, 'index']);
Route::get('/daftarpengguna/formtambah', [UserController::class, 'create'])->middleware('auth');
Route::post('/daftarpengguna/create', [UserController::class, 'store'])->middleware('auth');
Route::get('/daftarpengguna/detail/{id}', [UserController::class, 'show'])->middleware('auth');
Route::get('/daftarpengguna/formedit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::put('/daftarpengguna/update', [UserController::class, 'update'])->middleware('auth');
Route::get('/daftarpengguna/hapus/{id}', [UserController::class, 'destroy'])->middleware('auth');

// Route for CRUD Products
Route::get('/daftarproduk', [ProductController::class, 'index'])->middleware('auth');
Route::get('/daftarproduk/formtambah', [ProductController::class, 'create'])->middleware('auth');
Route::post('/daftarproduk/create', [ProductController::class, 'store'])->middleware('auth');
Route::get('/daftarproduk/detail/{id}', [ProductController::class, 'show'])->middleware('auth');
Route::get('/daftarproduk/formedit/{id}', [ProductController::class, 'edit'])->middleware('auth');
Route::put('/daftarproduk/update', [ProductController::class, 'update'])->middleware('auth');
Route::get('/daftarproduk/hapus/{id}', [ProductController::class, 'destroy'])->middleware('auth');

// Route for CRUD Categories
Route::get('/daftarkategori', [CategoriesController::class, 'index'])->middleware('auth');
Route::get('/daftarkategori/formtambah', [CategoriesController::class, 'create'])->middleware('auth');
Route::post('/daftarkategori/create', [CategoriesController::class, 'store'])->middleware('auth');
Route::get('/daftarkategori/detail/{id}', [CategoriesController::class, 'show'])->middleware('auth');
Route::get('/daftarkategori/formedit/{id}', [CategoriesController::class, 'edit'])->middleware('auth');
Route::put('/daftarkategori/update', [CategoriesController::class, 'update'])->middleware('auth');
Route::get('/daftarkategori/hapus/{id}', [CategoriesController::class, 'destroy'])->middleware('auth');

// Route for CRUD Group Users
Route::get('/daftargruppengguna', [GroupUserController::class, 'index'])->middleware('auth');
Route::get('/daftargruppengguna/formtambah', [GroupUserController::class, 'create'])->middleware('auth');
Route::post('/daftargruppengguna/create', [GroupUserController::class, 'store'])->middleware('auth');
Route::get('/daftargruppengguna/detail/{id}', [GroupUserController::class, 'show'])->middleware('auth');
Route::get('/daftargruppengguna/formedit/{id}', [GroupUserController::class, 'edit'])->middleware('auth');
Route::put('/daftargruppengguna/update', [GroupUserController::class, 'update'])->middleware('auth');
Route::get('/daftargruppengguna/hapus/{id}', [GroupUserController::class, 'destroy'])->middleware('auth');

//Route login   
Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout']);

//Route register
Route::get('/register', [RegisterController::class, 'index']);