<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IgrejaChatMensagem extends Model
{
    use HasFactory;

    protected $table = 'igreja_chat_mensagens';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'chat_id',
        'autor_id',
        'conteudo',
        'lida_por',
    ];

    protected $casts = [
        'lida_por' => 'array',
    ];

    // 🔗 RELACIONAMENTOS
    public function chat(): BelongsTo
    {
        return $this->belongsTo(IgrejaChat::class, 'chat_id');
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'autor_id');
    }
}
