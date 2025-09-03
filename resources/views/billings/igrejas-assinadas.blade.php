<div>
    {{-- Seção do cabeçalho --}}
    <div class="iq-navbar-header m-0" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div>
                            <h1>Igrejas Assinadas</h1>
                            <p>Gerencie as igrejas que possuem assinaturas ativas</p>
                        </div>
                        <div>
                            <a type="button" class="btn btn-primary" href="{{ route('admin.assignatures.assinaturas-atuais') }}"  wire:navigate >
                                <i class="fas fa-plus me-2"></i>
                                Nova Assinatura
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="iq-header-img">
            <img src="{{ asset('assets/images/dashboard/top-header.png') }}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
            <img src="{{ asset('assets/images/dashboard/top-header1.png') }}" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
            <img src="{{ asset('assets/images/dashboard/top-header2.png') }}" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
            <img src="{{ asset('assets/images/dashboard/top-header3.png') }}" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
            <img src="{{ asset('assets/images/dashboard/top-header4.png') }}" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
            <img src="{{ asset('assets/images/dashboard/top-header5.png') }}" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
        </div>
    </div>

    {{-- Conteúdo principal --}}
    <div class="row">
        {{-- Filtros e busca --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Buscar..." wire:model.live.debounce.300ms="search">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" wire:model.live="statusFilter">
                                <option value="">Todos os status</option>
                                <option value="ativo">Ativo</option>
                                <option value="inativo">Inativo</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" wire:model.live="pacoteFilter">
                                <option value="">Todos os pacotes</option>
                                @foreach($pacotes as $pacote)
                                    <option value="{{ $pacote->id }}">{{ $pacote->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 text-end">
                            <button type="button" class="btn btn-outline-secondary" wire:click="clearFilters">
                                <i class="fas fa-eraser me-1"></i>
                                Limpar Filtros
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Lista de Igrejas Assinadas --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Igrejas Assinadas ({{ $igrejasAssinadas->total() }})</h4>
                    <div class="dropdown">
                        <select class="form-select" wire:model.live="perPage">
                            <option value="10">10 por página</option>
                            <option value="25">25 por página</option>
                            <option value="50">50 por página</option>
                        </select>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Igreja</th>
                                    <th>Pacote</th>
                                    <th>Data Adesão</th>
                                    <th>Data Cancelamento</th>
                                    <th>Status</th>
                                    <th>Observações</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($igrejasAssinadas as $igrejaAssinada)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-40 me-3 bg-soft-primary rounded">
                                                <span class="avatar-title">{{ substr($igrejaAssinada->igreja->nome ?? 'I', 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $igrejaAssinada->igreja->nome ?? 'Igreja' }}</h6>
                                                <small class="text-muted">{{ $igrejaAssinada->igreja->nif ?? '-' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-32 me-2 bg-soft-success rounded">
                                                <span class="avatar-title">{{ substr($igrejaAssinada->pacote->nome ?? 'P', 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold">{{ $igrejaAssinada->pacote->nome ?? 'Pacote' }}</span><br>
                                                <small class="text-muted">{{ number_format($igrejaAssinada->pacote->preco ?? 0, 2, ',', '.') }} Kz</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $igrejaAssinada->data_adesao ? $igrejaAssinada->data_adesao->format('d/m/Y') : '-' }}</small>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $igrejaAssinada->data_cancelamento ? $igrejaAssinada->data_cancelamento->format('d/m/Y') : '-' }}</small>
                                    </td>
                                    <td>
                                        @if($igrejaAssinada->ativo)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ativo
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                <i class="fas fa-times me-1"></i>Inativo
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ Str::limit($igrejaAssinada->observacoes ?? '-', 30) }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-outline-warning" wire:click.prevent="openStatusModal('{{ $igrejaAssinada->id }}', '{{ $igrejaAssinada->ativo ? 'desativar' : 'ativar' }}')" title="{{ $igrejaAssinada->ativo ? 'Desativar' : 'Ativar' }}">
                                                <i class="fas fa-{{ $igrejaAssinada->ativo ? 'ban' : 'check' }}"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger" wire:click.prevent="openDeleteModal('{{ $igrejaAssinada->id }}')" title="Excluir">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-church fa-2x mb-2"></i>
                                            <p>Nenhuma igreja assinada encontrada.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($igrejasAssinadas->hasPages())
                <div class="card-footer">
                    {{ $igrejasAssinadas->links() }}
                </div>
                @endif
            </div>
        </div>

        {{-- Scripts para Assinaturas --}}
        <script src="{{ asset('system/js/assignatures.js') }}" data-navigate-once></script>

    </div>

    {{-- Modal de Confirmação de Status --}}
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h6 class="modal-title fw-bold" id="statusModalLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Confirmar Ação
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <i class="fas fa-question-circle fa-2x text-warning mb-2"></i>
                    </div>
                    <p class="mb-2">
                        Tem certeza que deseja <strong>{{ $statusAction }}</strong> esta assinatura?
                    </p>
                    <small class="text-muted mb-2 d-block">
                        {{ $statusAction === 'desativar' ? 'A assinatura será cancelada e a data de cancelamento será registrada.' : 'A assinatura será reativada.' }}
                    </small>

                    {{-- Input de confirmação --}}
                    <div class="mb-3">
                        <label for="confirmacaoStatus" class="form-label fw-bold">
                            <i class="fas fa-shield-alt me-1"></i>
                            Confirme digitando o nome da igreja:
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-church"></i></span>
                            <input type="text"
                                   class="form-control"
                                   id="confirmacaoStatus"
                                   wire:model="confirmacaoNome"
                                   autocomplete="off">
                        </div>
                        <small class="text-muted">
                            Digite exatamente: <strong>{{ $selectedIgrejaAssinada->igreja->nome ?? '' }}</strong>
                        </small>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Cancelar
                    </button>
                    <button type="button" class="btn btn-warning btn-sm" wire:click="confirmStatusChange" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="confirmStatusChange">
                            <i class="fas fa-{{ $statusAction === 'desativar' ? 'ban' : 'check' }} me-1"></i>
                            {{ ucfirst($statusAction) }}
                        </span>
                        <span wire:loading wire:target="confirmStatusChange">
                            <i class="fas fa-spinner fa-spin me-1"></i>Processando...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal de Confirmação de Exclusão --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true"  wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h6 class="modal-title fw-bold" id="deleteModalLabel">
                        <i class="fas fa-trash-alt me-2"></i>
                        Confirmar Exclusão
                    </h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <i class="fas fa-exclamation-triangle fa-2x text-danger mb-2"></i>
                    </div>
                    <p class="mb-1">
                        <strong>Atenção!</strong>
                    </p>
                    <p class="mb-2">
                        Esta ação não pode ser desfeita.<br>
                        Todos os dados relacionados serão perdidos.
                    </p>

                    {{-- Input de confirmação --}}
                    <div class="mb-3">
                        <label for="confirmacaoDelete" class="form-label fw-bold">
                            <i class="fas fa-shield-alt me-1"></i>
                            Confirme digitando o nome da igreja:
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-church"></i></span>
                            <input type="text"
                                   class="form-control"
                                   id="confirmacaoDelete"
                                   wire:model="confirmacaoNome"

                                   autocomplete="off">
                        </div>
                        <small class="text-muted">
                            Digite exatamente: <strong>{{ $selectedIgrejaAssinada->igreja->nome ?? '' }}</strong>
                        </small>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Cancelar
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="confirmDelete" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="confirmDelete">
                            <i class="fas fa-trash me-1"></i>Excluir
                        </span>
                        <span wire:loading wire:target="confirmDelete">
                            <i class="fas fa-spinner fa-spin me-1"></i>Excluindo...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
