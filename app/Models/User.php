<?php

namespace App\Models;

use App\Traits\HasAuditoria;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes, HasAuditoria, TwoFactorAuthenticatable;

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

     protected $hidden = [
        'is_active' => 'boolean',
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }

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


    public function sendEmailVerificationNotification()
    {

        $this->notify(new VerifyEmailNotification);
    }

    // 🔗 RELACIONAMENTOS
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function membros(): HasMany
    {
        return $this->hasMany(IgrejaMembro::class, 'user_id');
    }

    public function postReactions(): HasMany
    {
        return $this->hasMany(PostReaction::class, 'user_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, 'user_id');
    }

    public function mensagensPrivadasEnviadas(): HasMany
    {
        return $this->hasMany(MensagemPrivada::class, 'remetente_id');
    }

    public function mensagensPrivadasRecebidas(): HasMany
    {
        return $this->hasMany(MensagemPrivada::class, 'destinatario_id');
    }

    public function notificacoes(): HasMany
    {
        return $this->hasMany(Notificacao::class, 'user_id');
    }

    public function agenda(): HasMany
    {
        return $this->hasMany(Agenda::class, 'user_id');
    }

    public function engajamentoPontos(): HasMany
    {
        return $this->hasMany(EngajamentoPonto::class, 'user_id');
    }

    public function engajamentoBadges(): HasMany
    {
        return $this->hasMany(EngajamentoBadge::class, 'user_id');
    }

    public function cursoMatriculas(): HasMany
    {
        return $this->hasMany(CursoMatricula::class, 'user_id');
    }

    public function cursoProgressos(): HasMany
    {
        return $this->hasMany(CursoProgresso::class, 'user_id');
    }

    public function agendamentosRecursos(): HasMany
    {
        return $this->hasMany(AgendamentoRecurso::class, 'user_id');
    }

    public function doacoesOnline(): HasMany
    {
        return $this->hasMany(DoacaoOnline::class, 'user_id');
    }

    public function voluntario(): HasOne
    {
        return $this->hasOne(Voluntario::class, 'user_id');
    }

    public function atendimentosPastorais(): HasMany
    {
        return $this->hasMany(AtendimentoPastoral::class, 'pastor_id');
    }

    public function pedidosOracao(): HasMany
    {
        return $this->hasMany(PedidoOracao::class, 'user_id');
    }

    public function marketplacePedidos(): HasMany
    {
        return $this->hasMany(MarketplacePedido::class, 'comprador_id');
    }

    public function marketplacePagamentos(): HasMany
    {
        return $this->hasMany(MarketplacePagamento::class, 'user_id');
    }

    public function auditoriaLogs(): HasMany
    {
        return $this->hasMany(AuditoriaLog::class, 'usuario_id');
    }

    public function assinaturaLogs(): HasMany
    {
        return $this->hasMany(AssinaturaLog::class, 'usuario_id');
    }

    public function financeiroMovimentos(): HasMany
    {
        return $this->hasMany(FinanceiroMovimento::class, 'responsavel_id');
    }

    public function financeiroAuditoria(): HasMany
    {
        return $this->hasMany(FinanceiroAuditoria::class, 'alterado_por');
    }

    public function igrejaChatMensagens(): HasMany
    {
        return $this->hasMany(IgrejaChatMensagem::class, 'autor_id');
    }

    public function igrejaChats(): HasMany
    {
        return $this->hasMany(IgrejaChat::class, 'criado_por');
    }

    public function comunicacoes(): HasMany
    {
        return $this->hasMany(Comunicacao::class, 'enviado_por');
    }

    public function recursos(): HasMany
    {
        return $this->hasMany(Recurso::class, 'user_id');
    }

    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class, 'responsavel');
    }

    public function escalas(): HasMany
    {
        return $this->hasMany(Escala::class, 'membro_id');
    }

    public function escalasAuto(): HasMany
    {
        return $this->hasMany(EscalaAuto::class, 'voluntario_id');
    }

    public function ministerios(): HasMany
    {
        return $this->hasMany(Ministerio::class, 'user_id');
    }

    public function habilidades(): HasMany
    {
        return $this->hasMany(HabilidadesMembro::class, 'user_id');
    }

    public function membroPerfil(): HasOne
    {
        return $this->hasOne(MembroPerfil::class, 'user_id');
    }

    public function igrejaMembrosMinisterios(): HasMany
    {
        return $this->hasMany(IgrejaMembrosMinisterio::class, 'membro_id');
    }

    public function igrejaMembrosHistorico(): HasMany
    {
        return $this->hasMany(IgrejaMembrosHistorico::class, 'user_id');
    }

    public function enqueteDenuncias(): HasMany
    {
        return $this->hasMany(EnqueteDenuncia::class, 'criado_por');
    }

    public function relatoriosCache(): HasMany
    {
        return $this->hasMany(RelatorioCache::class, 'user_id');
    }

    // 🔗 RELACIONAMENTOS ESPECIAIS
    public function igrejasPrincipais(): HasMany
    {
        return $this->membros()->where('principal', true);
    }

    public function igrejasAtivas(): HasMany
    {
        return $this->membros()->where('status', 'ativo');
    }

    public function igrejasPastor(): HasMany
    {
        return $this->membros()->where('cargo', 'pastor');
    }

    public function igrejasAdmin(): HasMany
    {
        return $this->membros()->where('cargo', 'admin');
    }

    public function igrejasMinistro(): HasMany
    {
        return $this->membros()->where('cargo', 'ministro');
    }

    public function igrejasObreiro(): HasMany
    {
        return $this->membros()->where('cargo', 'obreiro');
    }

    public function igrejasDiacono(): HasMany
    {
        return $this->membros()->where('cargo', 'diacono');
    }

    public function igrejasMembro(): HasMany
    {
        return $this->membros()->where('cargo', 'membro');
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

   public function redirectDashboardRoute(): string
    {
        if (! $this->hasVerifiedEmail()) {
            return 'verification.notice'; // rota para verificar email
        }

        if (! $this->two_factor_confirmed) { // ou como você identifica 2FA
            return 'two-factor.login'; // rota de desafio 2FA
        }

        return match($this->role) {
            'admin' => 'dashboard.administrative',
            'root'  => 'dashboard.root',
            'church' => 'dashboard.church',
            default => 'dashboard',
        };
    }

    // Exemplo de checagem de múltiplos roles
    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->role, $roles, true);
    }

}
