<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PontoController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\IsRhMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(LoginController::class)->group(function() {
    Route::get('/', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/login', 'destroy')->name('login.destroy');
});

Route::controller(PontoController::class)->group(function() {
    Route::get('/ponto', 'index')->name('ponto.index');
    Route::post('/ponto/store', 'store')->name('ponto.store');
});

// Rotas de RH
Route::middleware([IsRhMiddleware::class])->group(function() {
    Route::controller(DashboardController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('dashboard.index');
    });
});

// Rotas de admin
Route::middleware([IsAdminMiddleware::class])->group(function() {
    Route::controller(AdminController::class)->group(function() {
        Route::get('/admin', 'index')->name('admin.index');
    });
});

// Rota de fallback
Route::fallback(function() {
    return view('sem-permissao');
});