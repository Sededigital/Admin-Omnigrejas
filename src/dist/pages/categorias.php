<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Igrejas</title>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .info-box-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
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
                    <div class="col-sm-6"><h3 class="mb-0">Igrejas</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contacto</li>
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
                    <!-- Igrejas Ativas -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon text-bg-success shadow-sm">
                                <i class="bi bi-check-circle-fill"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Igrejas Ativas</span>
                                <span class="info-box-number">310</span>
                            </div>
                        </div>
                    </div>
                
                    <!-- Categorias -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon text-bg-primary shadow-sm">
                                <i class="bi bi-tags-fill"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text d-flex justify-content-between align-items-center">
                                    Categorias
                                    <button class="btn btn-sm btn-outline-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modalCategoria">
                                        Novo
                                    </button>
                                </span>
                                <span class="info-box-number" id="totalCategorias">5</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- /.row -->
                <!--begin::Row-->
               
               <!----tabela--->
               <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Categorias de Igrejas</h3>
                            <span class="badge bg-light text-dark rounded-pill" id="contadorRegistros">2 registros</span>
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
                                        <input type="text" class="form-control" id="pesquisaCategoria" placeholder="Pesquisar...">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="sortable">Categoria <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="sortable">Data <i class="bi bi-arrow-up-down text-muted"></i></th>
                                            <th class="text-center">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelaCategorias">
                                        <!-- Dados serão carregados via JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                    
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <p class="text-muted small" id="infoRegistros">Mostrando 1-2 de 2 registros</p>
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
    </main>

    <div class="modal fade" id="modalCategoria" tabindex="-1" aria-labelledby="modalCategoriaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCategoriaLabel">Nova Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <form id="formCategoria">
                        <div class="mb-3">
                            <label for="nomeCategoria" class="form-label">Categoria</label>
                            <input type="text" class="form-control" id="nomeCategoria" placeholder="Digite a categoria" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnSalvarCategoria">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chave para o localStorage
            const STORAGE_KEY = 'categoriasIgrejas';
            
            // Elementos do DOM
            const formCategoria = document.getElementById('formCategoria');
            const nomeCategoria = document.getElementById('nomeCategoria');
            const btnSalvarCategoria = document.getElementById('btnSalvarCategoria');
            const tabelaCategorias = document.getElementById('tabelaCategorias');
            const totalCategorias = document.getElementById('totalCategorias');
            const contadorRegistros = document.getElementById('contadorRegistros');
            const infoRegistros = document.getElementById('infoRegistros');
            const pesquisaCategoria = document.getElementById('pesquisaCategoria');
            
            // Carregar categorias do localStorage ou inicializar com dados padrão
            let categorias = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [
                { id: Date.now() - 1, categoria: 'CICA', data: '03/11/2022 14:59' },
                { id: Date.now() - 2, categoria: 'CONICA', data: '01/08/2022 11:46' }
            ];
            
            // Salvar categorias no localStorage
            function salvarCategorias() {
                localStorage.setItem(STORAGE_KEY, JSON.stringify(categorias));
                atualizarTabela();
            }
            
            // Atualizar a tabela com as categorias
            function atualizarTabela() {
                tabelaCategorias.innerHTML = '';
                const termoPesquisa = pesquisaCategoria.value.toLowerCase();
                const categoriasFiltradas = categorias.filter(cat => 
                    cat.categoria.toLowerCase().includes(termoPesquisa)
                );
                
                categoriasFiltradas.forEach(categoria => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${categoria.categoria}</td>
                        <td>${categoria.data}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <button class="btn btn-outline-primary btn-editar" title="Editar" data-id="${categoria.id}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-outline-danger btn-excluir" title="Eliminar" data-id="${categoria.id}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    `;
                    tabelaCategorias.appendChild(tr);
                });
                
                // Atualizar contadores
                const total = categorias.length;
                const exibindo = categoriasFiltradas.length;
                totalCategorias.textContent = total;
                contadorRegistros.textContent = `${exibindo} registro${exibindo !== 1 ? 's' : ''}`;
                infoRegistros.textContent = `Mostrando 1-${exibindo} de ${exibindo} registro${exibindo !== 1 ? 's' : ''}`;
            }
            
            // Adicionar nova categoria
            function adicionarCategoria() {
                const novaCategoria = {
                    id: Date.now(),
                    categoria: nomeCategoria.value.trim(),
                    data: new Date().toLocaleString('pt-BR')
                };
                
                categorias.unshift(novaCategoria);
                salvarCategorias();
                nomeCategoria.value = '';
                
                // Fechar o modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('modalCategoria'));
                modal.hide();
            }
            
            // Editar categoria
            function editarCategoria(id) {
                const categoria = categorias.find(cat => cat.id == id);
                if (categoria) {
                    nomeCategoria.value = categoria.categoria;
                    
                    // Alterar o modal para edição
                    document.getElementById('modalCategoriaLabel').textContent = 'Editar Categoria';
                    btnSalvarCategoria.textContent = 'Atualizar';
                    btnSalvarCategoria.onclick = function() {
                        categoria.categoria = nomeCategoria.value.trim();
                        categoria.data = new Date().toLocaleString('pt-BR');
                        salvarCategorias();
                        
                        // Resetar o modal
                        document.getElementById('modalCategoriaLabel').textContent = 'Nova Categoria';
                        btnSalvarCategoria.textContent = 'Salvar';
                        btnSalvarCategoria.onclick = adicionarCategoria;
                        
                        const modal = bootstrap.Modal.getInstance(document.getElementById('modalCategoria'));
                        modal.hide();
                    };
                    
                    const modal = new bootstrap.Modal(document.getElementById('modalCategoria'));
                    modal.show();
                }
            }
            
            // Excluir categoria
            function excluirCategoria(id) {
                if (confirm('Tem certeza que deseja excluir esta categoria?')) {
                    categorias = categorias.filter(cat => cat.id != id);
                    salvarCategorias();
                }
            }
            
            // Event Listeners
            btnSalvarCategoria.addEventListener('click', adicionarCategoria);
            
            // Delegar eventos para os botões de editar/excluir
            tabelaCategorias.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-editar') || e.target.parentElement.classList.contains('btn-editar')) {
                    const btn = e.target.classList.contains('btn-editar') ? e.target : e.target.parentElement;
                    editarCategoria(btn.dataset.id);
                }
                
                if (e.target.classList.contains('btn-excluir') || e.target.parentElement.classList.contains('btn-excluir')) {
                    const btn = e.target.classList.contains('btn-excluir') ? e.target : e.target.parentElement;
                    excluirCategoria(btn.dataset.id);
                }
            });
            
            // Pesquisa em tempo real
            pesquisaCategoria.addEventListener('input', atualizarTabela);
            
            // Inicializar a tabela
            salvarCategorias();
        });
    </script>
</body>
</html>