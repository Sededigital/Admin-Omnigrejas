<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssinaturaHistorico extends Model
{
    use HasFactory;

    protected $table = 'assinatura_historico';
    protected $primaryKey = 'id';

    protected $fillable = [
        'igreja_id',
        'pacote_id',
        'data_inicio',
        'data_fim',
        'valor',
        'status',
        'forma_pagamento',
        'transacao_id',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim'    => 'date',
        'valor'       => 'decimal:2',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    // 🔗 RELACIONAMENTOS
    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }

    public function pacote(): BelongsTo
    {
        return $this->belongsTo(Pacote::class, 'pacote_id');
    }
}
