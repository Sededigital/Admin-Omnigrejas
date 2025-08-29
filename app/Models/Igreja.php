<?php

namespace App\Models;

use App\Traits\HasAuditoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Igreja extends Model
{
    use HasFactory, SoftDeletes, HasAuditoria;

    protected $table = 'igrejas';
    protected $primaryKey = 'id';
    public $incrementing = true;   // BIGSERIAL
    protected $keyType = 'int';

    protected $fillable = [
        'nome',
        'nif',
        'sigla',
        'descricao',
        'sobre',
        'contacto',
        'localizacao',
        'logo',
        'status_aprovacao',
        'sede_id',
        'tipo',
        'designacao',
        'created_by',
    ];

    // 🔗 RELACIONAMENTOS
    public function sede(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'sede_id');
    }

    public function filiais(): HasMany
    {
        return $this->hasMany(Igreja::class, 'sede_id');
    }

    public function membros(): HasMany
    {
        return $this->hasMany(IgrejaMembro::class, 'igreja_id');
    }

    public function criador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assinaturaAtual()
    {
        return $this->hasOne(\App\Models\AssinaturaAtual::class, 'igreja_id');
    }

}
