<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnigrejas - Membros</title>
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
        /* Estilo do cartão de membro */
        .cartao-membro {
            width: 350px;
            margin: 0 auto;
            border: 1px solid #0d6efd;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .cartao-header {
            background-color: #0d6efd;
            color: white;
            padding: 0.5rem;
            text-align: center;
        }
        .cartao-body {
            padding: 1rem;
            text-align: center;
        }
        .cartao-foto {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 1rem;
            border: 2px solid #dee2e6;
        }
        @media print {
            body * {
                visibility: hidden;
            }
            .cartao-impressao, .cartao-impressao * {
                visibility: visible;
            }
            .cartao-impressao {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                border: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-success shadow-sm">
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Membros Ativos</span>
                            <span class="info-box-number" id="membros-ativos">
                                250
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-warning shadow-sm">
                            <i class="bi bi-hourglass-split"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Inativos</span>
                            <span class="info-box-number" id="membros-inativos">50</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-primary shadow-sm">
                            <i class="bi bi-person-vcard-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total de Membros</span>
                            <span class="info-box-number" id="total-membros">300</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-info shadow-sm">
                            <i class="bi bi-person-plus-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Adicionar Membro</span>
                            <span class="info-box-number">
                                <button class="btn btn-sm btn-outline-info px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalMembro">
                                    Novo
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Lista de Membros</h3>
                            <span class="badge bg-light text-dark rounded-pill" id="total-registros">2 registros</span>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-auto">
                                    <div class="btn-group" role="group" aria-label="Exportar dados">
                                        <button class="btn btn-light" title="Exportar para CSV">
                                            <i class="bi bi-filetype-csv text-primary"></i>
                                        </button>
                                        <button class="btn btn-light" title="Exportar para Excel">
                                            <i class="bi bi-file-earmark-excel text-success"></i>
                                        </button>
                                        <button class="btn btn-light" title="Exportar para PDF">
                                            <i class="bi bi-file-earmark-pdf text-danger"></i>
                                        </button>
                                        <button class="btn btn-light" title="Imprimir">
                                            <i class="bi bi-printer text-dark"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4 ms-auto">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                                        <input type="text" class="form-control" id="pesquisar-membro" placeholder="Pesquisar...">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="sortable">Nome <i class="bi bi-arrow-down"></i></th>
                                            <th class="sortable">Igreja <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="sortable">Telefone <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="sortable">Cargo <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="sortable">Data de Cadastro <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="sortable">Status <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="text-center">Acções</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabela-membros">
                                        <!-- Dados serão carregados dinamicamente -->
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <p class="text-muted small" id="info-registros">Mostrando 1-2 de 2 registros</p>
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
    </div>

    <!-- Modal para Adicionar Membro -->
    <div class="modal fade" id="modalMembro" tabindex="-1" aria-labelledby="modalMembroLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalMembroLabel">Cadastrar Membro</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="form-membro">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome-membro" placeholder="Nome do membro" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="nascimento-membro">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="telefone-membro" placeholder="Número de telefone" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email-membro" placeholder="Endereço de e-mail">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Igreja</label>
                                <select class="form-select" id="igreja-membro" required>
                                    <option value="" selected disabled>Selecione a igreja...</option>
                                    <option value="Anglicana">Anglicana</option>
                                    <option value="Católica">Católica</option>
                                    <option value="Batista">Batista</option>
                                    <option value="Assembleia de Deus">Assembleia de Deus</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Cargo</label>
                                <select class="form-select" id="cargo-membro">
                                    <option value="" selected disabled>Selecione o cargo...</option>
                                    <option value="Membro">Membro</option>
                                    <option value="Diácono">Diácono</option>
                                    <option value="Pastor">Pastor</option>
                                    <option value="Líder de Ministério">Líder de Ministério</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco-membro" placeholder="Endereço completo">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto-membro" accept="image/*">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="status-membro" required>
                                    <option value="Ativo" selected>Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                    <option value="Visitante">Visitante</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Movemos-te para o futuro</div>
        <strong>
            Omnigrejas &copy;2025&nbsp;
            <a href="https://adminlte.io" class="text-decoration-none">sededigital</a>.
        </strong>
        Todos os direitos reservados
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Função para carregar dados do localStorage
        function carregarDados() {
            const membros = JSON.parse(localStorage.getItem('membros')) || [
                {
                    id: '001',
                    nome: "João Silva",
                    igreja: "Anglicana",
                    telefone: "+244 123 456 789",
                    cargo: "Diácono",
                    dataCadastro: "15/03/2023",
                    dataNascimento: "15/03/1980",
                    status: "Ativo",
                    foto: "https://via.placeholder.com/100"
                },
                {
                    id: '002',
                    nome: "Maria Santos",
                    igreja: "Católica",
                    telefone: "+244 987 654 321",
                    cargo: "Membro",
                    dataCadastro: "22/05/2023",
                    dataNascimento: "22/05/1990",
                    status: "Ativo",
                    foto: "https://via.placeholder.com/100"
                }
            ];
            
            // Atualizar contadores
            const totalMembros = membros.length;
            const membrosAtivos = membros.filter(membro => membro.status === "Ativo").length;
            const membrosInativos = membros.filter(membro => membro.status === "Inativo").length;
            
            document.getElementById('membros-ativos').textContent = membrosAtivos;
            document.getElementById('membros-inativos').textContent = membrosInativos;
            document.getElementById('total-membros').textContent = totalMembros;
            document.getElementById('total-registros').textContent = `${totalMembros} registros`;
            document.getElementById('info-registros').textContent = `Mostrando 1-${totalMembros} de ${totalMembros} registros`;
            
            // Preencher tabela
            const tabela = document.getElementById('tabela-membros');
            tabela.innerHTML = '';
            
            membros.forEach(membro => {
                const tr = document.createElement('tr');
                
                // Determinar a classe do badge com base no status
                let badgeClass = "bg-success";
                if (membro.status === "Inativo") badgeClass = "bg-warning";
                if (membro.status === "Visitante") badgeClass = "bg-info text-dark";
                
                tr.innerHTML = `
                    <td><strong>${membro.nome}</strong></td>
                    <td>${membro.igreja}</td>
                    <td>${membro.telefone}</td>
                    <td>${membro.cargo}</td>
                    <td>${membro.dataCadastro}</td>
                    <td><span class="badge ${badgeClass}">${membro.status}</span></td>
                    <td class="text-center">
                        <div class="btn-group btn-group-sm" role="group">
                            <button class="btn btn-outline-danger" title="Remover" onclick="removerMembro('${membro.id}')">
                                <i class="bi bi-trash"></i>
                            </button>
                            <button class="btn btn-outline-dark" title="Editar" onclick="editarMembro('${membro.id}')">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-outline-primary" title="Imprimir Cartão" onclick="imprimirCartao('${membro.id}')">
                                <i class="bi bi-printer"></i>
                            </button>
                        </div>
                    </td>
                `;
                
                tabela.appendChild(tr);
            });
        }
        
        // Função para imprimir cartão de membro
        function imprimirCartao(idMembro) {
            const membros = JSON.parse(localStorage.getItem('membros')) || [];
            const membro = membros.find(m => m.id === idMembro);
            
            if (membro) {
                // Calcular data de validade (1 ano a partir de hoje)
                const hoje = new Date();
                const validade = new Date(hoje.setFullYear(hoje.getFullYear() + 1));
                const validadeFormatada = validade.toLocaleDateString('pt-PT', {month: '2-digit', year: 'numeric'});
                
                // Criar template do cartão
                const cartaoHTML = `
                    <div class="cartao-membro cartao-impressao">
                        <div class="cartao-header">
                            <h5 class="mb-0">${membro.igreja}</h5>
                        </div>
                        <div class="cartao-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <img src="https://via.placeholder.com/80" alt="Logo" style="height: 50px;">
                                <div class="text-end">
                                    <small class="text-muted d-block">ID: ${membro.id}</small>
                                    <small class="text-muted">Validade: ${validadeFormatada}</small>
                                </div>
                            </div>
                            
                            <img src="${membro.foto}" class="cartao-foto" alt="Foto do Membro">
                            
                            <h4 class="mb-1">${membro.nome}</h4>
                            <p class="text-muted mb-2">${membro.cargo}</p>
                            
                            <div class="d-flex justify-content-between small">
                                <div class="text-start">
                                    <div class="fw-bold">Nascimento</div>
                                    <div>${membro.dataNascimento}</div>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold">Membro desde</div>
                                    <div>${membro.dataCadastro}</div>
                                </div>
                            </div>
                            
                            <hr class="my-2">
                            
                            <div class="text-center small">
                                <div class="fw-bold">Contato</div>
                                <div>${membro.telefone}</div>
                            </div>
                        </div>
                        <div class="cartao-footer text-center py-2 bg-light">
                            <small class="text-muted">Cartão válido somente com documento de identificação</small>
                        </div>
                    </div>
                `;
                
                // Criar janela de impressão
                const janela = window.open('', '_blank');
                janela.document.write(`
                    <!DOCTYPE html>
                    <html>
                        <head>
                            <title>Cartão de Membro - ${membro.nome}</title>
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                            <style>
                                @media print {
                                    body * {
                                        visibility: hidden;
                                    }
                                    .cartao-impressao, .cartao-impressao * {
                                        visibility: visible;
                                    }
                                    .cartao-impressao {
                                        position: absolute;
                                        left: 50%;
                                        top: 50%;
                                        transform: translate(-50%, -50%);
                                        margin: 0;
                                    }
                                }
                                @page {
                                    size: auto;
                                    margin: 0mm;
                                }
                                body {
                                    padding: 20px;
                                }
                            </style>
                        </head>
                        <body onload="window.print(); window.close();">
                            ${cartaoHTML}
                        </body>
                    </html>
                `);
                janela.document.close();
            }
        }
        
        // Função para adicionar novo membro
        document.getElementById('form-membro').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Gerar ID único
            const novoId = '00' + (Math.floor(Math.random() * 900) + 100).toString().slice(-3);
            
            // Obter a foto ou usar placeholder
            let fotoUrl = 'https://via.placeholder.com/100';
            const fotoInput = document.getElementById('foto-membro');
            if (fotoInput.files && fotoInput.files[0]) {
                fotoUrl = URL.createObjectURL(fotoInput.files[0]);
            }
            
            const novoMembro = {
                id: novoId,
                nome: document.getElementById('nome-membro').value,
                igreja: document.getElementById('igreja-membro').value,
                telefone: document.getElementById('telefone-membro').value,
                email: document.getElementById('email-membro').value,
                cargo: document.getElementById('cargo-membro').value || "Membro",
                dataCadastro: new Date().toLocaleDateString('pt-PT'),
                dataNascimento: document.getElementById('nascimento-membro').value ? 
                    new Date(document.getElementById('nascimento-membro').value).toLocaleDateString('pt-PT') : '--/--/----',
                status: document.getElementById('status-membro').value,
                endereco: document.getElementById('endereco-membro').value,
                foto: fotoUrl
            };
            
            const membros = JSON.parse(localStorage.getItem('membros')) || [];
            membros.push(novoMembro);
            localStorage.setItem('membros', JSON.stringify(membros));
            
            // Fechar modal e resetar formulário
            const modal = bootstrap.Modal.getInstance(document.getElementById('modalMembro'));
            modal.hide();
            this.reset();
            
            // Recarregar dados
            carregarDados();
        });
        
        // Função para remover membro
        function removerMembro(idMembro) {
            if (confirm(`Tem certeza que deseja remover este membro?`)) {
                const membros = JSON.parse(localStorage.getItem('membros')) || [];
                const membrosAtualizados = membros.filter(membro => membro.id !== idMembro);
                localStorage.setItem('membros', JSON.stringify(membrosAtualizados));
                carregarDados();
            }
        }
        
        // Função para editar membro
        function editarMembro(idMembro) {
            const membros = JSON.parse(localStorage.getItem('membros')) || [];
            const membro = membros.find(m => m.id === idMembro);
            
            if (membro) {
                // Preencher o modal com os dados do membro
                document.getElementById('nome-membro').value = membro.nome;
                document.getElementById('igreja-membro').value = membro.igreja;
                document.getElementById('telefone-membro').value = membro.telefone;
                document.getElementById('email-membro').value = membro.email || '';
                document.getElementById('cargo-membro').value = membro.cargo || 'Membro';
                document.getElementById('status-membro').value = membro.status || 'Ativo';
                document.getElementById('endereco-membro').value = membro.endereco || '';
                
                if (membro.dataNascimento && membro.dataNascimento !== '--/--/----') {
                    const partesData = membro.dataNascimento.split('/');
                    if (partesData.length === 3) {
                        const dataISO = `${partesData[2]}-${partesData[1]}-${partesData[0]}`;
                        document.getElementById('nascimento-membro').value = dataISO;
                    }
                }
                
                // Abrir o modal
                const modal = new bootstrap.Modal(document.getElementById('modalMembro'));
                modal.show();
                
                // Alterar o comportamento do formulário para edição
                const form = document.getElementById('form-membro');
                const originalSubmit = form.onsubmit;
                
                form.onsubmit = function(e) {
                    e.preventDefault();
                    
                    // Atualizar os dados do membro
                    membro.nome = document.getElementById('nome-membro').value;
                    membro.igreja = document.getElementById('igreja-membro').value;
                    membro.telefone = document.getElementById('telefone-membro').value;
                    membro.email = document.getElementById('email-membro').value;
                    membro.cargo = document.getElementById('cargo-membro').value;
                    membro.status = document.getElementById('status-membro').value;
                    membro.endereco = document.getElementById('endereco-membro').value;
                    membro.dataNascimento = document.getElementById('nascimento-membro').value ? 
                        new Date(document.getElementById('nascimento-membro').value).toLocaleDateString('pt-PT') : '--/--/----';
                    
                    const fotoInput = document.getElementById('foto-membro');
                    if (fotoInput.files && fotoInput.files[0]) {
                        membro.foto = URL.createObjectURL(fotoInput.files[0]);
                    }
                    
                    localStorage.setItem('membros', JSON.stringify(membros));
                    modal.hide();
                    form.reset();
                    carregarDados();
                    
                    // Restaurar o comportamento padrão do formulário
                    form.onsubmit = originalSubmit;
                };
            }
        }
        
        // Função para pesquisar membros
        document.getElementById('pesquisar-membro').addEventListener('input', function(e) {
            const termo = e.target.value.toLowerCase();
            const linhas = document.querySelectorAll('#tabela-membros tr');
            
            linhas.forEach(linha => {
                const textoLinha = linha.textContent.toLowerCase();
                linha.style.display = textoLinha.includes(termo) ? '' : 'none';
            });
        });
        
        // Carregar dados quando a página é carregada
        document.addEventListener('DOMContentLoaded', carregarDados);
    </script>
</body>
</html>