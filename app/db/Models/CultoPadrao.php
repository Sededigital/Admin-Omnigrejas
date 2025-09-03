<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CultoPadrao extends Model
{
    use HasFactory;

    protected $table = 'cultos_padrao';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';
    public $timestamps = false; // usa created_em e deleted_at

    protected $fillable = [
        'igreja_id',
        'dia_semana',
        'hora_inicio',
        'hora_fim',
        'titulo',
        'descricao',
        'ativo',
        'criado_em',
        'deleted_at'
    ];

    protected $casts = [
        'hora_inicio' => 'datetime:H:i',
        'hora_fim'    => 'datetime:H:i',
        'ativo'       => 'boolean',
        'criado_em'   => 'datetime',
        'deleted_at'  => 'datetime',
    ];

    // 🔗 RELACIONAMENTO
    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }
}
