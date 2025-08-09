
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Solicitações</h3></div>
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
            
              <!-- Categorias -->
              <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box">
                  <span class="info-box-icon text-bg-primary shadow-sm">
                    <i class="bi bi-tags-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text d-flex justify-content-between align-items-center">
                     Usuários
                    </span>
                    <span class="info-box-number">5</span>
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
                  <h3 class="card-title mb-0">Pedidos Registrados</h3>
                  <span class="badge bg-light text-dark rounded-pill">2 registros</span>
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
                    <div class="col-md-3">
                      <select id="filtroStatus" class="form-select">
                        <option value="Todos">Todos</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Terminado">Terminado</option>
                        <option value="Outro">Outro</option>
                      </select>
                    </div>
                    <div class="col-md-4 ms-auto">
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Pesquisar...">
                      </div>
                    </div>
                  </div>
          
                  <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle" id="tabelaPedidos">
                      <thead class="table-light">
                        <tr>
                          <th>Nome</th>
                          <th>Usuário</th>
                          <th>Produto</th>
                          <th>Quantidade</th>
                          <th>Status</th>
                          <th>Preço a Pagar</th>
                          <th class="text-center">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr data-status="Em andamento">
                          <td>Adão Magalhães</td>
                          <td>adao123</td>
                          <td>Bíblia Sagrada</td>
                          <td>
                            <div class="progress" style="height: 20px;">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 60%;" data-quantidade="60">60%</div>
                            </div>
                          </td>
                          <td><span class="badge bg-warning text-dark">Em andamento</span></td>
                          <td>Kz 5.000</td>
                          <td class="text-center">
                            <button class="btn btn-outline-info btn-sm" title="Ver">
                              <i class="bi bi-eye"></i>
                            </button>
                          </td>
                        </tr>
                        <tr data-status="Terminado">
                          <td>Seniamara Benedito</td>
                          <td>sbenedito</td>
                          <td>Manual de Doutrina</td>
                          <td>
                            <div class="progress" style="height: 20px;">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" data-quantidade="100">100%</div>
                            </div>
                          </td>
                          <td><span class="badge bg-success">Terminado</span></td>
                          <td>Kz 3.500</td>
                          <td class="text-center">
                            <button class="btn btn-outline-info btn-sm" title="Ver">
                              <i class="bi bi-eye"></i>
                            </button>
                          </td>
                        </tr>
                        <tr data-status="Outro">
                          <td>Joaquim Langa</td>
                          <td>joaquim</td>
                          <td>Camisa Gospel</td>
                          <td>
                            <div class="progress" style="height: 20px;">
                              <div class="progress-bar bg-secondary" role="progressbar" style="width: 20%;" data-quantidade="20">20%</div>
                            </div>
                          </td>
                          <td><span class="badge bg-secondary">Outro</span></td>
                          <td>Kz 7.000</td>
                          <td class="text-center">
                            <button class="btn btn-outline-info btn-sm" title="Ver">
                              <i class="bi bi-eye"></i>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
          
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <p class="text-muted small">Mostrando 1-3 de 3 registros</p>
                    </div>
                    <div class="col-md-6">
                      <nav aria-label="Navegação de página">
                        <ul class="pagination pagination-sm justify-content-end">
                          <li class="page-item disabled"><a class="page-link">Anterior</a></li>
                          <li class="page-item active"><a class="page-link">1</a></li>
                          <li class="page-item disabled"><a class="page-link">Próximo</a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <script>
            document.getElementById('filtroStatus').addEventListener('change', function () {
              const statusSelecionado = this.value;
              const linhas = document.querySelectorAll('#tabelaPedidos tbody tr');
              linhas.forEach(linha => {
                const statusLinha = linha.getAttribute('data-status');
                linha.style.display = (statusSelecionado === 'Todos' || statusSelecionado === statusLinha) ? '' : 'none';
              });
            });
          </script>
          
          
          
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
           
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
     
  