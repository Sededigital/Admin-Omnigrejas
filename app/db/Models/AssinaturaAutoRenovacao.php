<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssinaturaAutoRenovacao extends Model
{
    protected $table = 'assinatura_auto_renovacao';
    protected $primaryKey = 'igreja_id';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'igreja_id',
        'ativo',
        'metodo_pagamento_id',
        'ultima_tentativa',
        'proxima_tentativa',
    ];

    protected $casts = [
        'ativo'            => 'boolean',
        'ultima_tentativa' => 'datetime',
        'proxima_tentativa'=> 'datetime',
    ];

    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }

    public function metodoPagamento(): BelongsTo
    {
        return $this->belongsTo(IgrejaMetodoPagamento::class, 'metodo_pagamento_id');
    }
}
