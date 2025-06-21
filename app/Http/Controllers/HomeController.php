<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalClientes = Cliente::count();
        $totalProdutos = Produto::count();
        $valorTotalEstoque = Produto::sum('preco');
        $ultimosClientes = Cliente::latest()->take(5)->get();

        return view('home', compact(
            'totalClientes',
            'totalProdutos',
            'valorTotalEstoque',
            'ultimosClientes'
        ));
    }
}
