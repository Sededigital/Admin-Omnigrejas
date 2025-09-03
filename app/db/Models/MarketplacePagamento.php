<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MarketplacePagamento extends Model
{
    use HasFactory;

    protected $table = 'marketplace_pagamentos';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';
    public $timestamps = false; // só tem data_pagamento

    protected $fillable = [
        'pedido_id',
        'metodo',
        'valor',
        'referencia',
        'status',
        'data_pagamento',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'data_pagamento' => 'datetime',
    ];

    // 🔗 RELACIONAMENTOS
    public function pedido(): BelongsTo
    {
        return $this->belongsTo(MarketplacePedido::class, 'pedido_id');
    }
}
