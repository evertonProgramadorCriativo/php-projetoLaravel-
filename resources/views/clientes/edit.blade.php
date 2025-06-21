@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">Nome*</label>
            <input type="text" name="nome" value="{{ old('nome', $cliente->nome) }}" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">CPF</label>
            <input type="text" name="cpf" value="{{ old('cpf', $cliente->cpf) }}" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $cliente->email) }}" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="telefone" value="{{ old('telefone', $cliente->telefone) }}" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Endereço</label>
            <textarea name="endereco" class="form-control">{{ old('endereco', $cliente->endereco) }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection