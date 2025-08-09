
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Gestão de preços de igrejas</h3></div>
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
         
            <!-- /.row -->
            <!--begin::Row-->
           
           <!----tabela--->
            <div class="row mt-4">
              <div class="col-12">
                <div class="card shadow-sm">
                  <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalNovaOperacao">
  Nova Operação
</button>

                    <h3 class="card-title mb-0">Lista de planos</h3>
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
                            <th class="sortable">Plano <i class="bi bi-arrow-down"></i></th>
                            <th class="sortable">Preço <i class="bi bi-arrow-up-down text-muted"></i></th>
                            <th class="sortable">Tempo de Activação <i class="bi bi-arrow-up-down text-muted"></i></th>
                            <th class="sortable">Data <i class="bi bi-arrow-up-down text-muted"></i></th>
                            <th class="text-center">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><strong>Básico</strong></td>
                            <td>Kz 15.000</td>
                            <td>2 meses e 99 semanas</td>
                            <td>03/11/2022 14:59</td>
                            <td class="text-center">
                              <div class="btn-group btn-group-sm" role="group">
                                <button class="btn btn-outline-primary" title="Editar">
                                  <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Apagar">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td><strong>Premium</strong></td>
                            <td>Kz 35.000</td>
                            <td>3 meses</td>
                            <td>01/08/2022 11:46</td>
                            <td class="text-center">
                              <div class="btn-group btn-group-sm" role="group">
                                <button class="btn btn-outline-primary" title="Editar">
                                  <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Apagar">
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
          
          
        <!---modal-->

        <!-- Modal Nova Operação -->
<div class="modal fade" id="modalNovaOperacao" tabindex="-1" aria-labelledby="modalNovaOperacaoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form>
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalNovaOperacaoLabel">Cadastrar Nova Operação</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="plano" class="form-label">Plano</label>
              <input type="text" class="form-control" id="plano" placeholder="Ex: Básico">
            </div>
            <div class="col-md-6">
              <label for="preco" class="form-label">Preço</label>
              <input type="text" class="form-control" id="preco" placeholder="Ex: Kz 15.000">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-12">
              <label for="tempo" class="form-label">Tempo de Activação</label>
              <input type="text" class="form-control" id="tempo" placeholder="Ex: 2 meses e 99 semanas">
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
     
     