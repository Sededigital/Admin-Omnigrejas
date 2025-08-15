<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Relatório do Culto</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS e Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<main class="app-main">
  <!-- Cabeçalho -->
  <div class="app-content-header bg-light border-bottom py-3 mb-4">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <h3 class="mb-0 fw-bold">📊 Relatório do Culto</h3>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRelatorioCulto">
        <i class="bi bi-plus-circle"></i> Novo Relatório
      </button>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <!-- Tabela -->
      <div class="card mt-4 shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
          <h5 class="mb-0">Histórico de Relatórios</h5>
          <span id="totalRegistros" class="badge bg-light text-dark">0 registros</span>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover align-middle" id="tabelaRelatorios">
              <thead class="table-light">
                <tr>
                  <th>Igreja</th>
                  <th>Data</th>
                  <th>Participantes</th>
                  <th>Ofertas</th>
                  <th>Texto Bíblico</th>
                  <th class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="6" class="text-center text-muted py-4">Nenhum relatório cadastrado</td>
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
        <form id="formRelatorio">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Data do Culto</label>
              <input type="date" class="form-control" name="data" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Igreja/Local</label>
              <input type="text" class="form-control" name="igreja" placeholder="Ex: Igreja Central" required>
            </div>
          </div>

          <!-- Texto Bíblico -->
          <div class="mb-3">
            <label class="form-label">Texto Bíblico da Pregação</label>
            <input type="text" class="form-control" name="textoBiblico" placeholder="Ex: João 3:16" required>
          </div>

          <!-- Presença -->
          <h5 class="mt-4 border-bottom pb-2">Presença</h5>
          <div class="row g-3">
            <div class="col-md-3"><label>Total Participantes</label><input type="number" class="form-control" name="participantes" value="0"></div>
            <div class="col-md-3"><label>Visitantes</label><input type="number" class="form-control" name="visitantes" value="0"></div>
          </div>

          <!-- Ofertas -->
          <h5 class="mt-4 border-bottom pb-2">Ofertas Recolhidas</h5>
          <div class="row g-3">
            <div class="col-md-3"><label>Total Ofertas</label><input type="number" step="0.01" class="form-control" name="ofertas" value="0.00"></div>
          </div>

          <!-- Observações -->
          <div class="mt-4">
            <label class="form-label">Observações Adicionais</label>
            <textarea class="form-control" name="observacoes" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" onclick="salvarRelatorio()">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
let relatorios = JSON.parse(localStorage.getItem("relatorios")) || [];

function salvarRelatorio() {
  const form = document.getElementById("formRelatorio");
  const data = new FormData(form);

  const relatorio = {
    igreja: data.get("igreja"),
    data: data.get("data"),
    participantes: data.get("participantes"),
    ofertas: parseFloat(data.get("ofertas")).toFixed(2),
    textoBiblico: data.get("textoBiblico"),
    observacoes: data.get("observacoes"),
    visitantes: data.get("visitantes")
  };

  relatorios.push(relatorio);
  localStorage.setItem("relatorios", JSON.stringify(relatorios));

  form.reset();
  bootstrap.Modal.getInstance(document.getElementById("modalRelatorioCulto")).hide();
  renderTabela();
}

function renderTabela() {
  const tabela = document.querySelector("#tabelaRelatorios tbody");
  tabela.innerHTML = "";

  if (relatorios.length === 0) {
    tabela.innerHTML = `<tr><td colspan="6" class="text-center text-muted py-4">Nenhum relatório cadastrado</td></tr>`;
  } else {
    relatorios.forEach((r, index) => {
      tabela.innerHTML += `
        <tr>
          <td>${r.igreja}</td>
          <td>${r.data}</td>
          <td>${r.participantes}</td>
          <td>AOA ${r.ofertas}</td>
          <td>${r.textoBiblico}</td>
          <td class="text-center">
            <button class="btn btn-sm btn-warning" onclick="editarRelatorio(${index})"><i class="bi bi-pencil"></i></button>
            <button class="btn btn-sm btn-danger" onclick="apagarRelatorio(${index})"><i class="bi bi-trash"></i></button>
            <button class="btn btn-sm btn-info" onclick="imprimirRelatorio(${index})"><i class="bi bi-printer"></i></button>
          </td>
        </tr>
      `;
    });
  }

  document.getElementById("totalRegistros").textContent = `${relatorios.length} registros`;
}

function editarRelatorio(index) {
  const r = relatorios[index];
  const form = document.getElementById("formRelatorio");

  form.data.value = r.data;
  form.igreja.value = r.igreja;
  form.participantes.value = r.participantes;
  form.ofertas.value = r.ofertas;
  form.textoBiblico.value = r.textoBiblico;
  form.observacoes.value = r.observacoes;
  form.visitantes.value = r.visitantes;

  relatorios.splice(index, 1);
  localStorage.setItem("relatorios", JSON.stringify(relatorios));

  new bootstrap.Modal(document.getElementById("modalRelatorioCulto")).show();
}

function apagarRelatorio(index) {
  if (confirm("Tem certeza que deseja apagar este relatório?")) {
    relatorios.splice(index, 1);
    localStorage.setItem("relatorios", JSON.stringify(relatorios));
    renderTabela();
  }
}

function imprimirRelatorio(index) {
  const r = relatorios[index];
  const conteudo = `
    <html>
    <head>
      <title>Relatório do Culto</title>
      <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #000; padding: 8px; }
      </style>
    </head>
    <body>
      <h2>Relatório do Culto</h2>
      <table>
        <tr><th>Igreja</th><td>${r.igreja}</td></tr>
        <tr><th>Data</th><td>${r.data}</td></tr>
        <tr><th>Participantes</th><td>${r.participantes}</td></tr>
        <tr><th>Visitantes</th><td>${r.visitantes}</td></tr>
        <tr><th>Ofertas</th><td>AOA ${r.ofertas}</td></tr>
        <tr><th>Texto Bíblico</th><td>${r.textoBiblico}</td></tr>
        <tr><th>Observações</th><td>${r.observacoes}</td></tr>
      </table>
    </body>
    </html>
  `;

  const novaJanela = window.open("", "_blank");
  novaJanela.document.write(conteudo);
  novaJanela.document.close();
  novaJanela.print();
}

renderTabela();
</script>

</body>
</html>
