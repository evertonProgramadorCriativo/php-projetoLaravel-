@extends('layouts.app')

@section('title', 'Bem-vindo')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto text-center mb-5">
        <h1 class="display-4">Sistema de Gestão de Vendas</h1>
        <p class="lead">Gerencie seus clientes, produtos e vendas de forma eficiente</p>
        
        @guest
        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Login</a>
        </div>
        @endguest
    </div>
</div>

<div class="row">
    <!-- Card de Clientes -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Nossos Clientes</h5>
            </div>
            <div class="card-body">
                @if($clientes->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clientes->take(5) as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p>Nenhum cliente cadastrado ainda.</p>
                @endif
                @auth
                <a href="/clientes" class="btn btn-outline-primary mt-3">Ver todos</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Card de Produtos -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Nossos Produtos</h5>
            </div>
            <div class="card-body">
                @if($produtos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos->take(5) as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p>Nenhum produto cadastrado ainda.</p>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h5>Nova Venda</h5>
    </div>
    <div class="card-body">
        <form id="formVenda">
            <!-- Seleção de Cliente -->
            <div class="mb-3">
                <label class="form-label">Cliente (Opcional)</label>
                <input type="text" class="form-control" id="buscaCliente" placeholder="Digite para buscar...">
                <div id="resultadosClientes" class="mt-2"></div>
            </div>
            
            <!-- Seleção de Produtos -->
            <div class="mb-3">
                <label class="form-label">Produtos</label>
                <select class="form-select" id="selectProduto">
                    @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}" data-preco="{{ $produto->preco }}">
                        {{ $produto->nome }} - R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-sm btn-primary mt-2" id="btnAddProduto">Adicionar</button>
            </div>
            
            <!-- Lista de Produtos Selecionados -->
            <table class="table" id="tabelaProdutos">
                <!-- Conteúdo dinâmico via JS -->
            </table>
            
            <!-- Total e Parcelamento -->
            <div class="row">
                <div class="col-md-6">
                    <h5>Total: R$ <span id="totalVenda">0,00</span></h5>
                </div>
                <div class="col-md-6">
                    <label>Parcelamento:</label>
                    <select class="form-select" id="parcelamento">
                        <option value="1">À vista</option>
                        @for($i=2; $i<=12; $i++)
                        <option value="{{ $i }}">{{ $i }}x</option>
                        @endfor
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-success mt-3">Finalizar Venda</button>
        </form>
    </div>
</div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Estatísticas</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4">
                        <h3>{{ $totalClientes }}</h3>
                        <p class="text-muted">Clientes</p>
                    </div>
                    <div class="col-md-4">
                        <h3>{{ $totalProdutos }}</h3>
                        <p class="text-muted">Produtos</p>
                    </div>
                    <div class="col-md-4">
                        <h3>R$ {{ number_format($valorTotalEstoque, 2, ',', '.') }}</h3>
                        <p class="text-muted">Valor em Estoque</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection