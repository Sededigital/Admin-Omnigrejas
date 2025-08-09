
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Departamentos</h3></div>
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
                      <span class="info-box-text">Igrejas</span>
                      <span class="info-box-number">310</span>
                    </div>
                  </div>
                </div>
              
                <!-- Criar Aliança -->
                <div class="col-12 col-sm-6 col-md-6">
                  <div class="info-box">
                    <span class="info-box-icon text-bg-primary shadow-sm">
                        <i class="nav-icon bi bi-diagram-3-fill"></i>

                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text d-flex justify-content-between align-items-center">
                        Departamentos
                          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalDepartamento">
                            Novo
                          </button>
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
                  <h3 class="card-title mb-0">Lista dos Departamentos</h3>
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
                    <div class="col-md-4 ms-auto">
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Pesquisar...">
                      </div>
                    </div>
                  </div>
          
                  <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                      <thead class="table-light">
                        <tr>
                          <th class="sortable">Departamento <i class="bi bi-arrow-up-down text-muted"></i></th>
                          <th class="sortable">Cargo <i class="bi bi-arrow-up-down text-muted"></i></th>
                          <th class="sortable">igreja pertencente <i class="bi bi-arrow-up-down text-muted"></i></th>
                          <th class="text-center">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Financeiro</td>
                          <td>Tesouraria</td>
                          <td>Catolica</td>

                          <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                              <button class="btn btn-outline-primary" title="Editar">
                                <i class="bi bi-pencil"></i>
                              </button>
                              <button class="btn btn-outline-danger" title="Eliminar">
                                <i class="bi bi-trash"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                            <td>Comunicação e Imagem</td>
                            <td>Marketing</td>
                            <td>Pentecostal</td>
  
                            <td class="text-center">
                              <div class="btn-group btn-group-sm" role="group">
                                <button class="btn btn-outline-primary" title="Editar">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Eliminar">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
          
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <p class="text-muted small">Mostrando 1-2 de 2 registros</p>
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

          
            <!-- Modal para adicionar novo departamento -->

            <div class="modal fade" id="modalDepartamento" tabindex="-1" aria-labelledby="modalDepartamentoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form>
        <div class="modal-header bg-dark text-white">
          <h5 class="modal-title" id="modalDepartamentoLabel">Cadastrar Novo Departamento</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="departamento" class="form-label">Departamento</label>
              <input type="text" class="form-control" id="departamento" placeholder="Ex: Comunicação" required>
            </div>
            <div class="col-md-6">
              <label for="cargo" class="form-label">Cargo</label>
              <input type="text" class="form-control" id="cargo" placeholder="Ex: Marketing" required>
            </div>
            <div class="col-md-6">
              <label for="igreja" class="form-label">Igreja pertencente</label>
              <select class="form-select" id="igreja" required>
                <option selected disabled>Selecione uma igreja</option>
                <option value="catolica">Católica</option>
                <option value="pentecostal">Pentecostal</option>
                <option value="adventista">Adventista</option>
                <option value="metodista">Metodista</option>
                <!-- Adicione mais conforme necessário -->
              </select>
            </div>
           
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

          

          
          
         
           
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
   