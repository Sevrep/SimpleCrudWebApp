<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

// Route::get('/items', [ItemController::class, 'index']);
// Route::prefix('/item')->group(function () {
//     Route::post('/store', [ItemController::class, 'store']);
//     Route::put('/{id}', [ItemController::class, 'update']);
//     Route::delete('/{id}', [ItemController::class, 'destroy']);
// });

Route::resource('items', ItemController::class);