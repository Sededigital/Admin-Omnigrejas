<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IgrejaMembro extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'igreja_membros';
    protected $primaryKey = 'id';
    public $incrementing = false;  // UUID
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'igreja_id',
        'user_id',
        'cargo',
        'status',
        'data_entrada',
        'numero_membro',
        'principal',
        'created_by',
    ];

    protected $casts = [
        'data_entrada' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // 🔗 RELACIONAMENTOS
    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function criador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function ministerios()
    {
        return $this->belongsToMany(Ministerio::class, 'igreja_membros_ministerios', 'membro_id', 'ministerio_id')
                    ->using(IgrejaMembroMinisterio::class)
                    ->withPivot('funcao')
                    ->withTimestamps();
    }

    // Helpers para cargo
    public function isPastor(): bool
    {
        return $this->cargo === 'pastor';
    }

    public function isAdmin(): bool
    {
        return $this->cargo === 'admin';
    }

    public function isMinistro(): bool
    {
        return $this->cargo === 'ministro';
    }

    public function isObreiro(): bool
    {
        return $this->cargo === 'obreiro';
    }

    public function isDiacono(): bool
    {
        return $this->cargo === 'diacono';
    }

    public function isMembro(): bool
    {
        return $this->cargo === 'membro';
    }

    // Helpers para status
    public function isAtivo(): bool
    {
        return $this->status === 'ativo';
    }

    public function isInativo(): bool
    {
        return $this->status === 'inativo';
    }

    public function isPrincipal(): bool
    {
        return $this->principal === true;
    }

}