
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">

          <!---modal--->

          <!-- Botão no header da tabela -->


<!-- Modal de Cadastro -->
<div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="modalCadastroLabel"><i class="bi bi-pencil-square me-2"></i>Novo Registro Financeiro</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <form>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Quantia (Kz)</label>
            <input type="number" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Igreja</label>
            <select class="form-select" required>
              <option selected disabled>Selecione</option>
              <option>Igreja Sagrada Luz</option>
              <option>Igreja Central da Fé</option>
              <option>Igreja Avivamento Total</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select class="form-select" required>
              <option selected disabled>Selecione</option>
              <option value="entrada">Entrada</option>
              <option value="saida">Saída</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Nota</label>
            <textarea class="form-control" rows="2"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>

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
           
 
          
          <!-- Botão no header da tabela -->
<div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
  <h3 class="card-title mb-0">Registros Financeiros</h3>
  <div class="d-flex align-items-center gap-2">
    <span id="contador-registros" class="badge bg-light text-dark rounded-pill">0 registros</span>
    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalCadastro">
      <i class="bi bi-plus-circle me-1"></i> Cadastrar Registro
    </button>
  </div>
</div>

<!-- Tabela -->
<div class="table-responsive">
  <table class="table table-striped mb-0">
    <thead>
      <tr>
        <th>Quantia (Kz)</th>
        <th>Igreja</th>
        <th>Tipo</th>
        <th>Nota</th>
        <th>Data</th>
      </tr>
    </thead>
    <tbody id="tabela-corpo">
      <!-- Registros serão adicionados aqui -->
    </tbody>
  </table>
</div>

<!-- Modal de Cadastro -->
<div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="modalCadastroLabel"><i class="bi bi-pencil-square me-2"></i>Novo Registro Financeiro</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <form id="formCadastro">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Quantia (Kz)</label>
            <input type="number" id="quantia" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Igreja</label>
            <select id="igreja" class="form-select" required>
              <option selected disabled>Selecione</option>
              <option>Igreja Sagrada Luz</option>
              <option>Igreja Central da Fé</option>
              <option>Igreja Avivamento Total</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select id="tipo" class="form-select" required>
              <option selected disabled>Selecione</option>
              <option value="entrada">Entrada</option>
              <option value="saida">Saída</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Nota</label>
            <textarea id="nota" class="form-control" rows="2"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" id="data" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("formCadastro");
  const tabelaCorpo = document.getElementById("tabela-corpo");
  const contador = document.getElementById("contador-registros");

  let totalRegistros = 0;

  form.addEventListener("submit", function(event) {
    event.preventDefault();

    // Pega valores
    const quantia = document.getElementById("quantia").value;
    const igreja = document.getElementById("igreja").value;
    const tipo = document.getElementById("tipo").value;
    const nota = document.getElementById("nota").value;
    const data = document.getElementById("data").value;

    // Cria nova linha
    const novaLinha = document.createElement("tr");
    novaLinha.innerHTML = `
      <td>${quantia}</td>
      <td>${igreja}</td>
      <td><span class="badge ${tipo === 'entrada' ? 'bg-success' : 'bg-danger'}">${tipo}</span></td>
      <td>${nota}</td>
      <td>${data}</td>
    `;

    // Adiciona na tabela
    tabelaCorpo.appendChild(novaLinha);

    // Atualiza contador
    totalRegistros++;
    contador.textContent = `${totalRegistros} registro${totalRegistros > 1 ? 's' : ''}`;

    // Fecha modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalCadastro'));
    modal.hide();

    // Limpa formulário
    form.reset();
  });
});
</script>

      
           
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
     