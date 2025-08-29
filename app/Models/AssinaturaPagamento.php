<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
