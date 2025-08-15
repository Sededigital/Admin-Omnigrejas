<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnigrejas - Gestão de Valores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .sortable {
            cursor: pointer;
        }
        .sortable i {
            font-size: 0.75rem;
            margin-left: 0.25rem;
        }
        .badge {
            font-weight: 500;
        }
        .card-title {
            font-size: 1.1rem;
        }
        .card-text {
            font-size: 1.8rem;
            font-weight: bold;
        }
        #tabela-corpo tr td:first-child {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Gestão de Valores</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Financeiro</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <!-- Operações de Entrada Geral -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon text-bg-success shadow-sm">
                                <i class="bi bi-box-arrow-in-down"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text d-flex justify-content-between align-items-center">
                                    Operação de Entrada Geral
                                </span>
                                <span class="info-box-number" id="total-entradas">0</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Operações de Saída Geral -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon text-bg-danger shadow-sm">
                                <i class="bi bi-box-arrow-up"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text d-flex justify-content-between align-items-center">
                                    Operação de Saída Geral
                                </span>
                                <span class="info-box-number" id="total-saidas">0</span>
                            </div>
                        </div>
                    </div>

                    <div class="row my-4">
                        <!-- Seletor de Igreja -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label for="igrejaSelect" class="form-label fw-bold">Selecione a igreja:</label>
                                <select class="form-select" id="igrejaSelect">
                                    <option value="todas" selected>Todas as Igrejas</option>
                                    <option>Igreja Sagrada Luz</option>
                                    <option>Igreja Central da Fé</option>
                                    <option>Igreja Avivamento Total</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Card: Fundo atual -->
                        <div class="col-md-4">
                            <div class="card text-white bg-dark shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-bank2 me-2"></i>Fundo Atual</h5>
                                    <p class="card-text display-6" id="fundo-atual">Kz 0</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Card: Entradas -->
                        <div class="col-md-4">
                            <div class="card text-white bg-success shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-arrow-down-circle me-2"></i>Fundo de Entrada</h5>
                                    <p class="card-text display-6" id="total-entradas-igreja">Kz 0</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Card: Saídas -->
                        <div class="col-md-4">
                            <div class="card text-white bg-danger shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-arrow-up-circle me-2"></i>Fundo de Saída</h5>
                                    <p class="card-text display-6" id="total-saidas-igreja">Kz 0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Tabela de Registros Financeiros -->
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Registros Financeiros</h3>
                        <div class="d-flex align-items-center gap-2">
                            <span id="contador-registros" class="badge bg-light text-dark rounded-pill">0 registros</span>
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalCadastro">
                                <i class="bi bi-plus-circle me-1"></i> Cadastrar Registro
                            </button>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th class="sortable">Quantia (Kz) <i class="bi bi-arrow-down"></i></th>
                                        <th class="sortable">Igreja <i class="bi bi-arrow-up-down text-muted"></i></th>
                                        <th class="sortable">Tipo <i class="bi bi-arrow-up-down text-muted"></i></th>
                                        <th>Nota</th>
                                        <th class="sortable">Data <i class="bi bi-arrow-up-down text-muted"></i></th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="tabela-corpo">
                                    <!-- Registros serão adicionados aqui -->
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <p class="text-muted small" id="info-registros">Mostrando 0-0 de 0 registros</p>
                            </div>
                            <div class="col-md-6">
                                <nav aria-label="Navegação de página">
                                    <ul class="pagination pagination-sm justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#">Anterior</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#">Próximo</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

    <!-- Modal de Cadastro -->
    <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="modalCadastroLabel"><i class="bi bi-pencil-square me-2"></i>Novo Registro Financeiro</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formCadastro">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Quantia (Kz)</label>
                            <input type="number" id="quantia" class="form-control" required min="1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Igreja</label>
                            <select id="igreja" class="form-select" required>
                                <option value="" selected disabled>Selecione</option>
                                <option>Igreja Sagrada Luz</option>
                                <option>Igreja Central da Fé</option>
                                <option>Igreja Avivamento Total</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <select id="tipo" class="form-select" required>
                                <option value="" selected disabled>Selecione</option>
                                <option value="entrada">Entrada</option>
                                <option value="saida">Saída</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nota</label>
                            <textarea id="nota" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Data</label>
                            <input type="date" id="data" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Edição -->
    <div class="modal fade" id="modalEdicao" tabindex="-1" aria-labelledby="modalEdicaoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalEdicaoLabel"><i class="bi bi-pencil-square me-2"></i>Editar Registro</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formEdicao">
                    <input type="hidden" id="editar-id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Quantia (Kz)</label>
                            <input type="number" id="editar-quantia" class="form-control" required min="1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Igreja</label>
                            <select id="editar-igreja" class="form-select" required>
                                <option value="" selected disabled>Selecione</option>
                                <option>Igreja Sagrada Luz</option>
                                <option>Igreja Central da Fé</option>
                                <option>Igreja Avivamento Total</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <select id="editar-tipo" class="form-select" required>
                                <option value="" selected disabled>Selecione</option>
                                <option value="entrada">Entrada</option>
                                <option value="saida">Saída</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nota</label>
                            <textarea id="editar-nota" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Data</label>
                            <input type="date" id="editar-data" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Banco de dados local
        let registros = JSON.parse(localStorage.getItem('registrosFinanceiros')) || [];
        
        // Elementos da interface
        const formCadastro = document.getElementById("formCadastro");
        const formEdicao = document.getElementById("formEdicao");
        const tabelaCorpo = document.getElementById("tabela-corpo");
        const contador = document.getElementById("contador-registros");
        const infoRegistros = document.getElementById("info-registros");
        const seletorIgreja = document.getElementById("igrejaSelect");
        
        // Elementos de totais
        const totalEntradasElement = document.getElementById("total-entradas");
        const totalSaidasElement = document.getElementById("total-saidas");
        const fundoAtualElement = document.getElementById("fundo-atual");
        const totalEntradasIgrejaElement = document.getElementById("total-entradas-igreja");
        const totalSaidasIgrejaElement = document.getElementById("total-saidas-igreja");
        
        // Função para formatar valores monetários
        function formatarMoeda(valor) {
            return new Intl.NumberFormat('pt-AO', { style: 'currency', currency: 'AOA' }).format(valor);
        }
        
        // Função para calcular totais
        function calcularTotais(igrejaSelecionada = 'todas') {
            let totalEntradas = 0;
            let totalSaidas = 0;
            let totalEntradasFiltradas = 0;
            let totalSaidasFiltradas = 0;
            
            registros.forEach(registro => {
                if (registro.tipo === 'entrada') {
                    totalEntradas += registro.quantia;
                    if (igrejaSelecionada === 'todas' || registro.igreja === igrejaSelecionada) {
                        totalEntradasFiltradas += registro.quantia;
                    }
                } else {
                    totalSaidas += registro.quantia;
                    if (igrejaSelecionada === 'todas' || registro.igreja === igrejaSelecionada) {
                        totalSaidasFiltradas += registro.quantia;
                    }
                }
            });
            
            const fundoAtual = totalEntradasFiltradas - totalSaidasFiltradas;
            
            // Atualiza os elementos na interface
            totalEntradasElement.textContent = registros.filter(r => r.tipo === 'entrada').length;
            totalSaidasElement.textContent = registros.filter(r => r.tipo === 'saida').length;
            fundoAtualElement.textContent = formatarMoeda(fundoAtual);
            totalEntradasIgrejaElement.textContent = formatarMoeda(totalEntradasFiltradas);
            totalSaidasIgrejaElement.textContent = formatarMoeda(totalSaidasFiltradas);
        }
        
        // Função para renderizar a tabela
        function renderizarTabela(igrejaSelecionada = 'todas') {
            tabelaCorpo.innerHTML = '';
            
            // Filtra os registros conforme a igreja selecionada
            const registrosFiltrados = igrejaSelecionada === 'todas' 
                ? registros 
                : registros.filter(registro => registro.igreja === igrejaSelecionada);
            
            // Ordena por data (mais recente primeiro)
            registrosFiltrados.sort((a, b) => new Date(b.data) - new Date(a.data));
            
            // Adiciona os registros à tabela
            registrosFiltrados.forEach((registro, index) => {
                const tr = document.createElement("tr");
                tr.dataset.id = registro.id;
                tr.innerHTML = `
                    <td>${formatarMoeda(registro.quantia)}</td>
                    <td>${registro.igreja}</td>
                    <td><span class="badge ${registro.tipo === 'entrada' ? 'bg-success' : 'bg-danger'}">${registro.tipo}</span></td>
                    <td>${registro.nota || '-'}</td>
                    <td>${new Date(registro.data).toLocaleDateString('pt-PT')}</td>
                    <td class="text-center">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary btn-editar" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn btn-outline-danger btn-excluir" title="Excluir">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                `;
                tabelaCorpo.appendChild(tr);
            });
            
            // Atualiza contadores
            const totalRegistros = registrosFiltrados.length;
            contador.textContent = `${totalRegistros} registro${totalRegistros !== 1 ? 's' : ''}`;
            infoRegistros.textContent = `Mostrando 1-${totalRegistros} de ${totalRegistros} registros`;
            
            // Atualiza totais
            calcularTotais(igrejaSelecionada);
        }
        
        // Função para gerar ID único
        function gerarId() {
            return Date.now().toString(36) + Math.random().toString(36).substr(2);
        }
        
        // Evento de envio do formulário de cadastro
        formCadastro.addEventListener("submit", function(event) {
            event.preventDefault();
            
            // Cria novo registro
            const novoRegistro = {
                id: gerarId(),
                quantia: parseFloat(document.getElementById("quantia").value),
                igreja: document.getElementById("igreja").value,
                tipo: document.getElementById("tipo").value,
                nota: document.getElementById("nota").value,
                data: document.getElementById("data").value
            };
            
            // Adiciona ao array e salva no localStorage
            registros.push(novoRegistro);
            localStorage.setItem('registrosFinanceiros', JSON.stringify(registros));
            
            // Atualiza a interface
            renderizarTabela(seletorIgreja.value);
            
            // Fecha o modal e limpa o formulário
            const modal = bootstrap.Modal.getInstance(document.getElementById('modalCadastro'));
            modal.hide();
            formCadastro.reset();
        });
        
        // Evento de envio do formulário de edição
        formEdicao.addEventListener("submit", function(event) {
            event.preventDefault();
            
            // Atualiza o registro
            const id = document.getElementById("editar-id").value;
            const index = registros.findIndex(r => r.id === id);
            
            if (index !== -1) {
                registros[index] = {
                    id: id,
                    quantia: parseFloat(document.getElementById("editar-quantia").value),
                    igreja: document.getElementById("editar-igreja").value,
                    tipo: document.getElementById("editar-tipo").value,
                    nota: document.getElementById("editar-nota").value,
                    data: document.getElementById("editar-data").value
                };
                
                // Salva no localStorage
                localStorage.setItem('registrosFinanceiros', JSON.stringify(registros));
                
                // Atualiza a interface
                renderizarTabela(seletorIgreja.value);
                
                // Fecha o modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('modalEdicao'));
                modal.hide();
            }
        });
        
        // Evento de clique nos botões de edição e exclusão (delegação de eventos)
        tabelaCorpo.addEventListener("click", function(event) {
            const btnEditar = event.target.closest(".btn-editar");
            const btnExcluir = event.target.closest(".btn-excluir");
            
            if (btnEditar) {
                const id = btnEditar.closest("tr").dataset.id;
                const registro = registros.find(r => r.id === id);
                
                if (registro) {
                    // Preenche o formulário de edição
                    document.getElementById("editar-id").value = registro.id;
                    document.getElementById("editar-quantia").value = registro.quantia;
                    document.getElementById("editar-igreja").value = registro.igreja;
                    document.getElementById("editar-tipo").value = registro.tipo;
                    document.getElementById("editar-nota").value = registro.nota || '';
                    document.getElementById("editar-data").value = registro.data;
                    
                    // Abre o modal de edição
                    const modal = new bootstrap.Modal(document.getElementById('modalEdicao'));
                    modal.show();
                }
            }
            
            if (btnExcluir) {
                if (confirm("Tem certeza que deseja excluir este registro?")) {
                    const id = btnExcluir.closest("tr").dataset.id;
                    
                    // Remove o registro
                    registros = registros.filter(r => r.id !== id);
                    localStorage.setItem('registrosFinanceiros', JSON.stringify(registros));
                    
                    // Atualiza a interface
                    renderizarTabela(seletorIgreja.value);
                }
            }
        });
        
        // Evento de mudança no seletor de igreja
        seletorIgreja.addEventListener("change", function() {
            renderizarTabela(this.value);
        });
        
        // Ordenação das colunas
        document.querySelectorAll('.sortable').forEach(th => {
            th.addEventListener('click', () => {
                const coluna = th.textContent.trim();
                // Implementar lógica de ordenação aqui
            });
        });
        
        // Inicializa a tabela quando a página carrega
        document.addEventListener("DOMContentLoaded", function() {
            // Define a data atual como padrão no formulário
            document.getElementById("data").valueAsDate = new Date();
            document.getElementById("editar-data").valueAsDate = new Date();
            
            // Renderiza a tabela com os dados iniciais
            renderizarTabela();
        });
    </script>
</body>
</html>