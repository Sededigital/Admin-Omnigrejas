<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    public $incrementing = true; // BIGSERIAL
    protected $keyType = 'int';

    protected $fillable = [
        'igreja_id',
        'author_id',
        'titulo',
        'content',
        'media_url',
        'media_type',
        'is_video',
    ];

    protected $casts = [
        'is_video' => 'boolean',
    ];

    // 🔗 RELACIONAMENTOS
    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'igreja_id');
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function reactions()
    {
        return $this->hasMany(PostReaction::class, 'post_id');
    }

}
