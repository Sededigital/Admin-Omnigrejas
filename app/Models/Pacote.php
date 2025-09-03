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
        'preco_vitalicio',
        'duracao_meses',
        'trial_dias',
    ];

    protected $casts = [
        'preco'         => 'decimal:2',
        'preco_vitalicio' => 'decimal:2',
        'duracao_meses' => 'integer',
        'trial_dias'    => 'integer',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
        'deleted_at'    => 'datetime',
    ];

    // 🔗 RELACIONAMENTOS
    public function permissoes(): HasMany
    {
        return $this->hasMany(PacotePermissao::class, 'pacote_id');
    }

    public function assinaturasAtuais(): HasMany
    {
        return $this->hasMany(AssinaturaAtual::class, 'pacote_id');
    }

    public function assinaturasHistorico(): HasMany
    {
        return $this->hasMany(AssinaturaHistorico::class, 'pacote_id');
    }
}
