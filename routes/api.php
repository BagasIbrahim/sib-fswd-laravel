<?php

use App\Http\Controllers\APIProductController;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API product
Route::get('/product', [APIProductController::class, 'index']);
Route::post('/product/store', [APIProductController::class, 'store']);
Route::get('/product/{id}', [APIProductController::class, 'show']);
Route::put('/product/update/{id}', [APIProductController::class, 'update']);
Route::delete('/product/delete/{id}', [APIProductController::class, 'destroy']);
