<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IgrejaAssinada extends Model
{
    protected $table = 'igrejas_assinadas';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'igreja_id',
        'pacote_id',
        'ativo',
        'data_adesao',
        'data_cancelamento',
        'observacoes',
    ];

    protected $casts = [
        'ativo'            => 'boolean',
        'data_adesao'      => 'datetime',
        'data_cancelamento'=> 'datetime',
        'created_at'       => 'datetime',
        'updated_at'       => 'datetime',
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
}
