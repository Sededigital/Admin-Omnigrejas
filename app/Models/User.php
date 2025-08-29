<?php

namespace App\Models;

use App\Traits\HasAuditoria;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasAuditoria;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = false;  // porque é UUID
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'photo_url',
        'role',
        'denomination',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'password'  => 'hashed',
    ];

      // ========================================
    // Constantes de Roles (igual ao ENUM do DB)
    // ========================================
    public const ROLE_ROOT       = 'root';
    public const ROLE_SUPERADMIN = 'super_admin';
    public const ROLE_ADMIN      = 'admin';       // igreja admin
    public const ROLE_PASTOR     = 'pastor';
    public const ROLE_MINISTRO   = 'ministro';
    public const ROLE_OBREIRO    = 'obreiro';
    public const ROLE_DIACONO    = 'diacono';
    public const ROLE_MEMBRO     = 'membro';
    public const ROLE_ANONYMOUS  = 'anonymous';

    // Array de todos os roles possíveis (para validação rápida)
    public const ROLES = [
        self::ROLE_ROOT,
        self::ROLE_SUPERADMIN,
        self::ROLE_ADMIN,
        self::ROLE_PASTOR,
        self::ROLE_MINISTRO,
        self::ROLE_OBREIRO,
        self::ROLE_DIACONO,
        self::ROLE_MEMBRO,
        self::ROLE_ANONYMOUS,
    ];


    // 🔗 RELACIONAMENTOS
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function membros()
    {
        return $this->hasMany(IgrejaMembro::class, 'user_id');
    }

    public function postReactions()
    {
        return $this->hasMany(PostReaction::class, 'user_id');
    }



    // ========================================
    // Helpers para checagem rápida
    // ========================================
    public function isRoot(): bool
    {
        return $this->role === self::ROLE_ROOT;
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === self::ROLE_SUPERADMIN;
    }

    public function isIgrejaAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isAnonymous(): bool
    {
        return $this->role === self::ROLE_ANONYMOUS;
    }

    // Exemplo de checagem de múltiplos roles
    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->role, $roles, true);
    }

}
