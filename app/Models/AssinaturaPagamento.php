<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssinaturaPagamento extends Model
{
    use HasFactory;

    protected $table = 'assinatura_pagamentos';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'assinatura_id',
        'igreja_id',
        'valor',
        'metodo_pagamento',
        'referencia',
        'status',
        'data_pagamento',
    ];

    protected $casts = [
        'valor'         => 'decimal:2',
        'data_pagamento'=> 'datetime',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    // 🔗 RELACIONAMENTOS
    public function assinatura(): BelongsTo
    {
        return $this->belongsTo(AssinaturaHistorico::class, 'assinatura_id');
    }

    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }

    public function falhas(): HasMany
    {
        return $this->hasMany(AssinaturaPagamentoFalha::class, 'pagamento_id');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(AssinaturaLog::class, 'pagamento_id');
    }

    public function isConfirmed(): bool
    {
        return $this->status === 'confirmado';
    }

    public function isPending(): bool
    {
        return $this->status === 'pendente';
    }

    public function isFailed(): bool
    {
        return $this->status === 'falhou';
    }

    public function getFormattedValue(): string
    {
        return 'Kz ' . number_format($this->valor, 2, ',', '.');
    }
}
