
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Relatório do culto</h3></div>
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
            <!-- Cards de Informação -->
<div class="row">
  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="info-box">
      <span class="info-box-icon text-bg-primary shadow-sm">
        <i class="bi bi-people-fill"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text d-flex justify-content-between align-items-center">
          Total de Participantes
           <button class="btn btn-sm btn-outline-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modalRelatorioCulto">Novo</button>
        </span>
        <span class="info-box-number">0</span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="info-box">
      <span class="info-box-icon text-bg-success shadow-sm">
        <i class="bi bi-person-fill"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Senhores</span>
        <span class="info-box-number">0</span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="info-box">
      <span class="info-box-icon text-bg-danger shadow-sm">
        <i class="bi bi-person-fill"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Senhoras</span>
        <span class="info-box-number">0</span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="info-box">
      <span class="info-box-icon text-bg-warning shadow-sm">
        <i class="bi bi-currency-dollar"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Ofertas Recolhidas</span>
        <span class="info-box-number">AOA 0,00</span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="info-box">
      <span class="info-box-icon text-bg-info shadow-sm">
        <i class="bi bi-person-fill"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Jovens Masculinos</span>
        <span class="info-box-number">0</span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="info-box">
      <span class="info-box-icon text-bg-info shadow-sm">
        <i class="bi bi-person-fill"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Jovens Femininos</span>
        <span class="info-box-number">0</span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="info-box">
      <span class="info-box-icon text-bg-secondary shadow-sm">
        <i class="bi bi-person-fill"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Visitantes</span>
        <span class="info-box-number">0</span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="info-box">
      <span class="info-box-icon text-bg-dark shadow-sm">
        <i class="bi bi-cash-stack"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Ofertas Especiais</span>
        <span class="info-box-number">AOA 0,00</span>
      </div>
    </div>
  </div>
</div>

<!-- Tabela de Relatórios -->
<div class="row mt-4">
  <div class="col-12">
    <div class="card shadow-sm">
      <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Relatórios de Culto</h3>
        <span class="badge bg-light text-dark rounded-pill">0 registros</span>
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
                <th class="sortable">Igreja <i class="bi bi-arrow-up-down text-muted"></i></th>
                <th class="sortable">Data <i class="bi bi-arrow-up-down text-muted"></i></th>
                <th class="sortable">Participantes <i class="bi bi-arrow-up-down text-muted"></i></th>
                <th class="sortable">Ofertas <i class="bi bi-arrow-up-down text-muted"></i></th>
                <th class="text-center">Ação</th>
              </tr>
            </thead>
            <tbody>
              <!-- Dados serão preenchidos dinamicamente -->
              <tr>
                <td colspan="5" class="text-center text-muted py-4">Nenhum relatório cadastrado</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row mt-3">
          <div class="col-md-6">
            <p class="text-muted small">Mostrando 0-0 de 0 registros</p>
          </div>
          <div class="col-md-6">
            <nav aria-label="Navegação de página">
              <ul class="pagination pagination-sm justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
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

<!-- Modal para Inserir Relatório -->
<div class="modal fade" id="modalRelatorioCulto" tabindex="-1" aria-labelledby="modalRelatorioCultoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="modalRelatorioCultoLabel">Novo Relatório de Culto</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="dataCulto" class="form-label">Data do Culto</label>
              <input type="date" class="form-control" id="dataCulto" required>
            </div>
            <div class="col-md-6">
              <label for="igreja" class="form-label">Igreja/Local</label>
              <input type="text" class="form-control" id="igreja" required>
            </div>
          </div>
          
          <h5 class="mt-4 border-bottom pb-2">Presença</h5>
          <div class="row g-3">
            <div class="col-md-3">
              <label for="senhores" class="form-label">Senhores</label>
              <input type="number" class="form-control" id="senhores" min="0" value="0">
            </div>
            <div class="col-md-3">
              <label for="senhoras" class="form-label">Senhoras</label>
              <input type="number" class="form-control" id="senhoras" min="0" value="0">
            </div>
            <div class="col-md-3">
              <label for="jovensM" class="form-label">Jovens Masculinos</label>
              <input type="number" class="form-control" id="jovensM" min="0" value="0">
            </div>
            <div class="col-md-3">
              <label for="jovensF" class="form-label">Jovens Femininos</label>
              <input type="number" class="form-control" id="jovensF" min="0" value="0">
            </div>
            <div class="col-md-3">
              <label for="adolescentesM" class="form-label">Adolescentes M</label>
              <input type="number" class="form-control" id="adolescentesM" min="0" value="0">
            </div>
            <div class="col-md-3">
              <label for="adolescentesF" class="form-label">Adolescentes F</label>
              <input type="number" class="form-control" id="adolescentesF" min="0" value="0">
            </div>
            <div class="col-md-3">
              <label for="criancasM" class="form-label">Crianças M</label>
              <input type="number" class="form-control" id="criancasM" min="0" value="0">
            </div>
            <div class="col-md-3">
              <label for="criancasF" class="form-label">Crianças F</label>
              <input type="number" class="form-control" id="criancasF" min="0" value="0">
            </div>
            <div class="col-md-6">
              <label for="visitantes" class="form-label">Total de Visitantes</label>
              <input type="number" class="form-control" id="visitantes" min="0" value="0">
            </div>
          </div>
          
          <h5 class="mt-4 border-bottom pb-2">Ofertas Recolhidas</h5>
          <div class="row g-3">
            <div class="col-md-3">
              <label for="ofertasNormais" class="form-label">Normais</label>
              <input type="number" step="0.01" class="form-control" id="ofertasNormais" min="0" value="0.00">
            </div>
            <div class="col-md-3">
              <label for="assistenciaSocial" class="form-label">Assistência Social</label>
              <input type="number" step="0.01" class="form-control" id="assistenciaSocial" min="0" value="0.00">
            </div>
            <div class="col-md-3">
              <label for="acaoGracas" class="form-label">Ação de Graças</label>
              <input type="number" step="0.01" class="form-control" id="acaoGracas" min="0" value="0.00">
            </div>
            <div class="col-md-3">
              <label for="ofertasEspeciais" class="form-label">Ofertas Especiais</label>
              <input type="number" step="0.01" class="form-control" id="ofertasEspeciais" min="0" value="0.00">
            </div>
          </div>
          
          <div class="mt-4">
            <label for="observacoes" class="form-label">Observações Adicionais</label>
            <textarea class="form-control" id="observacoes" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Salvar Relatório</button>
      </div>
    </div>
  </div>
</div>
            
           
            </div>
            
            <!-- /.row -->
            <!--begin::Row-->
           
           <!----tabela--->
           
          
          
         
           
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
   