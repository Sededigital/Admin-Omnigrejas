
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Institucional</h3></div>
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

        <div class="container">
            <div class="row">
                <!-- Liderança -->
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-3">
                  <div class="info-box py-2">
                    <span class="info-box-icon text-bg-primary shadow-sm">
                      <i class="bi bi-person-badge-fill"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Liderança</span>
                      <span class="info-box-number">
                        <button class="btn btn-sm btn-outline-primary px-3 mt-1">Novo</button>
                      </span>
                    </div>
                  </div>
                </div>
              
                <!-- Programação -->
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-3">
                  <div class="info-box py-2">
                    <span class="info-box-icon text-bg-success shadow-sm">
                      <i class="bi bi-calendar2-week-fill"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Programação</span>
                      <span class="info-box-number">
                        <button class="btn btn-sm btn-outline-success px-3 mt-1">Novo</button>
                      </span>
                    </div>
                  </div>
                </div>
              
                <!-- História -->
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-3">
                  <div class="info-box py-2">
                    <span class="info-box-icon text-bg-warning shadow-sm">
                      <i class="bi bi-journal-bookmark-fill"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">História</span>
                      <span class="info-box-number">
                        <button class="btn btn-sm btn-outline-warning px-3 mt-1">Novo</button>
                      </span>
                    </div>
                  </div>
                </div>
              
                <!-- Confissão da Fé -->
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-3">
                  <div class="info-box py-2">
                    <span class="info-box-icon text-bg-danger shadow-sm">
                      <i class="bi-journal-richtext"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Confissão da Fé</span>
                      <span class="info-box-number">
                        <button class="btn btn-sm btn-outline-danger px-3 mt-1">Novo</button>
                      </span>
                    </div>
                  </div>
                </div>
              
                <!-- Missão, Visão e Valores -->
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-3">
                  <div class="info-box py-2">
                    <span class="info-box-icon text-bg-info shadow-sm">
                      <i class="bi bi-bullseye"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Missão, 
                         Visão e Valores</span>
                      <span class="info-box-number">
                        <button class="btn btn-sm btn-outline-info px-3 mt-1">Novo</button>
                      </span>
                    </div>
                  </div>
                </div>
              
                <!-- Governo -->
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-3">
                  <div class="info-box py-2">
                    <span class="info-box-icon text-bg-secondary shadow-sm">
                      <i class="bi bi-diagram-3-fill"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Governo</span>
                      <span class="info-box-number">
                        <button class="btn btn-sm btn-outline-secondary px-3 mt-1">Novo</button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              
        </div>

        <!---tabela-->

        <div class="container">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                      <h3 class="card-title mb-0">Liderança</h3>
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
                              <th class="sortable">Lider <i class="bi bi-arrow-up-down text-muted"></i></th>
                              <th class="sortable">Cargo <i class="bi bi-arrow-up-down text-muted"></i></th>
                              <th class="sortable">igreja pertencente <i class="bi bi-arrow-up-down text-muted"></i></th>
                              <th class="text-center">Ação</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Jairo Dias</td>
                              <td>Secretário</td>
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
                            <tr>
                                <td>Pedro Mumbelo</td>
                                <td>Administrador</td>
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
        </div>
       
       
        <!--end::App Content-->
      </main>
    