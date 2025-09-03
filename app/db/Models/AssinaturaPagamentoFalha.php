<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssinaturaPagamentoFalha extends Model
{
    protected $table = 'assinatura_pagamentos_falhas';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'pagamento_id',
        'igreja_id',
        'motivo',
        'data',
        'resolvido',
    ];

    protected $casts = [
        'data'      => 'datetime',
        'resolvido' => 'boolean',
    ];

    public function pagamento(): BelongsTo
    {
        return $this->belongsTo(AssinaturaPagamento::class, 'pagamento_id');
    }

    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }
}
