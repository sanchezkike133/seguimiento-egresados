<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EgresadoController;
use App\Models\Egresado;
use Illuminate\Support\Facades\Route;

// 🌐 Público
Route::get('/', function () {
    return view('public.home');
});

// 🔑 Login
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);

// 🔒 Rutas protegidas (solo accesibles si estás autenticado)
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', [EgresadoController::class, 'index'])
    ->name('dashboard');


    // Logout
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

    // CRUD de egresados
    Route::resource('egresados', EgresadoController::class);
});
