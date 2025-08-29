<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ministerio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ministerios';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'igreja_id',
        'nome',
        'descricao',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    // 🔗 RELACIONAMENTOS
    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }
    public function membros()
    {
        return $this->belongsToMany(IgrejaMembro::class, 'igreja_membros_ministerios', 'ministerio_id', 'membro_id')
                    ->using(IgrejaMembroMinisterio::class)
                    ->withPivot('funcao')
                    ->withTimestamps();
    }

}
