<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PedidoOracao extends Model
{
    use HasFactory;

    protected $table = 'pedidos_oracao';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'igreja_id',
        'membro_id',
        'pedido',
        'atendido',
        'data_pedido',
    ];

    protected $casts = [
        'atendido' => 'boolean',
        'data_pedido' => 'datetime',
    ];

    // 🔗 RELACIONAMENTOS
    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }

    public function membro(): BelongsTo
    {
        return $this->belongsTo(IgrejaMembro::class, 'membro_id');
    }
}
