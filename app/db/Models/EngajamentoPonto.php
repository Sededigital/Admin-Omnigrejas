<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EngajamentoPonto extends Model
{
    use HasFactory;

    protected $table = 'engajamento_pontos';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'igreja_id',
        'pontos',
        'motivo',
        'data',
    ];

    protected $casts = [
        'pontos' => 'integer',
        'data' => 'datetime',
    ];

    // 🔗 RELACIONAMENTOS
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }
}
