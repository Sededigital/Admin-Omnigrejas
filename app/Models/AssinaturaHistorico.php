<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function pagamentos(): HasMany
    {
        return $this->hasMany(AssinaturaPagamento::class, 'assinatura_id');
    }

    public function ciclos(): HasMany
    {
        return $this->hasMany(AssinaturaCiclo::class, 'assinatura_id');
    }

    public function cuponsUsados(): HasMany
    {
        return $this->hasMany(AssinaturaCupomUso::class, 'assinatura_id');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(AssinaturaLog::class, 'assinatura_id');
    }

    public function getDuracaoMeses(): int
    {
        return $this->data_inicio->diffInMonths($this->data_fim);
    }

    public function getValorMensal(): float
    {
        $duracao = $this->getDuracaoMeses();
        return $duracao > 0 ? $this->valor / $duracao : $this->valor;
    }
}
