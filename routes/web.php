<?php

use App\Http\Controllers\ItemsController;
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

Route::get('/items', [ItemsController::class, 'index']);
Route::prefix('/item')->group(function(){
        Route::post('/store', [ItemsController::class, 'store']);
        Route::put('/{id}', [ItemsController::class, 'update']);
        Route::delete('/{id}', [ItemsController::class, 'destroy']);
});
