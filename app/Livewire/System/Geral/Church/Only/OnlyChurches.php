<?php

namespace App\Livewire\System\Geral\Church\Only;

use App\Models\Igreja;
use App\Models\IgrejaMembro;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OnlyChurches extends Component
{
    use WithPagination, WithFileUploads;

    // Propriedades para filtros e busca
    public $search = '';
    public $statusFilter = '';
    public $orderBy = 'nome';
    public $orderDirection = 'asc';
    public $perPage = 12;

    // Propriedades para métricas
    public $totalIgrejas = 0;
    public $igrejasNovas = 0;
    public $igrejasAtivas = 0;
    public $igrejasInativas = 0;

    // Propriedades para o modal de cadastro/edição
    public $showModal = false;
    public $editingIgrejaId = null;
    public $isEditing = false;

    // Campos do formulário
    public $nome = '';
    public $nif = '';
    public $sigla = '';
    public $descricao = '';
    public $sobre = '';
    public $contacto = '';
    public $localizacao = '';
    public $logo = null;
    public $status_aprovacao = 'pendente';
    public $sede_id = null;
    public $tipo = 'independente';
    public $designacao = '';

    // Lista de sedes para o select
    public $sedes = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'statusFilter' => ['except' => ''],
        'orderBy' => ['except' => 'nome'],
        'orderDirection' => ['except' => 'asc'],
    ];

    protected $rules = [
        'nome' => 'required|string|max:255',
        'nif' => 'required|string|max:50|unique:igrejas,nif',
        'sigla' => 'nullable|string|max:20',
        'descricao' => 'nullable|string',
        'sobre' => 'nullable|string',
        'contacto' => 'required|string|max:255',
        'localizacao' => 'required|string',
        'logo' => 'nullable|image|max:2048', // 2MB max
        'status_aprovacao' => 'required|in:pendente,aprovado,rejeitado',
        'sede_id' => 'nullable|exists:igrejas,id',
        'tipo' => 'required|in:independente,sede,filial',
        'designacao' => 'nullable|string|max:255',
    ];

    public function mount()
    {
        $this->carregarMetricas();
        $this->carregarSedes();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->orderBy === $field) {
            $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->orderBy = $field;
            $this->orderDirection = 'asc';
        }
        $this->resetPage();
    }

    public function carregarMetricas()
    {
        // Total de igrejas
        $this->totalIgrejas = Igreja::count();

        // Igrejas novas este mês
        $this->igrejasNovas = Igreja::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Igrejas ativas (aprovadas)
        $this->igrejasAtivas = Igreja::where('status_aprovacao', 'aprovado')->count();

        // Igrejas inativas (pendentes ou rejeitadas)
        $this->igrejasInativas = Igreja::whereIn('status_aprovacao', ['pendente', 'rejeitado'])->count();
    }

    public function carregarSedes()
    {
        $this->sedes = Igreja::where('tipo', 'sede')
            ->where('status_aprovacao', 'aprovado')
            ->orderBy('nome')
            ->get();
    }

    public function openModal()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->dispatch('open-church-modal');
    }

    #[On('modal-opened')]
    public function modalOpened()
    {
        $this->showModal = true;
    }

    public function editIgreja($igrejaId)
    {
        $igreja = Igreja::findOrFail($igrejaId);

        $this->editingIgrejaId = $igrejaId;
        $this->isEditing = true;

        // Preencher os campos com os dados da igreja
        $this->nome = $igreja->nome;
        $this->nif = $igreja->nif;
        $this->sigla = $igreja->sigla;
        $this->descricao = $igreja->descricao;
        $this->sobre = $igreja->sobre;
        $this->contacto = $igreja->contacto;
        $this->localizacao = $igreja->localizacao;
        $this->status_aprovacao = $igreja->status_aprovacao;
        $this->sede_id = $igreja->sede_id;
        $this->tipo = $igreja->tipo;
        $this->designacao = $igreja->designacao;

        $this->dispatch('open-church-modal');
    }

    #[On('modal-closed')]
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->editingIgrejaId = null;
        $this->isEditing = false;
        $this->nome = '';
        $this->nif = '';
        $this->sigla = '';
        $this->descricao = '';
        $this->sobre = '';
        $this->contacto = '';
        $this->localizacao = '';
        $this->logo = null;
        $this->status_aprovacao = 'pendente';
        $this->sede_id = null;
        $this->tipo = 'independente';
        $this->designacao = '';
        $this->resetErrorBag();
    }

    public function toggleSedeField()
    {
        if ($this->tipo !== 'filial') {
            $this->sede_id = null;
        }
    }

    public function updatedTipo()
    {
       
        $this->toggleSedeField();
    }

    public function saveChurch()
    {
        // Validação personalizada para NIF único (excluindo o registro atual na edição)
        $rules = $this->rules;
        if ($this->isEditing && $this->editingIgrejaId) {
            $rules['nif'] = 'required|string|max:50|unique:igrejas,nif,' . $this->editingIgrejaId;
        }

        $this->validate($rules);

        try {
            $data = [
                'nome' => $this->nome,
                'nif' => $this->nif,
                'sigla' => $this->sigla ? strtoupper($this->sigla) : null,
                'descricao' => $this->descricao,
                'sobre' => $this->sobre,
                'contacto' => $this->contacto,
                'localizacao' => $this->localizacao,
                'status_aprovacao' => $this->status_aprovacao,
                'sede_id' => $this->tipo === 'filial' ? $this->sede_id : null,
                'tipo' => $this->tipo,
                'designacao' => $this->designacao,
                'created_by' => Auth::id(),
            ];

            // Upload da logo se fornecida
            if ($this->logo) {
                $logoPath = $this->logo->store('igrejas/logos', 'public');
                $data['logo'] = $logoPath;
            }

            if ($this->isEditing) {
                // Atualizar igreja existente
                $igreja = Igreja::findOrFail($this->editingIgrejaId);

                // Se há nova logo, deletar a antiga
                if ($this->logo && $igreja->logo) {
                    Storage::disk('public')->delete($igreja->logo);
                }

                $igreja->update($data);

                $this->dispatch('toast', [
                    'type' => 'success',
                    'message' => 'Igreja atualizada com sucesso!'
                ]);
            } else {
                // Criar nova igreja
                Igreja::create($data);

                $this->dispatch('toast', [
                    'type' => 'success',
                    'message' => 'Igreja cadastrada com sucesso!'
                ]);
            }

            // Recarregar métricas e fechar modal
            $this->carregarMetricas();
            $this->dispatch('close-church-modal');
            $this->resetPage();

        } catch (\Exception $e) {
            $this->dispatch('toast', [
                'type' => 'error',
                'message' => 'Erro ao salvar igreja: ' . $e->getMessage()
            ]);
        }
    }

    public function deleteIgreja($igrejaId)
    {
        try {

            $igreja = Igreja::findOrFail($igrejaId);

            // Verificar se a igreja tem filiais
            if ($igreja->filiais()->count() > 0) {
                $this->dispatch('toast', [
                    'type' => 'error',
                    'message' => 'Não é possível excluir uma igreja que possui filiais.'
                ]);
                return;
            }

            // Deletar logo se existir
            if ($igreja->logo) {
                Storage::disk('public')->delete($igreja->logo);
            }

            $igreja->delete();

            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Igreja excluída com sucesso!'
            ]);

            $this->carregarMetricas();
            $this->resetPage();

        } catch (\Exception $e) {
            $this->dispatch('toast', [
                'type' => 'error',
                'message' => 'Erro ao excluir igreja: ' . $e->getMessage()
            ]);
        }
    }

    public function getIgrejasProperty()
    {
        $query = Igreja::with(['membros.user', 'criador', 'assinaturaAtual', 'sede'])
            ->withCount('membros');

        // Aplicar filtro de busca
        if ($this->search) {
            $query->where(function($q) {
                $q->where('nome', 'ilike', '%' . $this->search . '%')
                  ->orWhere('nif', 'ilike', '%' . $this->search . '%')
                  ->orWhere('localizacao', 'ilike', '%' . $this->search . '%')
                  ->orWhere('contacto', 'ilike', '%' . $this->search . '%');
            });
        }

        // Aplicar filtro de status
        if ($this->statusFilter) {
            if ($this->statusFilter === 'ativa') {
                $query->where('status_aprovacao', 'aprovado');
            } elseif ($this->statusFilter === 'inativa') {
                $query->whereIn('status_aprovacao', ['pendente', 'rejeitado']);
            }
        }

        // Aplicar ordenação
        if ($this->orderBy === 'membros') {
            $query->orderBy('membros_count', $this->orderDirection);
        } elseif ($this->orderBy === 'data') {
            $query->orderBy('created_at', $this->orderDirection);
        } else {
            $query->orderBy($this->orderBy, $this->orderDirection);
        }

        return $query->paginate($this->perPage);
    }

    public function getPastorPrincipal($igreja)
    {
        $pastor = $igreja->membros()
            ->whereIn('cargo', ['admin', 'pastor'])
            ->with('user')
            ->first();

        return $pastor ? $pastor->user : null;
    }

    public function getIgrejasRecentesProperty()
    {
        return Igreja::orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
    }

    public function getMaioresCongregacoesProperty()
    {
        return Igreja::withCount('membros')
            ->orderBy('membros_count', 'desc')
            ->limit(4)
            ->get();
    }

    public function getStatusBadgeClass($status)
    {
        return match($status) {
            'aprovado' => 'bg-success',
            'pendente' => 'bg-warning',
            'rejeitado' => 'bg-danger',
            default => 'bg-secondary'
        };
    }

    public function getStatusText($status)
    {
        return match($status) {
            'aprovado' => 'Ativa',
            'pendente' => 'Pendente',
            'rejeitado' => 'Rejeitada',
            default => 'Indefinido'
        };
    }

    public function getIniciais($nome)
    {
        $palavras = explode(' ', $nome);
        if (count($palavras) >= 2) {
            return strtoupper(substr($palavras[0], 0, 1) . substr($palavras[1], 0, 1));
        }
        return strtoupper(substr($nome, 0, 2));
    }

    public function getCorAvatar($index)
    {
        $cores = ['bg-primary', 'bg-info', 'bg-warning', 'bg-success', 'bg-danger', 'bg-secondary'];
        return $cores[$index % count($cores)];
    }

    public function render()
    {
        return view('system.geral.church.only.only-churches', [
            'igrejas' => $this->igrejas,
            'igrejasRecentes' => $this->igrejasRecentes,
            'maioresCongregacoes' => $this->maioresCongregacoes,
        ]);
    }
}
