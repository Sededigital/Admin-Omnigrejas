<?php

namespace App\Livewire\System\Geral\Church\Events;

use Livewire\Component;
use App\Models\Evento;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Events extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedStatus = '';
    public $perPage = 10;

    // Modal properties
    public $showModal = false;
    public $editingEvent = null;
    public $titulo = '';
    public $descricao = '';
    public $data_evento = '';
    public $hora_inicio = '';
    public $hora_fim = '';
    public $local = '';
    public $status = 'agendado';
    public $capacidade_maxima = '';
    public $preco = '';
    public $observacoes = '';

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descricao' => 'nullable|string|max:1000',
        'data_evento' => 'required|date',
        'hora_inicio' => 'required|date_format:H:i',
        'hora_fim' => 'nullable|date_format:H:i|after:hora_inicio',
        'local' => 'required|string|max:255',
        'status' => 'required|in:agendado,em_andamento,concluido,cancelado',
        'capacidade_maxima' => 'nullable|integer|min:1',
        'preco' => 'nullable|numeric|min:0',
        'observacoes' => 'nullable|string|max:500',
    ];

    protected $listeners = ['refreshEvents' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedStatus()
    {
        $this->resetPage();
    }

    public function setStatusFilter($status)
    {
        $this->selectedStatus = $status;
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->selectedStatus = '';
        $this->resetPage();
    }

    public function openModal($eventId = null)
    {
        if ($eventId) {
            $event = Evento::find($eventId);
            if ($event) {
                $this->editingEvent = $event;
                $this->titulo = $event->titulo;
                $this->descricao = $event->descricao;

                $this->data_evento = $event->data_evento;
                $this->hora_inicio = $event->hora_inicio ? $event->hora_inicio->format('H:i') : '';
                $this->hora_fim = $event->hora_fim ? $event->hora_fim->format('H:i') : '';
                $this->local = $event->local;
                $this->status = $event->status;
                $this->capacidade_maxima = $event->capacidade_maxima;
                $this->preco = $event->preco;
                $this->observacoes = $event->observacoes;
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
        $this->editingEvent = null;
        $this->titulo = '';
        $this->descricao = '';
        $this->data_evento= '';
        $this->hora_inicio = '';
        $this->hora_fim = '';
        $this->local = '';
        $this->status = 'agendado';
        $this->capacidade_maxima = '';
        $this->preco = '';
        $this->observacoes = '';
        $this->resetValidation();
    }

    public function saveEvent()
    {
        $this->validate();

        $data = [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'data_evento' => $this->data_evento ?: null,
            'hora_inicio' => $this->hora_inicio,
            'hora_fim' => $this->hora_fim ?: null,
            'local' => $this->local,
            'status' => $this->status,
            'capacidade_maxima' => $this->capacidade_maxima ?: null,
            'preco' => $this->preco ?: null,
            'observacoes' => $this->observacoes,
            'created_by' => Auth::id(),
        ];

        if ($this->editingEvent) {
            $this->editingEvent->update($data);
            session()->flash('success', 'Evento atualizado com sucesso!');
        } else {
            Evento::create($data);
            session()->flash('success', 'Evento criado com sucesso!');
        }

        $this->closeModal();
        $this->dispatch('refreshEvents');
    }

    public function deleteEvent($eventId)
    {
        $event = Evento::find($eventId);
        if ($event) {
            $event->delete();
            session()->flash('success', 'Evento excluído com sucesso!');
            $this->dispatch('refreshEvents');
        }
    }

    public function toggleEventStatus($eventId)
    {
        $event = Evento::find($eventId);
        if ($event) {
            $newStatus = $event->status === 'agendado' ? 'cancelado' : 'agendado';
            $event->update(['status' => $newStatus]);
            session()->flash('success', 'Status do evento alterado com sucesso!');
            $this->dispatch('refreshEvents');
        }
    }

    public function getEvents()
    {
        $query = Evento::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('titulo', 'like', '%' . $this->search . '%')
                  ->orWhere('descricao', 'like', '%' . $this->search . '%')
                  ->orWhere('local', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->selectedStatus) {
            $query->where('status', $this->selectedStatus);
        }

        return $query->orderBy('data_evento', 'desc')
                    ->paginate($this->perPage);
    }

    public function getEventStats()
    {
        $totalEvents = Evento::count();
        $upcomingEvents = Evento::where('data_evento', '>=', now())->where('status', 'agendado')->count();
        $ongoingEvents = Evento::where('status', 'em_andamento')->count();
        $completedEvents = Evento::where('status', 'concluido')->count();
        $newEventsThisMonth = Evento::whereMonth('created_at', now()->month)
                                    ->whereYear('created_at', now()->year)
                                    ->count();

        return [
            'total' => $totalEvents,
            'upcoming' => $upcomingEvents,
            'ongoing' => $ongoingEvents,
            'completed' => $completedEvents,
            'new_this_month' => $newEventsThisMonth,
        ];
    }

    public function getStatusLabel($status)
    {
        return match($status) {
            'agendado' => 'Agendado',
            'em_andamento' => 'Em Andamento',
            'concluido' => 'Concluído',
            'cancelado' => 'Cancelado',
            default => 'Desconhecido'
        };
    }

    public function getStatusBadgeClass($status)
    {
        return match($status) {
            'agendado' => 'primary',
            'em_andamento' => 'warning',
            'concluido' => 'success',
            'cancelado' => 'danger',
            default => 'secondary'
        };
    }

    public function render()
    {
        return view('system.geral.church.events.events', [
            'events' => $this->getEvents(),
            'stats' => $this->getEventStats(),
        ]);
    }
}
