<?php

namespace App\Livewire\Church\Events;

use Livewire\Component;
use App\Models\CultoPadrao;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title('Gestão de Culto Padrão')]
#[Layout('components.layouts.app')]
class StandardCult extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    // Modal properties
    public $showModal = false;
    public $editingCult = null;
    public $titulo = '';
    public $dia_semana = '';
    public $hora_inicio = '';
    public $hora_fim = '';
    public $descricao = '';
    public $ativo = true;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'dia_semana' => 'required|integer|between:0,6',
        'hora_inicio' => 'required|date_format:H:i',
        'hora_fim' => 'nullable|date_format:H:i|after:hora_inicio',
        'descricao' => 'nullable|string|max:1000',
        'ativo' => 'boolean',
    ];

    protected $listeners = ['refreshCults' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function openModal($cultId = null)
    {
        try {
            if ($cultId) {
                $cult = CultoPadrao::find($cultId);
                if ($cult) {
                    $this->editingCult = $cult;
                    $this->titulo = $cult->titulo;
                    $this->dia_semana = $cult->dia_semana;
                    $this->hora_inicio = $cult->hora_inicio ? $cult->hora_inicio->format('H:i') : '';
                    $this->hora_fim = $cult->hora_fim ? $cult->hora_fim->format('H:i') : '';
                    $this->descricao = $cult->descricao;
                    $this->ativo = $cult->ativo;
                } else {
                    $this->dispatch('toast', [
                        'type' => 'danger',
                        'message' => 'Culto padrão não encontrado!'
                    ]);
                    return;
                }
            } else {
                $this->resetModal();
            }

            $this->showModal = true;
        } catch (\Exception $e) {
            $this->dispatch('toast', [
                'type' => 'danger',
                'message' => 'Erro ao abrir modal: ' . $e->getMessage()
            ]);
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetModal();
    }

    private function resetModal()
    {
        $this->editingCult = null;
        $this->titulo = '';
        $this->dia_semana = '';
        $this->hora_inicio = '';
        $this->hora_fim = '';
        $this->descricao = '';
        $this->ativo = true;
        $this->resetValidation();
    }

    public function saveCult()
    {
        $this->validate();

        try {
            // Obter a igreja do usuário logado
            $igreja = Auth::user()->igrejasAtivas()->first();

            if (!$igreja) {
                $this->dispatch('toast', [
                    'type' => 'danger',
                    'message' => 'Usuário não está associado a nenhuma Igreja ativa'
                ]);
                return;
            }

            $data = [
                'igreja_id' => $igreja->igreja_id,
                'titulo' => $this->titulo,
                'dia_semana' => $this->dia_semana,
                'hora_inicio' => $this->hora_inicio,
                'hora_fim' => $this->hora_fim ?: null,
                'descricao' => $this->descricao,
                'ativo' => $this->ativo,
            ];

            if ($this->editingCult) {
                $this->editingCult->update($data);
                $this->dispatch('toast', [
                    'type' => 'success',
                    'message' => 'Culto padrão atualizado com sucesso!'
                ]);
            } else {
                CultoPadrao::create($data);
                $this->dispatch('toast', [
                    'type' => 'success',
                    'message' => 'Culto padrão criado com sucesso!'
                ]);
            }

            $this->closeModal();
            $this->dispatch('refreshCults');

        } catch (\Exception $e) {
            $this->dispatch('toast', [
                'type' => 'danger',
                'message' => 'Erro ao salvar culto padrão: ' . $e->getMessage()
            ]);
        }
    }

    public function deleteCult($cultId)
    {
        try {
            $cult = CultoPadrao::find($cultId);
            if ($cult) {
                $cult->delete();
                $this->dispatch('toast', [
                    'type' => 'success',
                    'message' => 'Culto padrão excluído com sucesso!'
                ]);
                $this->dispatch('refreshCults');
            } else {
                $this->dispatch('toast', [
                    'type' => 'danger',
                    'message' => 'Culto padrão não encontrado!'
                ]);
            }
        } catch (\Exception $e) {
            $this->dispatch('toast', [
                'type' => 'danger',
                'message' => 'Erro ao excluir culto padrão: ' . $e->getMessage()
            ]);
        }
    }

    public function toggleCultStatus($cultId)
    {
        try {
            $cult = CultoPadrao::find($cultId);
            if ($cult) {
                $cult->update(['ativo' => !$cult->ativo]);
                $this->dispatch('toast', [
                    'type' => 'success',
                    'message' => 'Status do culto alterado com sucesso!'
                ]);
                $this->dispatch('refreshCults');
            } else {
                $this->dispatch('toast', [
                    'type' => 'danger',
                    'message' => 'Culto padrão não encontrado!'
                ]);
            }
        } catch (\Exception $e) {
            $this->dispatch('toast', [
                'type' => 'danger',
                'message' => 'Erro ao alterar status do culto: ' . $e->getMessage()
            ]);
        }
    }

    public function getCults()
    {
        try {
            // Obter a igreja do usuário logado
            $igreja = Auth::user()->igrejasAtivas()->first();

            if (!$igreja) {
                $this->dispatch('toast', [
                    'type' => 'danger',
                    'message' => 'Usuário não está associado a nenhuma Igreja ativa'
                ]);
                return new \Illuminate\Pagination\LengthAwarePaginator([], 0, $this->perPage);
            }

            $query = CultoPadrao::query()->where('igreja_id', $igreja->igreja_id);

            if ($this->search) {
                $query->where(function ($q) {
                    $q->where('titulo', 'like', '%' . $this->search . '%')
                      ->orWhere('descricao', 'like', '%' . $this->search . '%');
                });
            }

            return $query->orderBy('dia_semana')
                        ->orderBy('hora_inicio')
                        ->paginate($this->perPage);

        } catch (\Exception $e) {
            $this->dispatch('toast', [
                'type' => 'danger',
                'message' => 'Erro ao carregar cultos: ' . $e->getMessage()
            ]);
            return new \Illuminate\Pagination\LengthAwarePaginator([], 0, $this->perPage);
        }
    }

    public function getCultStats()
    {
        try {

            $totalCults = CultoPadrao::count();
            $activeCults = CultoPadrao::where('ativo', true)->count();
            $inactiveCults = CultoPadrao::where('ativo', false)->count();
            $newCultsThisMonth = CultoPadrao::whereMonth('criado_em', now()->month)
                                           ->whereYear('criado_em', now()->year)
                                           ->count();

            return [
                'total' => $totalCults,
                'active' => $activeCults,
                'inactive' => $inactiveCults,
                'new_this_month' => $newCultsThisMonth,
            ];
        } catch (\Exception $e) {
            $this->dispatch('toast', [
                'type' => 'danger',
                'message' => 'Erro ao carregar estatísticas: ' . $e->getMessage()
            ]);
            return [
                'total' => 0,
                'active' => 0,
                'inactive' => 0,
                'new_this_month' => 0,
            ];
        }
    }

    public function getDiaSemanaLabel($dia)
    {
        $dias = [
            0 => 'Domingo',
            1 => 'Segunda-feira',
            2 => 'Terça-feira',
            3 => 'Quarta-feira',
            4 => 'Quinta-feira',
            5 => 'Sexta-feira',
            6 => 'Sábado'
        ];

        return $dias[$dia] ?? 'Desconhecido';
    }

    public function getDiaSemanaBadgeClass($dia)
    {
        $cores = [
            0 => 'danger',    // Domingo
            1 => 'primary',   // Segunda
            2 => 'success',   // Terça
            3 => 'info',      // Quarta
            4 => 'warning',   // Quinta
            5 => 'secondary', // Sexta
            6 => 'dark'       // Sábado
        ];

        return $cores[$dia] ?? 'secondary';
    }

    public function render()
    {
        return view('church.events.standard-cult', [
            'cults' => $this->getCults(),
            'stats' => $this->getCultStats(),
        ]);
    }
}
