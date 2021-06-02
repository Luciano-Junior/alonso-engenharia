<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Proposta extends Model
{
    protected $fillable = [
        'cliente_id',
        'endereco_obra',
        'valor_total',
        'sinal',
        'quantidade_parcelas',
        'valor_parcelas',
        'inicio_pagamento',
        'data_parcelas',
        'arquivo',
        'status',
        'data_proposta'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
