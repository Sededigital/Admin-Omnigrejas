<?php

namespace App\Models;

use App\Traits\HasAuditoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function criador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assinaturaAtual()
    {
        return $this->hasOne(\App\Models\AssinaturaAtual::class, 'igreja_id');
    }

    public function assinaturasHistorico(): HasMany
    {
        return $this->hasMany(\App\Models\AssinaturaHistorico::class, 'igreja_id');
    }

    public function pagamentos(): HasMany
    {
        return $this->hasMany(\App\Models\AssinaturaPagamento::class, 'igreja_id');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(\App\Models\AssinaturaLog::class, 'igreja_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(\App\Models\Post::class, 'igreja_id');
    }

    public function eventos(): HasMany
    {
        return $this->hasMany(\App\Models\Evento::class, 'igreja_id');
    }

    public function financeiroMovimentos(): HasMany
    {
        return $this->hasMany(\App\Models\FinanceiroMovimento::class, 'igreja_id');
    }

    public function ministerios(): HasMany
    {
        return $this->hasMany(\App\Models\Ministerio::class, 'igreja_id');
    }

    public function comunicacoes(): HasMany
    {
        return $this->hasMany(\App\Models\Comunicacao::class, 'igreja_id');
    }

    public function chats(): HasMany
    {
        return $this->hasMany(\App\Models\IgrejaChat::class, 'igreja_id');
    }

    public function recursos(): HasMany
    {
        return $this->hasMany(\App\Models\Recurso::class, 'igreja_id');
    }

    public function cursos(): HasMany
    {
        return $this->hasMany(\App\Models\Curso::class, 'igreja_id');
    }

    public function doacoesOnline(): HasMany
    {
        return $this->hasMany(\App\Models\DoacaoOnline::class, 'igreja_id');
    }

    public function atendimentosPastorais(): HasMany
    {
        return $this->hasMany(\App\Models\AtendimentoPastoral::class, 'igreja_id');
    }

    public function pedidosOracao(): HasMany
    {
        return $this->hasMany(\App\Models\PedidoOracao::class, 'igreja_id');
    }

    public function marketplaceProdutos(): HasMany
    {
        return $this->hasMany(\App\Models\MarketplaceProduto::class, 'igreja_id');
    }

    public function engajamentoPontos(): HasMany
    {
        return $this->hasMany(\App\Models\EngajamentoPonto::class, 'igreja_id');
    }

    public function engajamentoBadges(): HasMany
    {
        return $this->hasMany(\App\Models\EngajamentoBadge::class, 'igreja_id');
    }

    // Helpers para status
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

}