<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnigrejas - Obreiros</title>
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
        #tabela-obreiros tr td:first-child {
            font-weight: 500;
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
                    <div class="col-sm-6"><h3 class="mb-0">Obreiros</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Obreiros</li>
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
                    <!-- Card de Obreiros -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon text-bg-primary shadow-sm">
                                <i class="bi bi-tags-fill"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text d-flex justify-content-between align-items-center">
                                    Obreiros
                                    <button class="btn btn-sm btn-outline-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modalObreiro">
                                        Novo
                                    </button>
                                </span>
                                <span class="info-box-number" id="total-obreiros">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Tabela de Obreiros -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <h3 class="card-title mb-0">Obreiros Cadastrados</h3>
                                <span class="badge bg-light text-dark rounded-pill" id="contador-registros">0 registros</span>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-auto">
                                        <div class="btn-group" role="group" aria-label="Exportar dados">
                                            <button class="btn btn-light" title="Exportar para CSV" id="btn-exportar-csv">
                                                <i class="bi bi-filetype-csv text-primary"></i>
                                            </button>
                                            <button class="btn btn-light" title="Exportar para Excel" id="btn-exportar-excel">
                                                <i class="bi bi-file-earmark-excel text-success"></i>
                                            </button>
                                            <button class="btn btn-light" title="Exportar para PDF" id="btn-exportar-pdf">
                                                <i class="bi bi-file-earmark-pdf text-danger"></i>
                                            </button>
                                            <button class="btn btn-light" title="Imprimir" id="btn-imprimir">
                                                <i class="bi bi-printer text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ms-auto">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" id="pesquisar-obreiros" placeholder="Pesquisar...">
                                        </div>
                                    </div>
                                </div>
                
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sortable">Obreiros <i class="bi bi-arrow-down"></i></th>
                                                <th class="sortable">Igreja Pertencente <i class="bi bi-arrow-up-down text-muted"></i></th>
                                                <th class="text-center">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabela-obreiros">
                                            <!-- Dados serão carregados dinamicamente -->
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
                                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                                </li>
                                                <li class="page-item active" aria-current="page">
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
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

    <!-- Modal para Cadastrar/Editar Obreiro -->
    <div class="modal fade" id="modalObreiro" tabindex="-1" aria-labelledby="modalObreiroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalObreiroLabel">Cadastrar Novo Obreiro</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formObreiro">
                    <input type="hidden" id="obreiroid">
                    <div class="modal-body">
                        <!-- Nome -->
                        <div class="mb-3">
                            <label for="nomeObreiro" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nomeObreiro" placeholder="Digite o nome completo" required>
                        </div>

                        <!-- Igreja pertencente -->
                        <div class="mb-3">
                            <label for="igrejaObreiro" class="form-label">Igreja pertencente</label>
                            <select class="form-select" id="igrejaObreiro" required>
                                <option value="" selected disabled>Selecione a igreja</option>
                                <option>Igreja Central</option>
                                <option>Igreja Esperança</option>
                                <option>Igreja Vida Nova</option>
                                <option>Igreja Batista</option>
                                <option>Igreja Pentecostal</option>
                            </select>
                        </div>

                        <!-- Telefone -->
                        <div class="mb-3">
                            <label for="telefoneObreiro" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="telefoneObreiro" placeholder="Digite o telefone">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="emailObreiro" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailObreiro" placeholder="Digite o email">
                        </div>

                        <!-- Cargo -->
                        <div class="mb-3">
                            <label for="cargoObreiro" class="form-label">Cargo/Função</label>
                            <input type="text" class="form-control" id="cargoObreiro" placeholder="Digite o cargo/função">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Banco de dados local para obreiros
        let obreiros = JSON.parse(localStorage.getItem('obreiros')) || [
            {
                id: '1',
                nome: 'Adão Magalhães',
                igreja: 'Catolica',
                telefone: '+244 123 456 789',
                email: 'adao@example.com',
                cargo: 'Diácono'
            },
            {
                id: '2',
                nome: 'Seniamara Benedito',
                igreja: 'Pentecostal',
                telefone: '+244 987 654 321',
                email: 'seniamara@example.com',
                cargo: 'Missionária'
            }
        ];

        // Elementos da interface
        const formObreiro = document.getElementById("formObreiro");
        const tabelaObreiros = document.getElementById("tabela-obreiros");
        const contadorRegistros = document.getElementById("contador-registros");
        const totalObreirosElement = document.getElementById("total-obreiros");
        const infoRegistros = document.getElementById("info-registros");
        const pesquisarObreiros = document.getElementById("pesquisar-obreiros");

        // Função para gerar ID único
        function gerarId() {
            return Date.now().toString(36) + Math.random().toString(36).substr(2);
        }

        // Função para renderizar a tabela de obreiros
        function renderizarTabela() {
            tabelaObreiros.innerHTML = '';
            
            // Ordena obreiros por nome
            obreiros.sort((a, b) => a.nome.localeCompare(b.nome));
            
            // Adiciona cada obreiro à tabela
            obreiros.forEach(obreiro => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${obreiro.nome}</td>
                    <td>${obreiro.igreja}</td>
                    <td class="text-center">
                        <div class="btn-group btn-group-sm" role="group">
                            <button class="btn btn-outline-primary btn-editar" title="Editar" data-id="${obreiro.id}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-outline-danger btn-excluir" title="Eliminar" data-id="${obreiro.id}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                `;
                tabelaObreiros.appendChild(tr);
            });
            
            // Atualiza contadores
            const total = obreiros.length;
            totalObreirosElement.textContent = total;
            contadorRegistros.textContent = `${total} registro${total !== 1 ? 's' : ''}`;
            infoRegistros.textContent = `Mostrando 1-${total} de ${total} registros`;
            
            // Salva no localStorage
            localStorage.setItem('obreiros', JSON.stringify(obreiros));
        }

        // Evento de envio do formulário (cadastro/edição)
        formObreiro.addEventListener("submit", function(e) {
            e.preventDefault();
            
            const id = document.getElementById("obreiroid").value;
            const nome = document.getElementById("nomeObreiro").value;
            const igreja = document.getElementById("igrejaObreiro").value;
            const telefone = document.getElementById("telefoneObreiro").value;
            const email = document.getElementById("emailObreiro").value;
            const cargo = document.getElementById("cargoObreiro").value;
            
            if (id) {
                // Edição de obreiro existente
                const index = obreiros.findIndex(o => o.id === id);
                if (index !== -1) {
                    obreiros[index] = { id, nome, igreja, telefone, email, cargo };
                }
            } else {
                // Cadastro de novo obreiro
                const novoId = gerarId();
                obreiros.push({ id: novoId, nome, igreja, telefone, email, cargo });
            }
            
            // Atualiza a tabela e fecha o modal
            renderizarTabela();
            const modal = bootstrap.Modal.getInstance(document.getElementById('modalObreiro'));
            modal.hide();
            formObreiro.reset();
            document.getElementById("obreiroid").value = '';
        });

        // Evento para editar obreiro
        tabelaObreiros.addEventListener("click", function(e) {
            const btnEditar = e.target.closest(".btn-editar");
            const btnExcluir = e.target.closest(".btn-excluir");
            
            if (btnEditar) {
                const id = btnEditar.getAttribute("data-id");
                const obreiro = obreiros.find(o => o.id === id);
                
                if (obreiro) {
                    // Preenche o formulário com os dados do obreiro
                    document.getElementById("obreiroid").value = obreiro.id;
                    document.getElementById("nomeObreiro").value = obreiro.nome;
                    document.getElementById("igrejaObreiro").value = obreiro.igreja;
                    document.getElementById("telefoneObreiro").value = obreiro.telefone || '';
                    document.getElementById("emailObreiro").value = obreiro.email || '';
                    document.getElementById("cargoObreiro").value = obreiro.cargo || '';
                    
                    // Altera o título do modal
                    document.getElementById("modalObreiroLabel").textContent = "Editar Obreiro";
                    
                    // Abre o modal
                    const modal = new bootstrap.Modal(document.getElementById('modalObreiro'));
                    modal.show();
                }
            }
            
            if (btnExcluir) {
                if (confirm("Tem certeza que deseja excluir este obreiro?")) {
                    const id = btnExcluir.getAttribute("data-id");
                    obreiros = obreiros.filter(o => o.id !== id);
                    renderizarTabela();
                }
            }
        });

        // Evento para pesquisar obreiros
        pesquisarObreiros.addEventListener("input", function() {
            const termo = this.value.toLowerCase();
            const linhas = tabelaObreiros.querySelectorAll("tr");
            
            let visiveis = 0;
            linhas.forEach(linha => {
                const textoLinha = linha.textContent.toLowerCase();
                if (textoLinha.includes(termo)) {
                    linha.style.display = "";
                    visiveis++;
                } else {
                    linha.style.display = "none";
                }
            });
            
            // Atualiza contador de registros visíveis
            infoRegistros.textContent = `Mostrando 1-${visiveis} de ${visiveis} registros`;
        });

        // Evento para resetar o modal ao fechar
        document.getElementById('modalObreiro').addEventListener('hidden.bs.modal', function () {
            formObreiro.reset();
            document.getElementById("obreiroid").value = '';
            document.getElementById("modalObreiroLabel").textContent = "Cadastrar Novo Obreiro";
        });

        // Funções de exportação (simuladas)
        document.getElementById("btn-exportar-csv").addEventListener("click", function() {
            alert("Exportando para CSV...");
        });
        
        document.getElementById("btn-exportar-excel").addEventListener("click", function() {
            alert("Exportando para Excel...");
        });
        
        document.getElementById("btn-exportar-pdf").addEventListener("click", function() {
            alert("Exportando para PDF...");
        });
        
        document.getElementById("btn-imprimir").addEventListener("click", function() {
            window.print();
        });

        // Inicializa a tabela quando a página carrega
        document.addEventListener("DOMContentLoaded", function() {
            renderizarTabela();
        });
    </script>
</body>
</html>