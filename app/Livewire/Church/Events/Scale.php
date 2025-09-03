<?php

namespace App\Livewire\Church\Events;

use App\Models\Escala;
use App\Models\Evento;
use Livewire\Component;
use App\Models\IgrejaMembro;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title('Gestão de escalas')]
#[Layout('components.layouts.app')]
class Scale extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedEvent = '';
    public $perPage = 10;

    // Modal properties
    public $showModal = false;
    public $editingScale = null;
    public $culto_evento_id = '';
    public $membro_id = '';
    public $funcao = '';
    public $observacoes = '';

    protected $rules = [
        'culto_evento_id' => 'required|uuid|exists:eventos,id',
        'membro_id' => 'required|uuid|exists:igreja_membros,id',
        'funcao' => 'required|string|max:255',
        'observacoes' => 'nullable|string|max:500',
    ];

    protected $listeners = ['refreshScales' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedEvent()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->selectedEvent = '';
        $this->resetPage();
    }

    public function openModal($scaleId = null)
    {
        if ($scaleId) {
            $scale = Escala::with(['evento', 'membro'])->find($scaleId);
            if ($scale) {
                $this->editingScale = $scale;
                $this->culto_evento_id = $scale->culto_evento_id;
                $this->membro_id = $scale->membro_id;
                $this->funcao = $scale->funcao;
                $this->observacoes = $scale->observacoes;
            }
        } else {
            $this->resetModal();
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetModal();
    }

    private function resetModal()
    {
        $this->editingScale = null;
        $this->culto_evento_id = '';
        $this->membro_id = '';
        $this->funcao = '';
        $this->observacoes = '';
        $this->resetValidation();
    }

    public function saveScale()
    {
        $this->validate();

        $data = [
            'culto_evento_id' => $this->culto_evento_id,
            'membro_id' => $this->membro_id,
            'funcao' => $this->funcao,
            'observacoes' => $this->observacoes,
        ];

        if ($this->editingScale) {
            $this->editingScale->update($data);
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Escala atualizada com sucesso!'
            ]);
        } else {
            Escala::create($data);
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Membro escalado com sucesso!'
            ]);
        }

        $this->closeModal();
        $this->dispatch('refreshScales');
    }

    public function deleteScale($scaleId)
    {
        $scale = Escala::find($scaleId);
        if ($scale) {
            $scale->delete();
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Escala removida com sucesso!'
            ]);
            $this->dispatch('refreshScales');
        }
    }

    public function getScales()
    {
         // Obter a igreja do usuário logado
         $igreja = Auth::user()->igrejasAtivas()->first();


        if (!$igreja) {

            $this->dispatch('toast', [
                'type' => 'danger',
                'message' => 'Usuário não está associado a nenhuma Igreja ativa'
            ]);

            return new \Illuminate\Pagination\LengthAwarePaginator([], 0, $this->perPage);
        }

        $query = Escala::with(['evento', 'membro.user']);

        if ($this->search) {
            $query->where(function ($q) {
                $q->whereHas('evento', function ($eventQuery) {
                    $eventQuery->where('titulo', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('membro.user', function ($userQuery) {
                    $userQuery->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhere('funcao', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->selectedEvent) {
            $query->where('culto_evento_id', $this->selectedEvent);
        }

        return $query->orderBy('created_at', 'desc')
                    ->paginate($this->perPage);
    }

    public function getScaleStats()
    {
        $totalScales = Escala::count();
        $activeScales = Escala::whereHas('evento', function ($q) {
            $q->where('data_evento', '>=', now())->where('status', 'agendado');
        })->count();
        $completedScales = Escala::whereHas('evento', function ($q) {
            $q->where('status', 'realizado');
        })->count();
        $newScalesThisMonth = Escala::whereMonth('created_at', now()->month)
                                    ->whereYear('created_at', now()->year)
                                    ->count();

        return [
            'total' => $totalScales,
            'active' => $activeScales,
            'completed' => $completedScales,
            'new_this_month' => $newScalesThisMonth,
        ];
    }

    public function render()
    {
        return view('church.events.scale', [
            'scales' => $this->getScales(),
            'stats' => $this->getScaleStats(),
            'events' => Evento::where('status', 'agendado')->orderBy('data_evento')->get(),
            'members' => IgrejaMembro::with('user')->where('status', 'ativo')->get(),
        ]);
    }
}
