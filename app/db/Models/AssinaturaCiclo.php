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
}
