@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h2>Dashboard</h2>
        <p class="text-muted">Bem-vindo, {{ Auth::user()->name }}!</p>
    </div>
</div>

<div class="row">
    <!-- Cards de Resumo -->
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Clientes</h5>
                <h2 class="card-text">{{ $totalClientes }}</h2>
                <a href="/clientes" class="text-white">Ver todos</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Produtos</h5>
                <h2 class="card-text">{{ $totalProdutos }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Valor em Estoque</h5>
                <h2 class="card-text">R$ {{ number_format($valorTotalEstoque, 2, ',', '.') }}</h2>
            </div>
        </div>
    </div>
</div>

<!-- Seção de Ações Rápidas -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Ações Rápidas</h5>
            </div>
            <div class="card-body">
                <div class="d-flex gap-3">
                    <a href="/clientes/create" class="btn btn-primary">Adicionar Cliente</a>
                    @can('admin')
                    <a href="/produtos/create" class="btn btn-success">Adicionar Produto</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Últimos Clientes Cadastrados -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Últimos Clientes</h5>
            </div>
            <div class="card-body">
                @if($ultimosClientes->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Data Cadastro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ultimosClientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td>{{ $cliente->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p>Nenhum cliente cadastrado ainda.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection