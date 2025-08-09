<main class="app-main">
  <!-- Cabeçalho -->
  <div class="app-content-header bg-light border-bottom py-3 mb-4">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <h3 class="mb-0 fw-bold">
        📊 Relatório do Culto
      </h3>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRelatorioCulto">
        <i class="bi bi-plus-circle"></i> Novo Relatório
      </button>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      
      <!-- Cards Resumo -->
      <div class="row g-3">
        <div class="col-sm-6 col-lg-3">
          <div class="info-box shadow-sm">
            <span class="info-box-icon text-bg-primary"><i class="bi bi-people-fill"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total de Participantes</span>
              <span class="info-box-number fw-bold">0</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="info-box shadow-sm">
            <span class="info-box-icon text-bg-success"><i class="bi bi-cash-stack"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Arrecadado</span>
              <span class="info-box-number fw-bold">AOA 0,00</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="info-box shadow-sm">
            <span class="info-box-icon text-bg-warning"><i class="bi bi-person-fill"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Visitantes</span>
              <span class="info-box-number fw-bold">0</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="info-box shadow-sm">
            <span class="info-box-icon text-bg-dark"><i class="bi bi-calendar-event"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Último Culto</span>
              <span class="info-box-number">--/--/----</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Tabela de Relatórios -->
      <div class="card mt-4 shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
          <h5 class="mb-0">Histórico de Relatórios</h5>
          <span class="badge bg-light text-dark">0 registros</span>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th>Igreja</th>
                  <th>Data</th>
                  <th>Participantes</th>
                  <th>Ofertas</th>
                  <th class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="5" class="text-center text-muted py-4">Nenhum relatório cadastrado</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<!-- Modal Novo Relatório -->
<div class="modal fade" id="modalRelatorioCulto" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content shadow-lg">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title">Novo Relatório de Culto</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <!-- Informações principais -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Data do Culto</label>
              <input type="date" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Igreja/Local</label>
              <input type="text" class="form-control" placeholder="Ex: Igreja Central" required>
            </div>
          </div>

          <!-- Presença -->
          <h5 class="mt-4 border-bottom pb-2">Presença</h5>
          <div class="row g-3">
            <div class="col-md-3"><label>Senhores</label><input type="number" class="form-control" value="0"></div>
            <div class="col-md-3"><label>Senhoras</label><input type="number" class="form-control" value="0"></div>
            <div class="col-md-3"><label>Jovens Masc.</label><input type="number" class="form-control" value="0"></div>
            <div class="col-md-3"><label>Jovens Fem.</label><input type="number" class="form-control" value="0"></div>
            <div class="col-md-3"><label>Adol. Masc.</label><input type="number" class="form-control" value="0"></div>
            <div class="col-md-3"><label>Adol. Fem.</label><input type="number" class="form-control" value="0"></div>
            <div class="col-md-3"><label>Crianças M</label><input type="number" class="form-control" value="0"></div>
            <div class="col-md-3"><label>Crianças F</label><input type="number" class="form-control" value="0"></div>
            <div class="col-md-6"><label>Visitantes</label><input type="number" class="form-control" value="0"></div>
          </div>

          <!-- Ofertas -->
          <h5 class="mt-4 border-bottom pb-2">Ofertas Recolhidas</h5>
          <div class="row g-3">
            <div class="col-md-3"><label>Normais</label><input type="number" step="0.01" class="form-control" value="0.00"></div>
            <div class="col-md-3"><label>Assistência Social</label><input type="number" step="0.01" class="form-control" value="0.00"></div>
            <div class="col-md-3"><label>Ação de Graças</label><input type="number" step="0.01" class="form-control" value="0.00"></div>
            <div class="col-md-3"><label>Especiais</label><input type="number" step="0.01" class="form-control" value="0.00"></div>
          </div>

          <!-- Observações -->
          <div class="mt-4">
            <label class="form-label">Observações Adicionais</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>
