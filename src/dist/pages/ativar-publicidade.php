
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Solicitações</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Contacto</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="row">
            
              <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box">
                  <span class="info-box-icon text-bg-primary shadow-sm">
                    <i class="bi bi-tags-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text d-flex justify-content-between align-items-center">
                     Publicidades
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
                  <h3 class="card-title mb-0">Solicitações</h3>
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
                          <th class="sortable">Nome igreja <i class="bi bi-arrow-up-down text-muted"></i></th>
                          <th class="sortable">Usuário <i class="bi bi-arrow-up-down text-muted"></i></th>
                          <th class="sortable">Email <i class="bi bi-arrow-up-down text-muted"></i></th>
                          <th class="sortable">Categoria <i class="bi bi-arrow-up-down text-muted"></i></th>
                            <th class="sortable">Data <i class="bi bi-arrow-up-down text-muted"></i></th>
                          <th class="text-center">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Catolica</td>
                          <td>Adão Magalhães</td>
                          <td>adaomgalhaes793@gmail.com</td>
                          <td>Gestão de Marketing</td>
                          <td>2025-06-15 19:10:13</td>
                          <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <button class="btn btn-outline-danger" title="Apagar">
                                    <i class="bi bi-trash"></i>
                                  </button>
                                  
                              <button class="btn btn-outline-success" title="Aprovar">
                                <i class="bi bi-check-circle"></i>
                              </button>
                              
                            </div>
                          </td>
                        </tr>
                        <tr>
                            <td>Bom Deus</td>
                            <td>Manuela Miguel</td>
                            <td>manuela@gmail.com</td>
                            <td>Comunicação</td>
                            <td>2025-07-04 11:12:16</td>
                            <td class="text-center">
                              <div class="btn-group btn-group-sm" role="group">
                                <button class="btn btn-outline-danger" title="Apagar">
                                    <i class="bi bi-trash"></i>
                                  </button>
                                  
                                <button class="btn btn-outline-success" title="Aprovar">
                                    <i class="bi bi-check-circle"></i>
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
      