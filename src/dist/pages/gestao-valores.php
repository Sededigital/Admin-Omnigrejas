
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Gestão de Valores</h3></div>
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
             <!-- Operações de Entrada Geral -->
<div class="col-12 col-sm-6 col-md-6">
    <div class="info-box">
      <span class="info-box-icon text-bg-success shadow-sm">
        <i class="bi bi-box-arrow-in-down"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text d-flex justify-content-between align-items-center">
            Operação de Entrada Geral
        </span>
        <span class="info-box-number">12</span>
      </div>
    </div>
  </div>
  
  <!-- Operações de Saída Geral -->
  <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box">
      <span class="info-box-icon text-bg-danger shadow-sm">
        <i class="bi bi-box-arrow-up"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text d-flex justify-content-between align-items-center">
         Operação de Saída Geral
        </span>
        <span class="info-box-number">8</span>
      </div>
    </div>
  </div>

  <div class="row my-4">
      <!-- Seletor de Igreja -->
  <div class="row mb-4">
    <div class="col-md-12">
      <label for="igrejaSelect" class="form-label fw-bold">Selecione a igreja:</label>
      <select class="form-select" id="igrejaSelect">
        <option selected disabled>Escolha uma igreja</option>
        <option>Igreja Sagrada Luz</option>
        <option>Igreja Central da Fé</option>
        <option>Igreja Avivamento Total</option>
      </select>
    </div>
  </div>
  
    <!-- Card: Fundo atual -->
    <div class="col-md-4">
      <div class="card text-white bg-dark shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-bank2 me-2"></i>Fundo Atual da Igreja <</h5>
          <p class="card-text display-6">Kz 210.000</p>
        </div>
      </div>
    </div>
  
    <!-- Card: Entradas -->
    <div class="col-md-4">
      <div class="card text-white bg-success shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-arrow-down-circle me-2"></i>Fundo de Entrada</h5>
          <p class="card-text display-6">Kz 200.000</p>
        </div>
      </div>
    </div>
  
    <!-- Card: Saídas -->
    <div class="col-md-4">
      <div class="card text-white bg-danger shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-arrow-up-circle me-2"></i>Fundo de Saída</h5>
          <p class="card-text display-6">Kz 90.000</p>
        </div>
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
                  <h3 class="card-title mb-0">Registros Financeiros</h3>
                  <span class="badge bg-light text-dark rounded-pill">3 registros</span>
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
                          <th>Quantia (Kz)</th>
                          <th>Igreja</th>
                          <th>Tipo</th>
                          <th>Nota</th>
                          <th>Data</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>150.000</td>
                          <td>Igreja Sagrada Luz</td>
                          <td>
                            <span class="badge bg-success"><i class="bi bi-arrow-down-circle me-1"></i>Entrada</span>
                          </td>
                          <td>Dízimos e ofertas</td>
                          <td>2025-05-01</td>
                        </tr>
                        <tr>
                          <td>90.000</td>
                          <td>Igreja Central da Fé</td>
                          <td>
                            <span class="badge bg-danger"><i class="bi bi-arrow-up-circle me-1"></i>Saída</span>
                          </td>
                          <td>Pagamento do aluguel</td>
                          <td>2025-05-02</td>
                        </tr>
                        <tr>
                          <td>50.000</td>
                          <td>Igreja Avivamento Total</td>
                          <td>
                            <span class="badge bg-success"><i class="bi bi-arrow-down-circle me-1"></i>Entrada</span>
                          </td>
                          <td>Doação especial</td>
                          <td>2025-05-03</td>
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
          
          
          
      
           
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
     