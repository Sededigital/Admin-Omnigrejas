
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Agendamentos</h3></div>
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
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon text-bg-success shadow-sm">
                      <i class="bi bi-plus-circle-fill"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Novo Culto</span>
                      <span class="info-box-number">
                        <button class="btn btn-sm btn-outline-success px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalCulto">Novo</button>
                      </span>
                    </div>
                  </div>
                </div>
              
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon text-bg-warning shadow-sm">
                      <i class="bi bi-plus-circle-fill"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Reunião</span>
                      <span class="info-box-number">
                        <button class="btn btn-sm btn-outline-warning px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalReuniao">Novo</button>
                      </span>
                    </div>
                  </div>
                </div>
              
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon text-bg-primary shadow-sm">
                      <i class="bi bi-plus-circle-fill"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Eventos</span>
                      <span class="info-box-number">
                        <button class="btn btn-sm btn-outline-primary px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalEventos">Novo</button>
                      </span>
                    </div>
                  </div>
                </div>
              
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon text-bg-info shadow-sm">
                      <i class="bi bi-plus-circle-fill"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Consulta Pastoral</span>
                      <span class="info-box-number">
                        <button class="btn btn-sm btn-outline-info px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalConsulta">Novo</button>
                      </span>
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
                  <h3 class="card-title mb-0">Cultos Agendados</h3>
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
                          <th>Tema do Culto</th>
                          <th>Dia da Semana</th>
                          <th>Igreja Pertencente</th>
                          <th>Hora Início</th>
                          <th>Hora Término</th>
                          <th>Data Agendada</th>
                          <th class="text-center">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Renovação Espiritual</td>
                          <td>Domingo</td>
                          <td>Anglicana</td>
                          <td>08:00</td>
                          <td>10:00</td>
                          <td>05/05/2025</td>
                          <td class="text-center">
                            <div class="btn-group btn-group-sm">
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
                          <td>Culto da Juventude</td>
                          <td>Sábado</td>
                          <td>Católica</td>
                          <td>18:30</td>
                          <td>20:00</td>
                          <td>10/05/2025</td>
                          <td class="text-center">
                            <div class="btn-group btn-group-sm">
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
     
   

