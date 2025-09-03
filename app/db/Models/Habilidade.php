<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class HabilidadeMembro extends Pivot
{
    protected $table = 'habilidades_membros';
    public $incrementing = false;
    protected $primaryKey = null;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'membro_id',
        'habilidade',
        'nivel',
    ];

    // 🔗 RELACIONAMENTOS
    public function membro()
    {
        return $this->belongsTo(IgrejaMembro::class, 'membro_id');
    }
}
