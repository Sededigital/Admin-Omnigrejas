<?php

namespace App\Livewire\Church\Members;

use Livewire\Component;
use App\Models\IgrejaMembro;
use App\Models\MembroPerfil;
use App\Models\Ministerio;
use App\Models\User;
use App\Models\IgrejaMembrosHistorico;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    public $name = '';
    public $email = '';
    public $phone = '';
    public $data_nascimento = '';
    public $genero = '';
    public $cargo = '';
    public $endereco = '';
    public $data_entrada = '';
    public $status = 'ativo';
    public $observacoes = '';

    protected function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|phone:AO',
            'data_nascimento' => 'nullable|date',
            'genero' => 'nullable|in:masculino,feminino,outro',
            'cargo' => 'required|in:membro,diacono,obreiro,ministro,pastor',
            'endereco' => 'nullable|string|max:500',
            'data_entrada' => 'required|date',
            'status' => 'required|in:ativo,inativo',
            'observacoes' => 'nullable|string|max:500',
        ];

        if ($this->editingMember) {
            $rules['email'] = 'required|email|unique:users,email,' . $this->editingMember->user_id;
        } else {
            $rules['email'] = 'required|email|unique:users,email';
        }

        return $rules;
    }

    protected function messages(){

        $messages = [
            'phone.validation'=>'O número de telefone deve ser um número inválido'
        ];


        return $messages;
    }


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
            $member = IgrejaMembro::with(['user', 'membroPerfil'])->find($memberId);
            if ($member) {
                $this->editingMember = $member;
                $this->name = $member->user->name ?? '';
                $this->email = $member->user->email ?? '';
                $this->phone = $member->user->phone ?? '';
                $this->data_nascimento = $member->membroPerfil ? ($member->membroPerfil->data_nascimento ? $member->membroPerfil->data_nascimento->format('Y-m-d') : '') : '';
                $this->genero = $member->membroPerfil ? $member->membroPerfil->genero : '';
                $this->cargo = $member->cargo;
                $this->endereco = $member->membroPerfil ? $member->membroPerfil->endereco : '';
                $this->data_entrada = $member->data_entrada ? $member->data_entrada->format('Y-m-d') : '';
                $this->status = $member->status;
                $this->observacoes = $member->membroPerfil ? $member->membroPerfil->observacoes : '';
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
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->data_nascimento = '';
        $this->genero = '';
        $this->cargo = '';
        $this->endereco = '';
        $this->data_entrada = '';
        $this->status = 'ativo';
        $this->observacoes = '';
        $this->resetValidation();
    }

    public function saveMember()
    {
        $this->validate();

        // Obter a igreja do usuário logado
        $igreja = Auth::user()->igrejasAtivas()->first();

        if (!$igreja) {

             $this->dispatch('toast', [
                    'type' => 'danger',
                    'message' => 'Usuário não está associado a nenhuma Igreja ativa'
                ]);
            return;
        }

        $igreja_id = $igreja->igreja_id;

        if ($this->editingMember) {
            // Lógica para editar (atualizar os registros relacionados)
            $user = $this->editingMember->user;
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'role' => $this->cargo,
            ]);

            $this->editingMember->update([
                'cargo' => $this->cargo,
                'status' => $this->status,
                'data_entrada' => $this->data_entrada,
            ]);

            if ($this->editingMember->membroPerfil) {
                $this->editingMember->membroPerfil->update([
                    'genero' => $this->genero,
                    'data_nascimento' => $this->data_nascimento,
                    'endereco' => $this->endereco,
                    'observacoes' => $this->observacoes,
                ]);
            } else {
                // Create MembroPerfil if it doesn't exist
                MembroPerfil::create([
                    'id' => (string) Str::uuid(),
                    'igreja_membro_id' => $this->editingMember->id,
                    'genero' => $this->genero,
                    'data_nascimento' => $this->data_nascimento,
                    'endereco' => $this->endereco,
                    'observacoes' => $this->observacoes,
                    'created_by' => Auth::id(),
                ]);
            }

            $this->dispatch('toast', ['message' => 'Membro atualizado com sucesso!', 'type' => 'success']);
        } else {
            // Criar novo usuário
            $user = User::create([
                'id' => (string) Str::uuid(),
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => Hash::make(Str::random(8)),
                'role' => $this->cargo,
                'is_active' => true,
                'created_by' => Auth::id(),
            ]);

            // Criar IgrejaMembro
            $igrejaMembro = IgrejaMembro::create([
                'id' => (string) Str::uuid(),
                'igreja_id' => $igreja_id,
                'user_id' => $user->id,
                'cargo' => $this->cargo,
                'status' => $this->status,
                'data_entrada' => $this->data_entrada,
                'created_by' => Auth::id(),
            ]);

            // Criar MembroPerfil
            MembroPerfil::create([
                'id' => (string) Str::uuid(),
                'igreja_membro_id' => $igrejaMembro->id,
                'genero' => $this->genero,
                'data_nascimento' => $this->data_nascimento,
                'endereco' => $this->endereco,
                'observacoes' => $this->observacoes,
                'created_by' => Auth::id(),
            ]);

            // Criar IgrejaMembrosHistorico
            IgrejaMembrosHistorico::create([
                'id' => (string) Str::uuid(),
                'igreja_membro_id' => $igrejaMembro->id,
                'cargo' => $this->cargo,
                'inicio' => $this->data_entrada,
                'fim' => null,
            ]);

            $this->dispatch('toast', ['message' => 'Membro cadastrado com sucesso!', 'type' => 'success']);
        }

        $this->closeModal();
        $this->dispatch('refreshMembers');
    }

    public function deleteMember($memberId)
    {
        $member = IgrejaMembro::find($memberId);
        if ($member) {
            $member->delete();
            $this->dispatch('toast', ['message' => 'Membro excluído com sucesso!', 'type' => 'success']);
            $this->dispatch('refreshMembers');
        }
    }

    public function toggleMemberStatus($memberId)
    {

        $member = IgrejaMembro::find($memberId);
        if ($member) {
            $newStatus = $member->status === 'ativo' ? 'inativo' : 'ativo';
            $member->update(['status' => $newStatus]);
            $this->dispatch('toast', ['message' => 'Status do membro alterado com sucesso!', 'type' => 'success']);
            $this->dispatch('refreshMembers');
        }
    }

    public function getMembers()
    {
        // Obter a igreja do usuário logado
        $igreja = Auth::user()->igrejasAtivas()->first();

        if (!$igreja) {
            $this->dispatch('toast', [
                    'type' => 'danger',
                    'message' => 'Usuário não está associado a nenhuma Igreja ativa'
                ]);
            return IgrejaMembro::query()->whereRaw('1=0')->paginate($this->perPage);
        }


        $query = IgrejaMembro::query()
            ->with(['user', 'igreja', 'membroPerfil', 'ministerios'])
            ->where('igreja_id', $igreja->igreja_id)
            ->whereHas('user', function ($q) {
                $q->where('role', '!=', 'admin');
            });

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
        return view('church.members.members', [
            'members' => $this->getMembers(),
            'stats' => $this->getMemberStats(),
            'ministerios' => Ministerio::orderBy('igreja_id')->get(),
        ]);
    }
}
