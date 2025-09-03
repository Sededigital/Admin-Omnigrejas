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
    public $timestamps = false;

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

}
