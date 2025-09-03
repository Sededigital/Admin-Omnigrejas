<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IgrejaMetodoPagamento extends Model
{
    protected $table = 'igrejas_metodos_pagamento';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'igreja_id',
        'tipo',
        'detalhes',
        'ativo',
        'criado_em',
    ];

    protected $casts = [
        'detalhes'  => 'array',
        'ativo'     => 'boolean',
        'criado_em' => 'datetime',
    ];

    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }
}
