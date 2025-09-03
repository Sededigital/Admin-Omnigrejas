<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssinaturaCiclo extends Model
{
    protected $table = 'assinatura_ciclos';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'assinatura_id',
        'inicio',
        'fim',
        'valor',
        'status',
        'gerado_em',
    ];

    protected $casts = [
        'inicio'    => 'date',
        'fim'       => 'date',
        'valor'     => 'decimal:2',
        'gerado_em' => 'datetime',
    ];

    // 🔗 RELACIONAMENTO
    public function assinatura(): BelongsTo
    {
        return $this->belongsTo(AssinaturaHistorico::class, 'assinatura_id');
    }

    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }

    public function pacote(): BelongsTo
    {
        return $this->belongsTo(Pacote::class, 'pacote_id');
    }

    // 🔗 MÉTODOS DE CONVENIÊNCIA
    public function isPendente(): bool
    {
        return $this->status === 'pendente';
    }

    public function isPago(): bool
    {
        return $this->status === 'pago';
    }

    public function isAtrasado(): bool
    {
        return $this->status === 'atrasado';
    }

    public function isFalhou(): bool
    {
        return $this->status === 'falhou';
    }

    public function isVencido(): bool
    {
        return $this->fim && $this->fim->isPast();
    }

    public function isVencendoEm(int $dias): bool
    {
        return $this->fim && $this->fim->diffInDays(now()) <= $dias;
    }

    public function getDiasVencimento(): int
    {
        if (!$this->fim) {
            return 0;
        }

        return $this->fim->diffInDays(now());
    }

    public function getDuracaoDias(): int
    {
        if (!$this->inicio || !$this->fim) {
            return 0;
        }

        return $this->inicio->diffInDays($this->fim);
    }

    public function getValorFormatado(): string
    {
        return 'Kz ' . number_format($this->valor, 2, ',', '.');
    }

    public function getDataInicioFormatada(): string
    {
        return $this->inicio ? $this->inicio->format('d/m/Y') : 'N/A';
    }

    public function getDataFimFormatada(): string
    {
        return $this->fim ? $this->fim->format('d/m/Y') : 'N/A';
    }

    public function getStatusFormatado(): string
    {
        return match($this->status) {
            'pendente' => 'Pendente',
            'pago' => 'Pago',
            'atrasado' => 'Atrasado',
            'falhou' => 'Falhou',
            default => 'Desconhecido'
        };
    }

    public function getStatusClass(): string
    {
        return match($this->status) {
            'pendente' => 'warning',
            'pago' => 'success',
            'atrasado' => 'danger',
            'falhou' => 'danger',
            default => 'secondary'
        };
    }
}
