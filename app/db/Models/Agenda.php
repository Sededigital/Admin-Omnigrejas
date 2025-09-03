<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';
    public $timestamps = false; // só tem created_at

    protected $fillable = [
        'user_id',
        'evento_id',
        'lembrete',
        'status',
        'created_at',
    ];

    protected $casts = [
        'lembrete' => 'string', // INTERVAL precisa ser tratado como string no PHP
        'created_at' => 'datetime',
    ];

    // 🔗 RELACIONAMENTOS
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
