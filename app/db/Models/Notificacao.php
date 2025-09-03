<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notificacao extends Model
{
    use HasFactory;

    protected $table = 'notificacoes';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'tipo',
        'referencia_id',
        'titulo',
        'mensagem',
        'lida',
    ];

    protected $casts = [
        'lida' => 'boolean',
    ];

    // 🔗 RELACIONAMENTOS
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
