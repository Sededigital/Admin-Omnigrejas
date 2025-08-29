<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MembroPerfil extends Model
{
    use HasFactory;

    protected $table = 'membro_perfis';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'igreja_membro_id',
        'genero',
        'data_nascimento',
        'endereco',
        'observacoes',
        'created_by',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    // 🔗 RELACIONAMENTOS
    public function membro(): BelongsTo
    {
        return $this->belongsTo(IgrejaMembro::class, 'igreja_membro_id');
    }

    public function criador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
