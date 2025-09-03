<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IgrejaMembrosHistorico extends Model
{
    use HasFactory;

    protected $table = 'igreja_membros_historico';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'igreja_membro_id',
        'cargo',
        'inicio',
        'fim',
    ];

    protected $casts = [
        'inicio' => 'date',
        'fim'    => 'date',
    ];

    // 🔗 RELACIONAMENTOS
    public function membro(): BelongsTo
    {
        return $this->belongsTo(IgrejaMembro::class, 'igreja_membro_id');
    }
}
