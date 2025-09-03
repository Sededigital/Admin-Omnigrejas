<?php

namespace App\Models;

use App\Traits\HasAuditoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Igreja extends Model
{
    use HasFactory, SoftDeletes, HasAuditoria;

    protected $table = 'igrejas';
    protected $primaryKey = 'id';
    public $incrementing = true;   // BIGSERIAL
    protected $keyType = 'int';

    protected $fillable = [
        'nome',
        'nif',
        'sigla',
        'descricao',
        'sobre',
        'contacto',
        'localizacao',
        'logo',
        'status_aprovacao',
        'sede_id',
        'tipo',
        'designacao',
        'created_by',
    ];

    // 🔗 RELACIONAMENTOS
    public function sede(): BelongsTo
    {
        return $this->belongsTo(Igreja::class, 'sede_id');
    }

    public function filiais(): HasMany
    {
        return $this->hasMany(Igreja::class, 'sede_id');
    }

    public function membros(): HasMany
    {
        return $this->hasMany(IgrejaMembro::class, 'igreja_id');
    }

    public function membrosMinisterios()
    {
        return $this->hasManyThrough(
            IgrejaMembroMinisterio::class,
            IgrejaMembro::class,
            'igreja_id', // Foreign key on IgrejaMembro table
            'membro_id', // Foreign key on IgrejaMembroMinisterio table
            'id', // Local key on Igreja table
            'id' // Local key on IgrejaMembro table
        );
    }

    public function criador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assinaturaAtual(): HasOne
    {
        return $this->hasOne(AssinaturaAtual::class, 'igreja_id');
    }

    public function assinaturasHistorico(): HasMany
    {
        return $this->hasMany(AssinaturaHistorico::class, 'igreja_id');
    }

    public function assinaturasPagamentos(): HasMany
    {
        return $this->hasMany(AssinaturaPagamento::class, 'igreja_id');
    }

    public function assinaturasLogs(): HasMany
    {
        return $this->hasMany(AssinaturaLog::class, 'igreja_id');
    }

    public function assinaturasCiclos(): HasMany
    {
        return $this->hasMany(AssinaturaCiclo::class, 'igreja_id');
    }

    public function assinaturasPagamentosFalha(): HasMany
    {
        return $this->hasMany(AssinaturaPagamentoFalha::class, 'igreja_id');
    }

    public function assinaturaAutoRenovacao(): HasOne
    {
        return $this->hasOne(AssinaturaAutoRenovacao::class, 'igreja_id');
    }

    public function assinaturaCupomUsos(): HasMany
    {
        return $this->hasMany(AssinaturaCupomUso::class, 'igreja_id');
    }

    public function igrejaAssinada(): HasOne
    {
        return $this->hasOne(IgrejaAssinada::class, 'igreja_id');
    }

    public function igrejaMetodosPagamento(): HasMany
    {
        return $this->hasMany(IgrejaMetodoPagamento::class, 'igreja_id');
    }

    public function financeiroCategorias(): HasMany
    {
        return $this->hasMany(FinanceiroCategoria::class, 'igreja_id');
    }

    public function financeiroMovimentos(): HasMany
    {
        return $this->hasMany(FinanceiroMovimento::class, 'igreja_id');
    }

    public function financeiroContas(): HasMany
    {
        return $this->hasMany(FinanceiroConta::class, 'igreja_id');
    }

    public function financeiroAuditoria(): HasMany
    {
        return $this->hasMany(FinanceiroAuditoria::class, 'igreja_id');
    }

    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class, 'igreja_id');
    }

    public function cultosPadrao(): HasMany
    {
        return $this->hasMany(CultoPadrao::class, 'igreja_id');
    }

    public function escalas(): HasMany
    {
        return $this->hasMany(Escala::class, 'igreja_id');
    }

    public function escalasAuto(): HasMany
    {
        return $this->hasMany(EscalaAuto::class, 'igreja_id');
    }

    public function ministerios(): HasMany
    {
        return $this->hasMany(Ministerio::class, 'igreja_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'igreja_id');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, 'igreja_id');
    }

    public function comunicacoes(): HasMany
    {
        return $this->hasMany(Comunicacao::class, 'igreja_id');
    }

    public function igrejaChats(): HasMany
    {
        return $this->hasMany(IgrejaChat::class, 'igreja_id');
    }

    public function notificacoes(): HasMany
    {
        return $this->hasMany(Notificacao::class, 'igreja_id');
    }

    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class, 'igreja_id');
    }

    public function recursos(): HasMany
    {
        return $this->hasMany(Recurso::class, 'igreja_id');
    }

    public function agendamentosRecursos(): HasMany
    {
        return $this->hasMany(AgendamentoRecurso::class, 'igreja_id');
    }

    public function doacoesOnline(): HasMany
    {
        return $this->hasMany(DoacaoOnline::class, 'igreja_id');
    }

    public function marketplaceProdutos(): HasMany
    {
        return $this->hasMany(MarketplaceProduto::class, 'igreja_id');
    }

    public function marketplacePedidos(): HasMany
    {
        return $this->hasMany(MarketplacePedido::class, 'igreja_id');
    }

    public function marketplacePagamentos(): HasMany
    {
        return $this->hasMany(MarketplacePagamento::class, 'igreja_id');
    }

    public function engajamentoPontos(): HasMany
    {
        return $this->hasMany(EngajamentoPonto::class, 'igreja_id');
    }

    public function engajamentoBadges(): HasMany
    {
        return $this->hasMany(EngajamentoBadge::class, 'igreja_id');
    }

    public function atendimentosPastorais(): HasMany
    {
        return $this->hasMany(AtendimentoPastoral::class, 'igreja_id');
    }

    public function pedidosOracao(): HasMany
    {
        return $this->hasMany(PedidoOracao::class, 'igreja_id');
    }

    public function voluntarios(): HasMany
    {
        return $this->hasMany(Voluntario::class, 'igreja_id');
    }

    public function enqueteDenuncias(): HasMany
    {
        return $this->hasMany(EnqueteDenuncia::class, 'igreja_id');
    }

    public function auditoriaLogs(): HasMany
    {
        return $this->hasMany(AuditoriaLog::class, 'igreja_id');
    }

    public function relatoriosCache(): HasMany
    {
        return $this->hasMany(RelatorioCache::class, 'igreja_id');
    }

    public function assinaturaNotificacoes(): HasMany
    {
        return $this->hasMany(AssinaturaNotificacao::class, 'igreja_id');
    }

    public function assinaturaUpgrades(): HasMany
    {
        return $this->hasMany(AssinaturaUpgrade::class, 'igreja_id');
    }

    // 🔗 RELACIONAMENTOS ESPECIAIS
    public function membrosAtivos(): HasMany
    {
        return $this->membros()->where('status', 'ativo');
    }

    public function membrosPastores(): HasMany
    {
        return $this->membros()->where('cargo', 'pastor');
    }

    public function membrosAdmins(): HasMany
    {
        return $this->membros()->where('cargo', 'admin');
    }

    public function assinaturaAtiva(): HasOne
    {
        return $this->assinaturaAtual()->where('status', 'Ativo');
    }

    public function assinaturaExpirada(): HasOne
    {
        return $this->assinaturaAtual()->where('status', 'Expirado');
    }

    public function assinaturaCancelada(): HasOne
    {
        return $this->assinaturaAtual()->where('status', 'Cancelado');
    }

    public function isSede(): bool
    {
        return $this->tipo === 'sede';
    }

    public function isFilial(): bool
    {
        return $this->tipo === 'filial';
    }

    public function isIndependente(): bool
    {
        return $this->tipo === 'independente';
    }

    public function isAprovada(): bool
    {
        return $this->status_aprovacao === 'aprovado';
    }

    public function isPendente(): bool
    {
        return $this->status_aprovacao === 'pendente';
    }

    public function isRejeitada(): bool
    {
        return $this->status_aprovacao === 'rejeitado';
    }
}
