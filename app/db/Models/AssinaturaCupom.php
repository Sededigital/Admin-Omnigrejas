<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssinaturaCupom extends Model
{
    protected $table = 'assinatura_cupons';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'descricao',
        'desconto_percentual',
        'desconto_valor',
        'valido_de',
        'valido_ate',
        'uso_max',
        'usado',
        'ativo',
        'criado_em',
    ];

    protected $casts = [
        'desconto_valor'     => 'decimal:2',
        'valido_de'          => 'date',
        'valido_ate'         => 'date',
        'ativo'              => 'boolean',
        'criado_em'          => 'datetime',
    ];

     public function usos()
    {
        return $this->hasMany(AssinaturaCupomUso::class, 'cupom_id');
    }
}
