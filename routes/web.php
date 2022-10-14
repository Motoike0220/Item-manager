<?php

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

Auth::routes();
//一般ユーザー
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items');

//検索
Route::prefix('search')->group(function () {
    Route::get('/items', [App\Http\Controllers\SearchController::class, 'Items'])->name('searchItems');
    Route::get('/users', [App\Http\Controllers\SearchController::class, 'Users'])->name('searchUsers');
});

//管理者のみ
Route::group(['middleware' => ['auth','can:Admin']],function(){
    //商品管理
    Route::prefix('items')->group(function () {
        Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
        Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
        Route::get('/update{id}', [App\Http\Controllers\ItemController::class, 'update']);
        Route::post('/update', [App\Http\Controllers\ItemController::class, 'update']);
        Route::get('/deletedItems', [App\Http\Controllers\ItemController::class, 'deletedItems']);
        Route::post('/delete', [App\Http\Controllers\ItemController::class, 'delete']);
        Route::get('/delete', [App\Http\Controllers\ItemController::class, 'delete']);
    });
    //ユーザー管理
    Route::prefix('users')->group(function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'users'])->name('users');
        Route::get('/edit{id}', [App\Http\Controllers\UserController::class, 'edit']);
        Route::post('/edit', [App\Http\Controllers\UserController::class, 'edit']);
        Route::post('/delete', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser');
    });
});



