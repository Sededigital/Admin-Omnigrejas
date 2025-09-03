<?php

namespace App\Livewire\System\Geral\Church\Members;

use Livewire\Component;
use App\Models\IgrejaMembro;
use App\Models\MembroPerfil;
use App\Models\Ministerio;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Members extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedMinistry = '';
    public $selectedStatus = '';
    public $perPage = 10;

    // Modal properties
    public $showModal = false;
    public $editingMember = null;
    public $user_id = '';
    public $membro_perfil_id = '';
    public $ministerio_id = '';
    public $data_entrada = '';
    public $data_saida = '';
    public $status = 'ativo';
    public $observacoes = '';

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'membro_perfil_id' => 'required|exists:membro_perfis,id',
        'ministerio_id' => 'nullable|exists:ministerios,id',
        'data_entrada' => 'required|date',
        'data_saida' => 'nullable|date|after:data_entrada',
        'status' => 'required|in:ativo,inativo,transferido,falecido',
        'observacoes' => 'nullable|string|max:500',
    ];

    protected $listeners = ['refreshMembers' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedMinistry()
    {
        $this->resetPage();
    }

    public function updatingSelectedStatus()
    {
        $this->resetPage();
    }

    public function setMinistryFilter($ministry)
    {
        $this->selectedMinistry = $ministry;
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
        $this->selectedMinistry = '';
        $this->selectedStatus = '';
        $this->resetPage();
    }

    public function openModal($memberId = null)
    {
        if ($memberId) {
            $member = IgrejaMembro::find($memberId);
            if ($member) {
                $this->editingMember = $member;
                $this->user_id = $member->user_id;
                $this->membro_perfil_id = $member->membro_perfil_id;
                $this->ministerio_id = $member->ministerio_id;
                $this->data_entrada = $member->data_entrada ? $member->data_entrada->format('Y-m-d') : '';
                $this->data_saida = $member->data_saida ? $member->data_saida->format('Y-m-d') : '';
                $this->status = $member->status;
                $this->observacoes = $member->observacoes;
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
        $this->editingMember = null;
        $this->user_id = '';
        $this->membro_perfil_id = '';
        $this->ministerio_id = '';
        $this->data_entrada = '';
        $this->data_saida = '';
        $this->status = 'ativo';
        $this->observacoes = '';
        $this->resetValidation();
    }

    public function saveMember()
    {
        $this->validate();

        $data = [
            'user_id' => $this->user_id,
            'membro_perfil_id' => $this->membro_perfil_id,
            'ministerio_id' => $this->ministerio_id ?: null,
            'data_entrada' => $this->data_entrada,
            'data_saida' => $this->data_saida ?: null,
            'status' => $this->status,
            'observacoes' => $this->observacoes,
        ];

        if ($this->editingMember) {
            $this->editingMember->update($data);
            session()->flash('success', 'Membro atualizado com sucesso!');
        } else {
            IgrejaMembro::create($data);
            session()->flash('success', 'Membro cadastrado com sucesso!');
        }

        $this->closeModal();
        $this->dispatch('refreshMembers');
    }

    public function deleteMember($memberId)
    {
        $member = IgrejaMembro::find($memberId);
        if ($member) {
            $member->delete();
            session()->flash('success', 'Membro excluído com sucesso!');
            $this->dispatch('refreshMembers');
        }
    }

    public function toggleMemberStatus($memberId)
    {
        $member = IgrejaMembro::find($memberId);
        if ($member) {
            $newStatus = $member->status === 'ativo' ? 'inativo' : 'ativo';
            $member->update(['status' => $newStatus]);
            session()->flash('success', 'Status do membro alterado com sucesso!');
            $this->dispatch('refreshMembers');
        }
    }

    public function getMembers()
    {
        $query = IgrejaMembro::query()
            ->with(['user', 'igreja','membroPerfil', 'ministerio']);

        if ($this->search) {
            $query->whereHas('user', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->selectedMinistry) {
            $query->where('ministerio_id', $this->selectedMinistry);
        }

        if ($this->selectedStatus) {
            $query->where('status', $this->selectedStatus);
        }

        return $query->orderBy('created_at', 'desc')
                    ->paginate($this->perPage);
    }

    public function getMemberStats()
    {
        $totalMembers = IgrejaMembro::count();
        $activeMembers = IgrejaMembro::where('status', 'ativo')->count();
        $inactiveMembers = IgrejaMembro::where('status', 'inativo')->count();
        $newMembersThisMonth = IgrejaMembro::whereMonth('created_at', now()->month)
                                          ->whereYear('created_at', now()->year)
                                          ->count();

        return [
            'total' => $totalMembers,
            'active' => $activeMembers,
            'inactive' => $inactiveMembers,
            'new_this_month' => $newMembersThisMonth,
        ];
    }

    public function getStatusLabel($status)
    {
        return match($status) {
            'ativo' => 'Ativo',
            'inativo' => 'Inativo',
            'transferido' => 'Transferido',
            'falecido' => 'Falecido',
            default => 'Desconhecido'
        };
    }

    public function getStatusBadgeClass($status)
    {
        return match($status) {
            'ativo' => 'success',
            'inativo' => 'secondary',
            'transferido' => 'warning',
            'falecido' => 'dark',
            default => 'secondary'
        };
    }

    public function render()
    {
        return view('system.geral.church.members.members', [
            'members' => $this->getMembers(),
            'stats' => $this->getMemberStats(),
            'users' => User::orderBy('name')->get(),
            'perfis' => MembroPerfil::orderBy('igreja_membro_id')->get(),
            'ministerios' => Ministerio::orderBy('igreja_id')->get(),
        ]);
    }
}
