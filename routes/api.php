<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\DataKehamilanController;
use App\Http\Controllers\Api\ArtikelController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HphtController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\ParitasController;

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
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->name("login");
Route::resource('kategori', KategoriController::class)->except([
    'create','edit'
]);
Route::middleware('auth:sanctum')->group(function() {
    Route::resource('kehamilan', DataKehamilanController::class)->except([
        'create','edit'
    ]);
    Route::resource('artikel', ArtikelController::class)->except([
        'create','edit'
    ]);
    Route::resource('hpht', HphtController::class)->except([
        'create','edit'
    ]);
    // Route::resource('kategori', KategoriController::class)->except([
    //     'create','edit'
    // ]);
    Route::resource('paritas', ParitasController::class)->except([
        'create','edit'
    ]);
});
