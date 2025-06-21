<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
    'cliente_id', 'user_id', 'total', 'metodo_pagamento'
];

public function cliente() {
    return $this->belongsTo(Cliente::class);
}

public function itens() {
    return $this->hasMany(ItemVenda::class);
}

public function parcelas() {
    return $this->hasMany(Parcela::class);
}
}
