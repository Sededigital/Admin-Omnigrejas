<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MensagemPrivada extends Model
{
    use HasFactory;

    protected $table = 'mensagens_privadas';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';
    public $timestamps = false; // só tem created_at

    protected $fillable = [
        'remetente_id',
        'destinatario_id',
        'conteudo',
        'lida',
    ];

    protected $casts = [
        'lida' => 'boolean',
    ];

    // 🔗 RELACIONAMENTOS
    public function remetente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'remetente_id');
    }

    public function destinatario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'destinatario_id');
    }
}
