<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnigrejas</title>
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
    </style>
</head>
<body>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-success shadow-sm">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Igrejas Ativas</span>
                            <span class="info-box-number" id="igrejas-ativas">
                                310
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
                            <span class="info-box-text">Ativação Pendente</span>
                            <span class="info-box-number" id="ativacao-pendente">100</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-primary shadow-sm">
                            <i class="bi bi-building-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total de Igrejas</span>
                            <span class="info-box-number" id="total-igrejas">410</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-info shadow-sm">
                            <i class="bi bi-plus-circle-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Criar Igrejas</span>
                            <span class="info-box-number">
                                <button class="btn btn-sm btn-outline-info px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalIgreja">
                                    Nova
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
                            <h3 class="card-title mb-0">Lista de igrejas</h3>
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
                                        <input type="text" class="form-control" id="pesquisar-igreja" placeholder="Pesquisar...">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="sortable">Nome Da Igreja <i class="bi bi-arrow-down"></i></th>
                                            <th class="sortable">Nome do Usuário <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="sortable">E-mail <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="sortable">Categoria <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="sortable">Tempo de Activação <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="sortable">Data <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="text-center">Acções</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabela-igrejas">
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

    <div class="modal fade" id="modalIgreja" tabindex="-1" aria-labelledby="modalIgrejaLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalIgrejaLabel">Cadastrar Igreja</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="form-igreja">
                    <div class="modal-body">
                        <!-- Nome, NIF, Diário da República -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome-igreja" placeholder="Nome da Igreja" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">NIF</label>
                                <input type="text" class="form-control" id="nif-igreja" placeholder="Número de identificação fiscal" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Diário da República</label>
                                <input type="file" class="form-control" id="diario-republica">
                            </div>
                        </div>

                        <!-- Sigla, Contato, Localização -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Sigla</label>
                                <input type="text" class="form-control" id="sigla-igreja" placeholder="Sigla da Igreja">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Contato</label>
                                <input type="text" class="form-control" id="contato-igreja" placeholder="Telefone ou email" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Localização</label>
                                <input type="text" class="form-control" id="localizacao-igreja" placeholder="Endereço">
                            </div>
                        </div>

                        <!-- Tempo de Ativação, Categoria, Aliança -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Tempo de Ativação</label>
                                <select class="form-select" id="tempo-ativacao" required>
                                    <option value="" selected disabled>Escolher tempo...</option>
                                    <option value="1 ano">1 ano</option>
                                    <option value="2 anos">2 anos</option>
                                    <option value="3 anos">3 anos</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Categoria</label>
                                <select class="form-select" id="categoria-igreja" required>
                                    <option value="" selected disabled>Escolher categoria...</option>
                                    <option value="CICA">CICA</option>
                                    <option value="CONICA">CONICA</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Aliança</label>
                                <select class="form-select" id="alianca-igreja">
                                    <option value="" selected disabled>Escolher aliança...</option>
                                    <option value="Aliança 1">Aliança 1</option>
                                    <option value="Aliança 2">Aliança 2</option>
                                </select>
                            </div>
                        </div>

                        <!-- Foto, Logo -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto-igreja">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo-igreja">
                            </div>
                        </div>

                        <!-- Sobre, Descrição -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Sobre</label>
                                <textarea class="form-control" id="sobre-igreja" rows="4" placeholder="Informações sobre a igreja..."></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Descrição</label>
                                <textarea class="form-control" id="descricao-igreja" rows="4" placeholder="Descrição detalhada..."></textarea>
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
            const igrejas = JSON.parse(localStorage.getItem('igrejas')) || [
                {
                    nome: "Anglicana",
                    usuario: "Admin Omnigrejas",
                    email: "admin@gmail.com",
                    categoria: "CICA",
                    tempoAtivacao: "Plano B-2 mês e 99 semanas",
                    data: "03/11/2022 14:59",
                    status: "ativo"
                },
                {
                    nome: "Catolica",
                    usuario: "Mechack final 2",
                    email: "mechackantonio@gmail.com",
                    categoria: "CONICA",
                    tempoAtivacao: "3 mês",
                    data: "01/08/2022 11:46",
                    status: "pendente"
                }
            ];
            
            // Atualizar contadores
            const totalIgrejas = igrejas.length;
            const igrejasAtivas = igrejas.filter(igreja => igreja.status === "ativo").length;
            const ativacaoPendente = igrejas.filter(igreja => igreja.status === "pendente").length;
            
            document.getElementById('igrejas-ativas').textContent = igrejasAtivas;
            document.getElementById('ativacao-pendente').textContent = ativacaoPendente;
            document.getElementById('total-igrejas').textContent = totalIgrejas;
            document.getElementById('total-registros').textContent = `${totalIgrejas} registros`;
            document.getElementById('info-registros').textContent = `Mostrando 1-${totalIgrejas} de ${totalIgrejas} registros`;
            
            // Preencher tabela
            const tabela = document.getElementById('tabela-igrejas');
            tabela.innerHTML = '';
            
            igrejas.forEach(igreja => {
                const tr = document.createElement('tr');
                
                tr.innerHTML = `
                    <td><strong>${igreja.nome}</strong></td>
                    <td>${igreja.usuario}</td>
                    <td><a href="mailto:${igreja.email}">${igreja.email}</a></td>
                    <td><span class="badge bg-info text-dark">${igreja.categoria}</span></td>
                    <td>${igreja.tempoAtivacao}</td>
                    <td>${igreja.data}</td>
                    <td class="text-center">
                        <div class="btn-group btn-group-sm" role="group">
                            ${igreja.status === "ativo" ? 
                                '<button class="btn btn-outline-danger" title="Desativar" onclick="alterarStatus(\'' + igreja.nome + '\', \'pendente\')"><i class="bi bi-power"></i></button>' : 
                                '<button class="btn btn-outline-success" title="Ativar" onclick="alterarStatus(\'' + igreja.nome + '\', \'ativo\')"><i class="bi bi-check-circle"></i></button>'}
                            <button class="btn btn-outline-dark" title="Ver detalhes"><i class="bi bi-eye"></i></button>
                        </div>
                    </td>
                `;
                
                tabela.appendChild(tr);
            });
        }
        
        // Função para alterar status da igreja
        function alterarStatus(nomeIgreja, novoStatus) {
            const igrejas = JSON.parse(localStorage.getItem('igrejas')) || [];
            const igrejaIndex = igrejas.findIndex(igreja => igreja.nome === nomeIgreja);
            
            if (igrejaIndex !== -1) {
                igrejas[igrejaIndex].status = novoStatus;
                localStorage.setItem('igrejas', JSON.stringify(igrejas));
                carregarDados();
            }
        }
        
        // Função para cadastrar nova igreja
        document.getElementById('form-igreja').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nomeIgreja = document.getElementById('nome-igreja').value;
            const contatoIgreja = document.getElementById('contato-igreja').value;
            const categoriaIgreja = document.getElementById('categoria-igreja').value;
            const tempoAtivacao = document.getElementById('tempo-ativacao').value;
            
            const novaIgreja = {
                nome: nomeIgreja,
                usuario: "Novo Usuário", // Pode ser alterado conforme necessidade
                email: contatoIgreja.includes('@') ? contatoIgreja : "sememail@example.com",
                categoria: categoriaIgreja,
                tempoAtivacao: tempoAtivacao,
                data: new Date().toLocaleString('pt-PT'),
                status: "pendente"
            };
            
            const igrejas = JSON.parse(localStorage.getItem('igrejas')) || [];
            igrejas.push(novaIgreja);
            localStorage.setItem('igrejas', JSON.stringify(igrejas));
            
            // Fechar modal e resetar formulário
            const modal = bootstrap.Modal.getInstance(document.getElementById('modalIgreja'));
            modal.hide();
            this.reset();
            
            // Recarregar dados
            carregarDados();
        });
        
        // Função para pesquisar igrejas
        document.getElementById('pesquisar-igreja').addEventListener('input', function(e) {
            const termo = e.target.value.toLowerCase();
            const linhas = document.querySelectorAll('#tabela-igrejas tr');
            
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