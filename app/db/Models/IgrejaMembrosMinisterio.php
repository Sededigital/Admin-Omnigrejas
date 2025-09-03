<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class IgrejaMembroMinisterio extends Pivot
{
    use SoftDeletes;

    protected $table = 'igreja_membros_ministerios';
    public $incrementing = false; // chave primária composta
    protected $primaryKey = null;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'membro_id',
        'ministerio_id',
        'funcao',
    ];

    protected $dates = [
        'created_at',
        'deleted_at',
    ];
}
