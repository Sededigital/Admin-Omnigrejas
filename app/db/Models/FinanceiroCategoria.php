<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FinanceiroCategoria extends Model
{
    use HasFactory;

    protected $table = 'financeiro_categorias';
    protected $primaryKey = 'id';
    public $incrementing = true; // BIGSERIAL
    protected $keyType = 'int';

    protected $fillable = [
        'igreja_id',
        'nome',
        'tipo',
    ];

    // 🔗 RELACIONAMENTOS
    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }

    public function movimentos(): HasMany
    {
        return $this->hasMany(FinanceiroMovimento::class, 'categoria_id');
    }
}
