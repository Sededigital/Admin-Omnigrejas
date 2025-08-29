<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pacote extends Model
{
    use HasFactory;

    protected $table = 'pacote';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'duracao_meses',
    ];

    protected $casts = [
        'preco' => 'decimal:2',
        'duracao_meses' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // 🔗 RELACIONAMENTOS
    public function permissoes(): HasMany
    {
        return $this->hasMany(PacotePermissao::class, 'pacote_id');
    }
}
