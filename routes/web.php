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
use App\Http\Controllers\SliderController;
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

Route::middleware('role:admin')->group(function () {

    // Route for Slider
    Route::get('/daftarslider/s_tambah', [SliderController::class, 'create'])->middleware('auth');
    Route::post('/daftarslider/create', [SliderController::class, 'store'])->middleware('auth');
    Route::get('/daftarslider/s_detail/{id}', [SliderController::class, 'show'])->middleware('auth');
    Route::get('/daftarslider/s_edit/{id}', [SliderController::class, 'edit'])->middleware('auth');
    Route::put('/daftarslider/update', [SliderController::class, 'update'])->middleware('auth');
    Route::get('/daftarslider/hapus/{id}', [SliderController::class, 'destroy'])->middleware('auth');
    
    // Route for CRUD Users
    Route::get('/daftarpengguna/u_tambah', [UserController::class, 'create'])->middleware('auth');
    Route::post('/daftarpengguna/create', [UserController::class, 'store'])->middleware('auth');
    Route::get('/daftarpengguna/u_detail/{id}', [UserController::class, 'show'])->middleware('auth');
    Route::get('/daftarpengguna/u_edit/{id}', [UserController::class, 'edit'])->middleware('auth');
    Route::put('/daftarpengguna/update', [UserController::class, 'update'])->middleware('auth');
    Route::get('/daftarpengguna/hapus/{id}', [UserController::class, 'destroy'])->middleware('auth');

    // Route for CRUD Products
    Route::get('/daftarproduk/p_tambah', [ProductController::class, 'create'])->middleware('auth');
    Route::post('/daftarproduk/create', [ProductController::class, 'store'])->middleware('auth');
    Route::get('/daftarproduk/p_detail/{id}', [ProductController::class, 'show'])->middleware('auth');
    Route::get('/daftarproduk/p_edit/{id}', [ProductController::class, 'edit'])->middleware('auth');
    Route::put('/daftarproduk/update', [ProductController::class, 'update'])->middleware('auth');
    Route::get('/daftarproduk/hapus/{id}', [ProductController::class, 'destroy'])->middleware('auth');

    // Route for CRUD Categories
    Route::get('/daftarkategori/c_tambah', [CategoriesController::class, 'create'])->middleware('auth');
    Route::post('/daftarkategori/create', [CategoriesController::class, 'store'])->middleware('auth');
    Route::get('/daftarkategori/c_detail/{id}', [CategoriesController::class, 'show'])->middleware('auth');
    Route::get('/daftarkategori/c_edit/{id}', [CategoriesController::class, 'edit'])->middleware('auth');
    Route::put('/daftarkategori/update', [CategoriesController::class, 'update'])->middleware('auth');
    Route::get('/daftarkategori/hapus/{id}', [CategoriesController::class, 'destroy'])->middleware('auth');

    // Route for CRUD Group Users
    Route::get('/daftargruppengguna/g_tambah', [GroupUserController::class, 'create'])->middleware('auth');
    Route::post('/daftargruppengguna/create', [GroupUserController::class, 'store'])->middleware('auth');
    Route::get('/daftargruppengguna/g_detail/{id}', [GroupUserController::class, 'show'])->middleware('auth');
    Route::get('/daftargruppengguna/g_edit/{id}', [GroupUserController::class, 'edit'])->middleware('auth');
    Route::put('/daftargruppengguna/update', [GroupUserController::class, 'update'])->middleware('auth');
    Route::get('/daftargruppengguna/hapus/{id}', [GroupUserController::class, 'destroy'])->middleware('auth');
});

Route::middleware('role:admin,staff')->group(function () {
    Route::get('/daftarpengguna', [UserController::class, 'index'])->middleware('auth');
    Route::get('/daftarkategori', [CategoriesController::class, 'index'])->middleware('auth');
    Route::get('/daftargruppengguna', [GroupUserController::class, 'index'])->middleware('auth');
    Route::get('/daftarslider', [SliderController::class, 'index'])->middleware('auth');
});


Route::middleware('role:admin,staff,user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
    Route::get('/daftarproduk', [ProductController::class, 'index'])->middleware('auth');
});

//Route login   
Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout']);
    
//Route register
Route::get('/register', [RegisterController::class, 'index']);
