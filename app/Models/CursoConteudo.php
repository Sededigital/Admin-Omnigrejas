<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CursoConteudo extends Model
{
    use HasFactory;

    protected $table = 'curso_conteudos';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'curso_id',
        'titulo',
        'tipo',
        'url',
        'ordem',
    ];

    // 🔗 RELACIONAMENTOS
    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
