
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
                        <button class="btn btn-sm btn-outline-primary px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalLideranca">Novo</button>

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
                        <button class="btn btn-sm btn-outline-success px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalProgramacao">Novo</button>

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
                        <button class="btn btn-sm btn-outline-warning px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalHistoria">Novo</button>

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
                        <button class="btn btn-sm btn-outline-danger px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalConfissao">Novo</button>

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
                        <button class="btn btn-sm btn-outline-info px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalMvv">Novo</button>

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
                        <button class="btn btn-sm btn-outline-secondary px-3 mt-1" data-bs-toggle="modal" data-bs-target="#modalGoverno">Novo</button>

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
       
       
      </main>

      <!-- Modal Programação -->

     
<div class="modal fade" id="modalProgramacao" tabindex="-1" aria-labelledby="modalProgramacaoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalProgramacaoLabel">Cadastrar Nova Programação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form>

          <!-- Linha 1 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="tituloProgramacao" class="form-label">Título</label>
              <input type="text" class="form-control" id="tituloProgramacao" name="titulo">
            </div>
            <div class="col-md-6">
              <label for="fotoProgramacao" class="form-label">Foto</label>
              <input type="file" class="form-control" id="fotoProgramacao" name="foto" onchange="previewFotoProgramacao(event)">
              <div class="mt-2">
                <img id="previewProgramacao" src="#" alt="Pré-visualização" style="max-width: 100px; display: none;" />
              </div>
            </div>
          </div>

          <!-- Linha 2 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="igrejaProgramacao" class="form-label">Igreja</label>
              <select class="form-select" id="igrejaProgramacao" name="igreja">
                <option value="">Selecione</option>
                <option value="1">Igreja A</option>
                <option value="2">Igreja B</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="diaSemanaProgramacao" class="form-label">Dia da Semana</label>
              <select class="form-select" id="diaSemanaProgramacao" name="dia_semana">
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
          </div>

          <!-- Linha 3 -->
          <div class="row mb-3">
            <div class="col-md-4">
              <label for="dataProgramacao" class="form-label">Data</label>
              <input type="date" class="form-control" id="dataProgramacao" name="data">
            </div>
            <div class="col-md-4">
              <label for="horaInicioProgramacao" class="form-label">Horário Início</label>
              <input type="time" class="form-control" id="horaInicioProgramacao" name="hora_inicio">
            </div>
            <div class="col-md-4">
              <label for="horaFimProgramacao" class="form-label">Horário Término</label>
              <input type="time" class="form-control" id="horaFimProgramacao" name="hora_termino">
            </div>
          </div>

          <!-- Botões -->
          <div class="text-end">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script para pré-visualização da imagem -->
<script>
  function previewFotoProgramacao(event) {
    const input = event.target;
    const preview = document.getElementById('previewProgramacao');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<!-- Modal Governo -->

<!-- Modal -->
<div class="modal fade" id="modalGoverno" tabindex="-1" aria-labelledby="modalGovernoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="modalGovernoLabel">Cadastrar Governo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
        <form>

          <!-- Linha 1 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="oqueFalasGoverno" class="form-label">O que falas</label>
              <input type="text" class="form-control" id="oqueFalasGoverno" name="oque_falas">
            </div>
            <div class="col-md-6">
              <label for="igrejasGoverno" class="form-label">Igrejas</label>
              <select class="form-select" id="igrejasGoverno" name="igrejas">
                <option value="">Selecione</option>
                <option value="1">Igreja A</option>
                <option value="2">Igreja B</option>
              </select>
            </div>
          </div>

          <!-- Informações de Governo -->
          <div class="mb-3">
            <label for="infoGoverno" class="form-label">Informações de Governo</label>
            <textarea class="form-control" id="infoGoverno" name="informacoes_governo" rows="6" placeholder="Escreva as informações de governo..."></textarea>
          </div>

          <!-- Botões -->
          <div class="text-end">
            <button type="submit" class="btn btn-secondary">Salvar</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>


<!-- Modal História -->


<div class="modal fade" id="modalHistoria" tabindex="-1" aria-labelledby="modalHistoriaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="modalHistoriaLabel">Cadastrar Nova História</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      
      <div class="modal-body">
        <form>

          <!-- Linha 1 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="tituloHistoria" class="form-label">Título</label>
              <input type="text" class="form-control" id="tituloHistoria" name="titulo">
            </div>
            <div class="col-md-6">
              <label for="igrejaHistoria" class="form-label">Igreja</label>
              <select class="form-select" id="igrejaHistoria" name="igreja">
                <option value="">Selecione</option>
                <option value="1">Igreja A</option>
                <option value="2">Igreja B</option>
              </select>
            </div>
          </div>

          <!-- História -->
          <div class="mb-3">
            <label for="textoHistoria" class="form-label">História da Igreja</label>
            <textarea class="form-control" id="textoHistoria" name="historia" rows="6" placeholder="Escreva aqui a história da igreja..."></textarea>
          </div>

          <!-- Botões -->
          <div class="text-end">
            <button type="submit" class="btn btn-warning">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Confissão da Fé -->

<div class="modal fade" id="modalConfissao" tabindex="-1" aria-labelledby="modalConfissaoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="modalConfissaoLabel">Cadastrar Confissão da Fé</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      
      <div class="modal-body">
        <form>

          <!-- Linha 1 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="oqueFalas" class="form-label">O que falas</label>
              <input type="text" class="form-control" id="oqueFalas" name="oque_falas">
            </div>
            <div class="col-md-6">
              <label for="igrejaConfissao" class="form-label">Igreja</label>
              <select class="form-select" id="igrejaConfissao" name="igreja">
                <option value="">Selecione</option>
                <option value="1">Igreja A</option>
                <option value="2">Igreja B</option>
              </select>
            </div>
          </div>

          

          <!-- Confissão da Fé -->
          <div class="mb-3">
            <label for="confissaoTexto" class="form-label">Confissão da Fé</label>
            <textarea class="form-control" id="confissaoTexto" name="confissao" rows="6" placeholder="Escreva aqui a confissão da fé..."></textarea>
          </div>

          <!-- Botões -->
          <div class="text-end">
            <button type="submit" class="btn btn-danger">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Missão, Visão e Valores -->

<div class="modal fade" id="modalMvv" tabindex="-1" aria-labelledby="modalMvvLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="modalMvvLabel">Cadastrar Missão, Visão e Valores</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      
      <div class="modal-body">
        <form>

          <!-- Igreja -->
          <div class="mb-3">
            <label for="igrejaMvv" class="form-label">Igreja</label>
            <select class="form-select" id="igrejaMvv" name="igreja">
              <option value="">Selecione</option>
              <option value="1">Igreja A</option>
              <option value="2">Igreja B</option>
            </select>
          </div>

          <!-- Missão -->
          <div class="mb-3">
            <label for="missao" class="form-label">Missão</label>
            <textarea class="form-control" id="missao" name="missao" rows="3" placeholder="Descreva a missão..."></textarea>
          </div>

          <!-- Visão -->
          <div class="mb-3">
            <label for="visao" class="form-label">Visão</label>
            <textarea class="form-control" id="visao" name="visao" rows="3" placeholder="Descreva a visão..."></textarea>
          </div>

          <!-- Valores -->
          <div class="mb-3">
            <label for="valores" class="form-label">Valores</label>
            <textarea class="form-control" id="valores" name="valores" rows="3" placeholder="Descreva os valores..."></textarea>
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




      <!-- Modal Liderança -->
     
<div class="modal fade" id="modalLideranca" tabindex="-1" aria-labelledby="modalLiderancaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLiderancaLabel">Cadastrar Liderança</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form>

          <!-- Linha 1 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="igrejaLideranca" class="form-label">Igreja Pertencente</label>
              <select class="form-select" id="igrejaLideranca" name="igreja">
                <option value="">Selecione</option>
                <option value="1">Igreja A</option>
                <option value="2">Igreja B</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="membroLideranca" class="form-label">Selecionar Membro</label>
              <select class="form-select" id="membroLideranca" name="membro">
                <option value="">Selecione</option>
                <option value="joao">João Silva</option>
                <option value="maria">Maria Gomes</option>
              </select>
            </div>
          </div>

          <!-- Linha 2 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="funcaoLideranca" class="form-label">Função</label>
              <input type="text" class="form-control" id="funcaoLideranca" name="funcao">
            </div>
            <div class="col-md-6">
              <label for="fotoLider" class="form-label">Foto do Líder</label>
              <input type="file" class="form-control" id="fotoLider" name="foto" onchange="previewFotoLider(event)">
              <div class="mt-2">
                <img id="previewLider" src="#" alt="Pré-visualização" style="max-width: 100px; display: none;" />
              </div>
            </div>
          </div>

          <!-- Linha 3 -->
          <div class="mb-3">
            <label for="descricaoLider" class="form-label">Descrição do Líder</label>
            <textarea class="form-control" id="descricaoLider" name="descricao" rows="4" placeholder="Digite a descrição do líder..."></textarea>
          </div>

          <!-- Botões -->
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script para pré-visualizar imagem -->
<script>
  function previewFotoLider(event) {
    const input = event.target;
    const preview = document.getElementById('previewLider');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

    