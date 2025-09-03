<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AssinaturaAtual extends Model
{
    protected $table = 'assinatura_atual';
    protected $primaryKey = 'igreja_id';
    public $incrementing = false; // chave primária é FK
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'igreja_id',
        'pacote_id',
        'data_inicio',
        'data_fim',
        'status',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim'    => 'date',
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
        return $this->hasMany(AssinaturaPagamento::class, 'igreja_id', 'igreja_id');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(AssinaturaLog::class, 'igreja_id', 'igreja_id');
    }

    public function ciclos(): HasMany
    {
        return $this->hasMany(AssinaturaCiclo::class, 'assinatura_id');
    }

    public function autoRenovacao(): HasOne
    {
        return $this->hasOne(AssinaturaAutoRenovacao::class, 'igreja_id', 'igreja_id');
    }

    public function pagamentosFalha(): HasMany
    {
        return $this->hasMany(AssinaturaPagamentoFalha::class, 'igreja_id', 'igreja_id');
    }

    public function isExpired(): bool
    {
        return $this->data_fim && $this->data_fim->isPast();
    }

    public function isExpiringSoon(int $days = 30): bool
    {
        return $this->data_fim && $this->data_fim->diffInDays(now()) <= $days;
    }

    public function getDaysUntilExpiration(): int
    {
        return $this->data_fim ? $this->data_fim->diffInDays(now()) : 0;
    }

}
