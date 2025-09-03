<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssinaturaCupomUso extends Model
{
    protected $table = 'assinatura_cupons_uso';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'assinatura_id',
        'cupom_id',
        'usado_em',
    ];

    protected $casts = [
        'usado_em' => 'datetime',
    ];

    public function assinatura(): BelongsTo
    {
        return $this->belongsTo(AssinaturaHistorico::class, 'assinatura_id');
    }

    public function cupom(): BelongsTo
    {
        return $this->belongsTo(AssinaturaCupom::class, 'cupom_id');
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
    public function getDataUsoFormatada(): string
    {
        return $this->usado_em->format('d/m/Y H:i');
    }

    public function getDataUsoRelativa(): string
    {
        return $this->usado_em->diffForHumans();
    }

    public function isUsoRecente(int $dias = 7): bool
    {
        return $this->usado_em->diffInDays(now()) <= $dias;
    }

    public function getDiasDesdeUso(): int
    {
        return $this->usado_em->diffInDays(now());
    }

    public function getValorDesconto(): float
    {
        if ($this->cupom->desconto_percentual) {
            return ($this->assinatura->valor * $this->cupom->desconto_percentual) / 100;
        }

        return $this->cupom->desconto_valor ?? 0;
    }

    public function getValorDescontoFormatado(): string
    {
        $valor = $this->getValorDesconto();
        return 'Kz ' . number_format($valor, 2, ',', '.');
    }
}
