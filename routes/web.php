<?php
 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;


Route::get('/', function () {
    $clientes = App\Models\Cliente::latest()->take(5)->get();
    $produtos = App\Models\Produto::latest()->take(5)->get();
    $totalClientes = App\Models\Cliente::count();
    $totalProdutos = App\Models\Produto::count();
    $valorTotalEstoque = App\Models\Produto::sum('preco');

    return view('welcome', compact(
        'clientes',
        'produtos',
        'totalClientes',
        'totalProdutos',
        'valorTotalEstoque'
    ));
});
Auth::routes();


// Rotas de Clientes (apenas essa Rota é necessaria para roda )
/**
 *  
*Route::resource('clientes', ClienteController::class);
*Route::resource('clientes', ClienteController::class)->middleware('auth');
*
 * 
 */

Route::resource('clientes', ClienteController::class)->middleware('auth');
// Busca de Editar
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
// Busca de clientes
Route::get('/clientes/buscar', [ClienteController::class, 'buscar'])->middleware('auth');
// Home
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Rotas Administrativas
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

// Dashboard geral
Route::middleware(['auth'])->get('/dashboard', function () {
    return "Dashboard geral";
});



// Vendas
Route::resource('vendas', VendaController::class)->middleware('auth');
Route::post('/vendas/calcular-parcelas', [VendaController::class, 'calcularParcelas'])->middleware('auth');