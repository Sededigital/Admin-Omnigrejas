<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comunicacao extends Model
{
    use HasFactory;

    protected $table = 'comunicacoes';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'igreja_id',
        'titulo',
        'conteudo',
        'tipo',
        'destino',
        'data_envio',
        'enviado_por',
        'status',
    ];

    protected $casts = [
        'data_envio' => 'datetime',
    ];

    // 🔗 RELACIONAMENTOS
    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }

    public function remetente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'enviado_por');
    }
}
