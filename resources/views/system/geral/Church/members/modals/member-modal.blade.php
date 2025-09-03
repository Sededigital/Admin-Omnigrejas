<!-- Modal para Cadastro/Edição de Membro -->
<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true"
     data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <!-- Header do Modal -->
            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title fw-bold" id="memberModalLabel">
                    <i class="fas fa-user text-primary me-2"></i>
                    <span id="modal-title">{{ $editingMember ? 'Editar Membro' : 'Cadastrar Novo Membro' }}</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>

            <!-- Corpo do Modal -->
            <div class="modal-body p-4">
                <form wire:submit.prevent="saveMember">

                    <!-- Navegação por Abas (Bootstrap puro) -->
                    <nav class="mb-4">
                        <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
                            <button class="nav-link active border-0 bg-transparent fw-semibold" id="nav-basic-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-basic" type="button" role="tab">
                                <i class="fas fa-info-circle text-primary me-1"></i>Informações Básicas
                            </button>
                            <button class="nav-link border-0 bg-transparent fw-semibold" id="nav-details-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-details" type="button" role="tab">
                                <i class="fas fa-user-tag text-primary me-1"></i>Ministério e Status
                            </button>
                        </div>
                    </nav>

                    <!-- Conteúdo das Abas -->
                    <div class="tab-content" id="nav-tabContent">

                        <!-- Aba: Informações Básicas -->
                        <div class="tab-pane fade show active" id="nav-basic" role="tabpanel">
                            <div class="row g-3">
                                <!-- Usuário -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('user_id') is-invalid @enderror"
                                                wire:model="user_id">
                                            <option value="">Selecione um usuário</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                            @endforeach
                                        </select>
                                        <label><i class="fas fa-user text-primary me-1"></i>Usuário *</label>
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Perfil de Membro -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('membro_perfil_id') is-invalid @enderror"
                                                wire:model="membro_perfil_id">
                                            <option value="">Selecione um perfil</option>
                                            @foreach($perfis as $perfil)
                                                <option value="{{ $perfil->id }}">{{ $perfil->nome }}</option>
                                            @endforeach
                                        </select>
                                        <label><i class="fas fa-id-card text-primary me-1"></i>Perfil de Membro *</label>
                                        @error('membro_perfil_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Data de Entrada -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control @error('data_entrada') is-invalid @enderror"
                                               wire:model="data_entrada">
                                        <label><i class="fas fa-calendar-plus text-primary me-1"></i>Data de Entrada *</label>
                                        @error('data_entrada')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Data de Saída -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control @error('data_saida') is-invalid @enderror"
                                               wire:model="data_saida">
                                        <label><i class="fas fa-calendar-minus text-primary me-1"></i>Data de Saída</label>
                                        @error('data_saida')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Aba: Ministério e Status -->
                        <div class="tab-pane fade" id="nav-details" role="tabpanel">
                            <div class="row g-3">
                                <!-- Ministério -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('ministerio_id') is-invalid @enderror"
                                                wire:model="ministerio_id">
                                            <option value="">Selecione um ministério</option>
                                            @foreach($ministerios as $ministerio)
                                                <option value="{{ $ministerio->id }}">{{ $ministerio->nome }}</option>
                                            @endforeach
                                        </select>
                                        <label><i class="fas fa-church text-primary me-1"></i>Ministério</label>
                                        @error('ministerio_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('status') is-invalid @enderror"
                                                wire:model="status">
                                            <option value="ativo">Ativo</option>
                                            <option value="inativo">Inativo</option>
                                            <option value="transferido">Transferido</option>
                                            <option value="falecido">Falecido</option>
                                        </select>
                                        <label><i class="fas fa-toggle-on text-primary me-1"></i>Status *</label>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Observações -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control @error('observacoes') is-invalid @enderror"
                                                  wire:model="observacoes" rows="3"
                                                  placeholder="Observações sobre o membro"></textarea>
                                        <label><i class="fas fa-comment text-primary me-1"></i>Observações</label>
                                        @error('observacoes')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status Visual -->
                                <div class="col-12">
                                    <div class="alert alert-light border">
                                        <i class="fas fa-info-circle text-primary me-2"></i>
                                        <strong>Status:</strong>
                                        <span class="text-muted">
                                            {{ $editingMember ? 'Editando Membro' : 'Novo Membro' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer do Modal -->
            <div class="modal-footer border-top bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancelar
                </button>
                <button type="button" class="btn btn-primary" wire:click="saveMember" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="saveMember">
                        <i class="fas fa-save me-1"></i>{{ $editingMember ? 'Atualizar Membro' : 'Salvar Membro' }}
                    </span>
                    <span wire:loading wire:target="saveMember">
                        <i class="fas fa-spinner fa-spin me-1"></i>{{ $editingMember ? 'Atualizando...' : 'Salvando...' }}
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>