<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rotas Admistrativas
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-area', function () {
        return "Área restrita para ADMIN";
    });
});

Route::middleware(['auth', 'role:vendedor'])->group(function () {
    Route::get('/vendedor-area', function () {
        return "Área restrita para VENDEDOR";
    });
});

Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/cliente-area', function () {
        return "Área restrita para CLIENTE";
    });
});

// Rota acessível por qualquer usuário autenticado
Route::middleware(['auth'])->get('/dashboard', function () {
    return "Dashboard geral";
});
