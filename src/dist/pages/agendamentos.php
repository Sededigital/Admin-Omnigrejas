
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
                        <button class="btn btn-sm btn-outline-success px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalReuniao">Nova</button>
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
     

  <!-- Modal Novo Culto --> 


<div class="modal fade" id="modalCulto" tabindex="-1" aria-labelledby="modalCultoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- modal-lg para mais espaço -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCultoLabel">Cadastrar Novo Culto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="tema" class="form-label">Tema</label>
              <input type="text" class="form-control" id="tema" name="tema">
            </div>
            <div class="col-md-6">
              <label for="igreja" class="form-label">Igreja</label>
              <select class="form-select" id="igreja" name="igreja">
                <option value="">Selecione a igreja</option>
                <option value="1">Igreja A</option>
                <option value="2">Igreja B</option>
                <!-- Adicione mais opções conforme necessário -->
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <label for="data" class="form-label">Data</label>
              <input type="date" class="form-control" id="data" name="data">
            </div>
            <div class="col-md-4">
              <label for="horaInicio" class="form-label">Horário Início</label>
              <input type="time" class="form-control" id="horaInicio" name="horaInicio">
            </div>
            <div class="col-md-4">
              <label for="horaFim" class="form-label">Horário Término</label>
              <input type="time" class="form-control" id="horaFim" name="horaFim">
            </div>
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Nova Reunião -->

<!-- Modal -->
<div class="modal fade" id="modalReuniao" tabindex="-1" aria-labelledby="modalReuniaoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalReuniaoLabel">Cadastrar Nova Reunião</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form>
          <!-- Linha 1 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="col-md-6">
              <label for="localizacao" class="form-label">Localização</label>
              <input type="text" class="form-control" id="localizacao" name="localizacao">
            </div>
          </div>

          <!-- Linha 2 -->
          <div class="row mb-3">
            <div class="col-md-4">
              <label for="igreja" class="form-label">Igreja</label>
              <select class="form-select" id="igreja" name="igreja">
                <option value="">Selecione</option>
                <option value="1">Igreja A</option>
                <option value="2">Igreja B</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="diaSemana" class="form-label">Dia da Semana</label>
              <select class="form-select" id="diaSemana" name="diaSemana">
                <option value="">Selecione</option>
                <option value="segunda">Segunda-feira</option>
                <option value="terca">Terça-feira</option>
                <option value="quarta">Quarta-feira</option>
                <option value="quinta">Quinta-feira</option>
                <option value="sexta">Sexta-feira</option>
                <option value="sabado">Sábado</option>
                <option value="domingo">Domingo</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="data" class="form-label">Data</label>
              <input type="date" class="form-control" id="data" name="data">
            </div>
          </div>

          <!-- Linha 3 -->
          <div class="row mb-3">
            <div class="col-md-4">
              <label for="horaInicio" class="form-label">Horário Início</label>
              <input type="time" class="form-control" id="horaInicio" name="horaInicio">
            </div>
            <div class="col-md-4">
              <label for="horaFim" class="form-label">Horário Término</label>
              <input type="time" class="form-control" id="horaFim" name="horaFim">
            </div>
            <div class="mb-3">
  <label for="participantes" class="form-label">Participantes</label>
  <select class="form-select" id="participantes" multiple>
    <option value="João">João</option>
    <option value="Maria">Maria</option>
    <option value="Carlos">Carlos</option>
    <option value="Ana">Ana</option>
    <option value="Pedro">Pedro</option>
  </select>
</div>
          </div>

          <div class="mb-2">
  <strong>Selecionados:</strong>
  <ul id="listaSelecionados" class="list-group mt-2"></ul>
</div>

          <!-- Notificações -->
          <div class="mb-3">
            <label class="form-label d-block">Notificar por:</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="notificarSMS" value="sms">
              <label class="form-check-label" for="notificarSMS">SMS</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="notificarEmail" value="email">
              <label class="form-check-label" for="notificarEmail">E-mail</label>
            </div>
          </div>

          <!-- Descrição com editor estilo Word (Quill) -->
          <div class="mb-3">
            <label for="descricao" class="form-label">Descrição / Mensagem</label>
            <div id="editorDescricao" style="height: 200px; background: #fff;"></div>
            <input type="hidden" name="descricao" id="descricao"> <!-- será preenchido via JS -->
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-success" onclick="capturarDescricao()">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--modal consulta pastoral-->

<div class="modal fade" id="modalConsulta" tabindex="-1" aria-labelledby="modalConsultaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalConsultaLabel">Cadastrar Consulta Pastoral</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form>

          <!-- Linha 1 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="igrejaConsulta" class="form-label">Igreja Pertencente</label>
              <select class="form-select" id="igrejaConsulta" name="igreja">
                <option value="">Selecione</option>
                <option value="1">Igreja A</option>
                <option value="2">Igreja B</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="membroConsulta" class="form-label">Selecionar Membro</label>
              <select class="form-select" id="membroConsulta" name="membro">
                <option value="">Selecione</option>
                <option value="joao">João Silva</option>
                <option value="maria">Maria Gomes</option>
              </select>
            </div>
          </div>

          <!-- Linha 2 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="assuntoConsulta" class="form-label">Assunto da Consulta</label>
              <input type="text" class="form-control" id="assuntoConsulta" name="assunto">
            </div>
            <div class="col-md-6">
              <label for="localConsulta" class="form-label">Localização</label>
              <input type="text" class="form-control" id="localConsulta" name="localizacao">
            </div>
          </div>

          <!-- Linha 3 -->
          <div class="row mb-3">
            <div class="col-md-4">
              <label for="diaSemanaConsulta" class="form-label">Dia da Semana</label>
              <select class="form-select" id="diaSemanaConsulta" name="diaSemana">
                <option value="">Selecione</option>
                <option value="segunda">Segunda-feira</option>
                <option value="terca">Terça-feira</option>
                <option value="quarta">Quarta-feira</option>
                <option value="quinta">Quinta-feira</option>
                <option value="sexta">Sexta-feira</option>
                <option value="sabado">Sábado</option>
                <option value="domingo">Domingo</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="dataConsulta" class="form-label">Data</label>
              <input type="date" class="form-control" id="dataConsulta" name="data">
            </div>
            <div class="col-md-4">
              <label for="horaInicioConsulta" class="form-label">Horário Início</label>
              <input type="time" class="form-control" id="horaInicioConsulta" name="horaInicio">
            </div>
          </div>

          <!-- Linha 4 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="horaFimConsulta" class="form-label">Horário Término</label>
              <input type="time" class="form-control" id="horaFimConsulta" name="horaFim">
            </div>
          </div>

          <!-- Botões -->
          <div class="text-end">
            <button type="submit" class="btn btn-info">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Novo Evento -->

<!-- Modal -->
<div class="modal fade" id="modalEventos" tabindex="-1" aria-labelledby="modalEventosLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEventosLabel">Cadastrar Novo Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form>

          <!-- Linha 1 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="tituloEvento" class="form-label">Título</label>
              <input type="text" class="form-control" id="tituloEvento" name="titulo">
            </div>
            <div class="col-md-6">
              <label for="localEvento" class="form-label">Localização</label>
              <input type="text" class="form-control" id="localEvento" name="localizacao">
            </div>
          </div>

          <!-- Linha 2 - Upload imagem -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="imagemEvento" class="form-label">Imagem de Apresentação</label>
              <input type="file" class="form-control" id="imagemEvento" accept="image/*">
            </div>
            <div class="col-md-6 text-center">
              <label class="form-label">Pré-visualização</label>
              <div id="previewImagem" style="border: 1px solid #ccc; height: 160px; display: flex; align-items: center; justify-content: center;">
                <img id="imgPreview" src="" alt="Prévia" style="max-height: 150px; max-width: 100%; display: none;" />
              </div>
            </div>
          </div>

          <!-- Linha 3 -->
          <div class="row mb-3">
            <div class="col-md-4">
              <label for="igrejaEvento" class="form-label">Igreja</label>
              <select class="form-select" id="igrejaEvento" name="igreja">
                <option value="">Selecione</option>
                <option value="1">Igreja A</option>
                <option value="2">Igreja B</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="diaSemanaEvento" class="form-label">Dia da Semana</label>
              <select class="form-select" id="diaSemanaEvento" name="diaSemana">
                <option value="">Selecione</option>
                <option value="segunda">Segunda-feira</option>
                <option value="terca">Terça-feira</option>
                <option value="quarta">Quarta-feira</option>
                <option value="quinta">Quinta-feira</option>
                <option value="sexta">Sexta-feira</option>
                <option value="sabado">Sábado</option>
                <option value="domingo">Domingo</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="dataEvento" class="form-label">Data</label>
              <input type="date" class="form-control" id="dataEvento" name="data">
            </div>
          </div>

          <!-- Linha 4 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="horaInicioEvento" class="form-label">Horário Início</label>
              <input type="time" class="form-control" id="horaInicioEvento" name="horaInicio">
            </div>
            <div class="col-md-6">
              <label for="horaFimEvento" class="form-label">Horário Término</label>
              <input type="time" class="form-control" id="horaFimEvento" name="horaFim">
            </div>
          </div>

          <!-- Descrição com editor estilo Word -->
          <div class="mb-3">
            <label for="descricaoEvento" class="form-label">Descrição do Evento</label>
            <div id="editorDescricaoEvento" style="height: 200px; background: #fff;"></div>
            <input type="hidden" name="descricao" id="descricaoEventoHidden">
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-primary" onclick="capturarDescricaoEvento()">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- Quill Editor (CDN) -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<!-- Inicializar editor e preview da imagem -->
<script>
  const quillEvento = new Quill('#editorDescricaoEvento', {
    theme: 'snow',
    modules: {
      toolbar: [
        [{ 'header': [1, 2, false] }],
        ['bold', 'italic', 'underline'],
        [{ 'align': [] }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ['clean']
      ]
    }
  });

  function capturarDescricaoEvento() {
    document.getElementById('descricaoEventoHidden').value = quillEvento.root.innerHTML;
  }

  // Preview da imagem
  const inputImagem = document.getElementById('imagemEvento');
  const imgPreview = document.getElementById('imgPreview');

  inputImagem.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      imgPreview.src = URL.createObjectURL(file);
      imgPreview.style.display = 'block';
    } else {
      imgPreview.src = '';
      imgPreview.style.display = 'none';
    }
  });
</script>


<script>
  const participantesSelect = document.getElementById('participantes');
  const listaSelecionados = document.getElementById('listaSelecionados');

  participantesSelect.addEventListener('change', () => {
    // Limpar lista
    listaSelecionados.innerHTML = '';

    // Pegar opções selecionadas
    const selecionados = Array.from(participantesSelect.selectedOptions).map(opt => opt.value);

    // Adicionar os nomes à lista
    selecionados.forEach(nome => {
      const li = document.createElement('li');
      li.className = 'list-group-item py-1';
      li.textContent = nome;
      listaSelecionados.appendChild(li);
    });
  });
</script>




   

