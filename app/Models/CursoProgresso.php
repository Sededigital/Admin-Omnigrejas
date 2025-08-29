<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CursoProgresso extends Model
{
    use HasFactory;

    protected $table = 'curso_progresso';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'matricula_id',
        'conteudo_id',
        'concluido',
        'data_conclusao',
    ];

    protected $casts = [
        'concluido' => 'boolean',
        'data_conclusao' => 'datetime',
    ];

    // 🔗 RELACIONAMENTOS
    public function matricula(): BelongsTo
    {
        return $this->belongsTo(CursoMatricula::class, 'matricula_id');
    }

    public function conteudo(): BelongsTo
    {
        return $this->belongsTo(CursoConteudo::class, 'conteudo_id');
    }
}
