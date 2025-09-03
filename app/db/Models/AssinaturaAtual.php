<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function isExpired(): bool
    {
        return $this->valid_until && $this->valid_until->isPast();
    }

}
