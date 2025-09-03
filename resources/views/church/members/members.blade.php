<div>
    <div class="container-fluid p-4">
        <!-- Header -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="h3 mb-1 text-primary">
                            <i class="fas fa-users me-2"></i>Gestão de Membros
                        </h1>
                        <p class="mb-0 text-muted">Gerencie todos os membros da igreja</p>
                    </div>
                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        <button class="btn btn-primary btn-md" wire:click="openModal" data-bs-toggle="modal" data-bs-target="#memberModal">
                            <i class="fas fa-user-plus me-2"></i>Adicionar Membro
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cards de Métricas -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-lg-3">
                <div class="card text-center card-hover border border-primary metric-card">
                    <div class="card-body">
                        <i class="fas fa-users text-primary display-6 mb-2 icon-interactive"></i>
                        <div class="fw-bold h4 mb-1 text-primary">{{ $stats['total'] }}</div>
                        <div class="text-muted small">Total de Membros</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card text-center card-hover border border-success metric-card">
                    <div class="card-body">
                        <i class="fas fa-user-check text-success display-6 mb-2 icon-interactive"></i>
                        <div class="fw-bold h4 mb-1 text-success">{{ $stats['active'] }}</div>
                        <div class="text-muted small">Membros Ativos</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card text-center card-hover border border-warning metric-card">
                    <div class="card-body">
                        <i class="fas fa-user-times text-warning display-6 mb-2 icon-interactive"></i>
                        <div class="fw-bold h4 mb-1 text-warning">{{ $stats['inactive'] }}</div>
                        <div class="text-muted small">Membros Inativos</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card text-center card-hover border border-info metric-card">
                    <div class="card-body">
                        <i class="fas fa-user-plus text-info display-6 mb-2 icon-interactive"></i>
                        <div class="fw-bold h4 mb-1 text-info">{{ $stats['new_this_month'] }}</div>
                        <div class="text-muted small">Novos (Este Mês)</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtros por Ministério e Status -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Buscar Membro</label>
                        <div class="input-group">

                            <input type="text" class="form-control" wire:model.live.debounce.300ms="search" placeholder="Nome ou email">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Filtrar por Ministério</label>
                        <select class="form-select" wire:model.live="selectedMinistry">
                            <option value="">Todos os ministérios</option>
                            @foreach($ministerios as $ministerio)
                                <option value="{{ $ministerio->id }}">{{ $ministerio->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Filtrar por Status</label>
                        <select class="form-select" wire:model.live="selectedStatus">
                            <option value="">Todos os status</option>
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary flex-fill" wire:click="clearFilters">
                                <i class="fas fa-filter me-1"></i>Limpar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Botões de Filtro Rápido -->
                <div class="row g-2 mt-3">
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-outline-primary btn-sm" wire:click="setMinistryFilter('')">
                                <i class="fas fa-users me-1"></i>Todos
                            </button>
                            @foreach($ministerios->take(5) as $ministerio)
                                <button class="btn btn-outline-info btn-sm" wire:click="setMinistryFilter({{ $ministerio->id }})">
                                    <i class="fas fa-church me-1"></i>{{ $ministerio->nome }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Desktop: Tabela -->
        <div class="d-none d-lg-block">
            <div class="card">
                <div class="card-header d-flex align-items-center mb-3">
                    <h5 class="mb-0 text-primary">
                        <i class="fas fa-list-ul me-2"></i>Lista de Membros
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Membro</th>
                                <th>Cargo</th>
                                <th>Gênero</th>
                                <th>Data Entrada</th>
                                <th>Status</th>
                                <th>Cadastro</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($members as $member)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar bg-primary text-white me-3">
                                            {{ strtoupper(substr($member->user->name ?? 'N', 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $member->user->name ?? 'N/A' }}</div>
                                            <small class="text-muted">{{ $member->user->email ?? 'N/A' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $member->cargo ?? 'N/A' }}</td>
                                <td>{{ $member->membroPerfil->genero ?? 'N/A' }}</td>
                                <td>{{ $member->data_entrada ? $member->data_entrada->format('d/m/Y') : 'N/A' }}</td>
                                <td>
                                    <span class="badge bg-{{ $this->getStatusBadgeClass($member->status) }}">
                                        {{ $this->getStatusLabel($member->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div>{{ $member->created_at->format('d/m/Y') }}</div>
                                    <small class="text-muted">{{ $member->created_at->diffForHumans() }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" wire:click="openModal('{{ $member->id }}')" data-bs-toggle="modal" data-bs-target="#memberModal" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-{{ $member->status === 'ativo' ? 'warning' : 'success' }}"
                                                wire:click="toggleMemberStatus('{{ $member->id }}')"
                                                title="{{ $member->status === 'ativo' ? 'Desativar' : 'Ativar' }}">
                                            <i class="fas fa-{{ $member->status === 'ativo' ? 'user-times' : 'user-check' }}"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" wire:click="deleteMember('{{ $member->id }}')"
                                                onclick="return confirm('Tem certeza que deseja excluir este membro?')" title="Excluir">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="fas fa-users text-muted display-4 mb-3"></i>
                                    <div class="text-muted">Nenhum membro encontrado</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted small">Mostrando {{ $members->firstItem() }}-{{ $members->lastItem() }} de {{ $members->total() }} registros</span>
                        <nav aria-label="Paginação">
                            {{ $members->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile/Tablet: Cards -->
        <div class="d-lg-none">
            <div class="row g-3">
                @forelse($members as $member)
                <div class="col-12 col-md-6">
                    <div class="card card-hover h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar bg-primary text-white me-3">
                                        {{ strtoupper(substr($member->user->name ?? 'N', 0, 2)) }}
                                    </div>
                                    <div>
                                        <h6 class="card-title mb-1">{{ $member->user->name ?? 'N/A' }}</h6>
                                        <span class="badge bg-{{ $this->getStatusBadgeClass($member->status) }}">
                                            {{ $this->getStatusLabel($member->status) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="badge bg-{{ $member->status === 'ativo' ? 'success' : 'secondary' }} mb-2">
                                        {{ $member->status === 'ativo' ? 'Ativo' : 'Inativo' }}
                                    </span>
                                </div>
                            </div>
                            <div class="mb-2">
                                <i class="fas fa-envelope text-muted me-1"></i>
                                <small class="text-muted">{{ $member->user->email ?? 'N/A' }}</small>
                            </div>
                            <div class="mb-2">
                                <i class="fas fa-user-tag text-muted me-1"></i>
                                <small class="text-muted">{{ $member->cargo ?? 'N/A' }}</small>
                            </div>
                            <div class="mb-2">
                                <i class="fas fa-venus-mars text-muted me-1"></i>
                                <small class="text-muted">{{ $member->membroPerfil->genero ?? 'N/A' }}</small>
                            </div>
                            <div class="mb-3">
                                <i class="fas fa-calendar text-muted me-1"></i>
                                <small class="text-muted">{{ $member->data_entrada ? $member->data_entrada->format('d/m/Y') : 'N/A' }}</small>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary btn-sm flex-fill" wire:click="openModal({{ $member->id }})" data-bs-toggle="modal" data-bs-target="#memberModal">
                                    <i class="fas fa-edit me-1"></i>Editar
                                </button>
                                <button class="btn btn-outline-danger btn-sm" wire:click="deleteMember({{ $member->id }})"
                                        onclick="return confirm('Tem certeza que deseja excluir este membro?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-users text-muted display-4 mb-3"></i>
                            <div class="text-muted">Nenhum membro encontrado</div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Paginação Mobile -->
            @if($members->hasPages())
            <div class="mt-4">
                <nav aria-label="Paginação Mobile">
                    {{ $members->links() }}
                </nav>
                <div class="text-center text-muted mt-2">
                    <small>Mostrando {{ $members->firstItem() }}-{{ $members->lastItem() }} de {{ $members->total() }} registros</small>
                </div>
            </div>
            @endif
        </div>



        <!-- Scripts para Members -->
        <script src="{{ asset('system/js/members.js') }}" data-navigate-once></script>

        {{-- MEMBERS MODALS --}}
        @include('church.members.modals.member-modal')
    </div>
</div>
