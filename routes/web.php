<?php

use App\Http\Controllers\ItemController;
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

Route::get('/produk', [ItemController::class, 'items']);

Route::get('/pengguna', [UserController::class, 'users']);

Route::get('/pengguna/formtambah', [UserController::class, 'formtambah']);

Route::post('/pengguna/create', [UserController::class, 'create']);