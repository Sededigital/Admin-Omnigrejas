<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CursoMatricula extends Model
{
    use HasFactory;

    protected $table = 'curso_matriculas';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'curso_id',
        'membro_id',
        'status',
    ];

    // 🔗 RELACIONAMENTOS
    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function membro(): BelongsTo
    {
        return $this->belongsTo(IgrejaMembro::class, 'membro_id');
    }

    public function progresso(): HasMany
    {
        return $this->hasMany(CursoProgresso::class, 'matricula_id');
    }
}
