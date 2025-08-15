<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnigrejas - Agendamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
        .ql-editor {
            min-height: 150px;
        }
        #previewImagem {
            border: 1px solid #ccc; 
            height: 160px; 
            display: flex; 
            align-items: center; 
            justify-content: center;
        }
        #imgPreview {
            max-height: 150px; 
            max-width: 100%; 
            display: none;
        }
        .list-group-item {
            padding: 0.25rem 0.5rem;
        }
    </style>
</head>
<body>
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
                            <li class="breadcrumb-item active" aria-current="page">Agendamentos</li>
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
                
                <!-- Seletor de Tipo de Agendamento -->
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="tipoAgendamento">Visualizar:</label>
                            <select class="form-select" id="tipoAgendamento">
                                <option value="cultos">Cultos</option>
                                <option value="reunioes">Reuniões</option>
                                <option value="eventos">Eventos</option>
                                <option value="consultas">Consultas Pastorais</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Tabela Dinâmica -->
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <h3 class="card-title mb-0" id="tituloTabela">Cultos Agendados</h3>
                                <span class="badge bg-light text-dark rounded-pill" id="totalRegistros">0 registros</span>
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
                                            <input type="text" class="form-control" id="pesquisarAgendamentos" placeholder="Pesquisar...">
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover align-middle">
                                        <thead class="table-light" id="cabecalhoTabela">
                                            <!-- Cabeçalho será preenchido dinamicamente -->
                                        </thead>
                                        <tbody id="corpoTabela">
                                            <!-- Corpo será preenchido dinamicamente -->
                                        </tbody>
                                    </table>
                                </div>
                    
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <p class="text-muted small" id="infoRegistros">Mostrando 0-0 de 0 registros</p>
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
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

    <!-- Modal Novo Culto -->
    <div class="modal fade" id="modalCulto" tabindex="-1" aria-labelledby="modalCultoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalCultoLabel">Cadastrar Novo Culto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formCulto">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="temaCulto" class="form-label">Tema</label>
                                <input type="text" class="form-control" id="temaCulto" name="tema" required>
                            </div>
                            <div class="col-md-6">
                                <label for="igrejaCulto" class="form-label">Igreja</label>
                                <select class="form-select" id="igrejaCulto" name="igreja" required>
                                    <option value="">Selecione a igreja</option>
                                    <option value="Anglicana">Anglicana</option>
                                    <option value="Católica">Católica</option>
                                    <option value="Batista">Batista</option>
                                    <option value="Assembleia de Deus">Assembleia de Deus</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="dataCulto" class="form-label">Data</label>
                                <input type="date" class="form-control" id="dataCulto" name="data" required>
                            </div>
                            <div class="col-md-4">
                                <label for="horaInicioCulto" class="form-label">Horário Início</label>
                                <input type="time" class="form-control" id="horaInicioCulto" name="horaInicio" required>
                            </div>
                            <div class="col-md-4">
                                <label for="horaFimCulto" class="form-label">Horário Término</label>
                                <input type="time" class="form-control" id="horaFimCulto" name="horaFim" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="descricaoCulto" class="form-label">Descrição</label>
                            <textarea class="form-control" id="descricaoCulto" rows="3" name="descricao"></textarea>
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

    <!-- Modal Nova Reunião -->
    <div class="modal fade" id="modalReuniao" tabindex="-1" aria-labelledby="modalReuniaoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="modalReuniaoLabel">Cadastrar Nova Reunião</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formReuniao">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tituloReuniao" class="form-label">Título</label>
                                <input type="text" class="form-control" id="tituloReuniao" name="titulo" required>
                            </div>
                            <div class="col-md-6">
                                <label for="localReuniao" class="form-label">Localização</label>
                                <input type="text" class="form-control" id="localReuniao" name="localizacao" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="igrejaReuniao" class="form-label">Igreja</label>
                                <select class="form-select" id="igrejaReuniao" name="igreja" required>
                                    <option value="">Selecione</option>
                                    <option value="Anglicana">Anglicana</option>
                                    <option value="Católica">Católica</option>
                                    <option value="Batista">Batista</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="diaSemanaReuniao" class="form-label">Dia da Semana</label>
                                <select class="form-select" id="diaSemanaReuniao" name="diaSemana" required>
                                    <option value="">Selecione</option>
                                    <option value="Segunda-feira">Segunda-feira</option>
                                    <option value="Terça-feira">Terça-feira</option>
                                    <option value="Quarta-feira">Quarta-feira</option>
                                    <option value="Quinta-feira">Quinta-feira</option>
                                    <option value="Sexta-feira">Sexta-feira</option>
                                    <option value="Sábado">Sábado</option>
                                    <option value="Domingo">Domingo</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="dataReuniao" class="form-label">Data</label>
                                <input type="date" class="form-control" id="dataReuniao" name="data" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="horaInicioReuniao" class="form-label">Horário Início</label>
                                <input type="time" class="form-control" id="horaInicioReuniao" name="horaInicio" required>
                            </div>
                            <div class="col-md-4">
                                <label for="horaFimReuniao" class="form-label">Horário Término</label>
                                <input type="time" class="form-control" id="horaFimReuniao" name="horaFim" required>
                            </div>
                            <div class="col-md-4">
                                <label for="participantesReuniao" class="form-label">Participantes</label>
                                <select class="form-select" id="participantesReuniao" multiple>
                                    <option value="João Silva">João Silva</option>
                                    <option value="Maria Santos">Maria Santos</option>
                                    <option value="Carlos Oliveira">Carlos Oliveira</option>
                                    <option value="Ana Pereira">Ana Pereira</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-2">
                            <strong>Selecionados:</strong>
                            <ul id="listaSelecionadosReuniao" class="list-group mt-2"></ul>
                        </div>

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

                        <div class="mb-3">
                            <label for="descricaoReuniao" class="form-label">Descrição / Mensagem</label>
                            <div id="editorDescricaoReuniao"></div>
                            <input type="hidden" name="descricao" id="descricaoReuniaoHidden">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Consulta Pastoral -->
    <div class="modal fade" id="modalConsulta" tabindex="-1" aria-labelledby="modalConsultaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalConsultaLabel">Cadastrar Consulta Pastoral</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formConsulta">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="igrejaConsulta" class="form-label">Igreja Pertencente</label>
                                <select class="form-select" id="igrejaConsulta" name="igreja" required>
                                    <option value="">Selecione</option>
                                    <option value="Anglicana">Anglicana</option>
                                    <option value="Católica">Católica</option>
                                    <option value="Batista">Batista</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="membroConsulta" class="form-label">Selecionar Membro</label>
                                <select class="form-select" id="membroConsulta" name="membro" required>
                                    <option value="">Selecione</option>
                                    <option value="João Silva">João Silva</option>
                                    <option value="Maria Santos">Maria Santos</option>
                                    <option value="Carlos Oliveira">Carlos Oliveira</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="assuntoConsulta" class="form-label">Assunto da Consulta</label>
                                <input type="text" class="form-control" id="assuntoConsulta" name="assunto" required>
                            </div>
                            <div class="col-md-6">
                                <label for="localConsulta" class="form-label">Localização</label>
                                <input type="text" class="form-control" id="localConsulta" name="localizacao" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="diaSemanaConsulta" class="form-label">Dia da Semana</label>
                                <select class="form-select" id="diaSemanaConsulta" name="diaSemana" required>
                                    <option value="">Selecione</option>
                                    <option value="Segunda-feira">Segunda-feira</option>
                                    <option value="Terça-feira">Terça-feira</option>
                                    <option value="Quarta-feira">Quarta-feira</option>
                                    <option value="Quinta-feira">Quinta-feira</option>
                                    <option value="Sexta-feira">Sexta-feira</option>
                                    <option value="Sábado">Sábado</option>
                                    <option value="Domingo">Domingo</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="dataConsulta" class="form-label">Data</label>
                                <input type="date" class="form-control" id="dataConsulta" name="data" required>
                            </div>
                            <div class="col-md-4">
                                <label for="horaInicioConsulta" class="form-label">Horário Início</label>
                                <input type="time" class="form-control" id="horaInicioConsulta" name="horaInicio" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="horaFimConsulta" class="form-label">Horário Término</label>
                                <input type="time" class="form-control" id="horaFimConsulta" name="horaFim" required>
                            </div>
                            <div class="col-md-6">
                                <label for="pastorConsulta" class="form-label">Pastor Responsável</label>
                                <select class="form-select" id="pastorConsulta" name="pastor" required>
                                    <option value="">Selecione</option>
                                    <option value="Pastor João">Pastor João</option>
                                    <option value="Pastor Carlos">Pastor Carlos</option>
                                    <option value="Pastor António">Pastor António</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="observacoesConsulta" class="form-label">Observações</label>
                            <textarea class="form-control" id="observacoesConsulta" rows="3" name="observacoes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Novo Evento -->
    <div class="modal fade" id="modalEventos" tabindex="-1" aria-labelledby="modalEventosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalEventosLabel">Cadastrar Novo Evento</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formEvento">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tituloEvento" class="form-label">Título</label>
                                <input type="text" class="form-control" id="tituloEvento" name="titulo" required>
                            </div>
                            <div class="col-md-6">
                                <label for="localEvento" class="form-label">Localização</label>
                                <input type="text" class="form-control" id="localEvento" name="localizacao" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="imagemEvento" class="form-label">Imagem de Apresentação</label>
                                <input type="file" class="form-control" id="imagemEvento" accept="image/*">
                            </div>
                            <div class="col-md-6 text-center">
                                <label class="form-label">Pré-visualização</label>
                                <div id="previewImagem">
                                    <img id="imgPreview" src="" alt="Prévia" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="igrejaEvento" class="form-label">Igreja</label>
                                <select class="form-select" id="igrejaEvento" name="igreja" required>
                                    <option value="">Selecione</option>
                                    <option value="Anglicana">Anglicana</option>
                                    <option value="Católica">Católica</option>
                                    <option value="Batista">Batista</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="diaSemanaEvento" class="form-label">Dia da Semana</label>
                                <select class="form-select" id="diaSemanaEvento" name="diaSemana" required>
                                    <option value="">Selecione</option>
                                    <option value="Segunda-feira">Segunda-feira</option>
                                    <option value="Terça-feira">Terça-feira</option>
                                    <option value="Quarta-feira">Quarta-feira</option>
                                    <option value="Quinta-feira">Quinta-feira</option>
                                    <option value="Sexta-feira">Sexta-feira</option>
                                    <option value="Sábado">Sábado</option>
                                    <option value="Domingo">Domingo</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="dataEvento" class="form-label">Data</label>
                                <input type="date" class="form-control" id="dataEvento" name="data" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="horaInicioEvento" class="form-label">Horário Início</label>
                                <input type="time" class="form-control" id="horaInicioEvento" name="horaInicio" required>
                            </div>
                            <div class="col-md-6">
                                <label for="horaFimEvento" class="form-label">Horário Término</label>
                                <input type="time" class="form-control" id="horaFimEvento" name="horaFim" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="descricaoEvento" class="form-label">Descrição do Evento</label>
                            <div id="editorDescricaoEvento"></div>
                            <input type="hidden" name="descricao" id="descricaoEventoHidden">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        // Inicializar editores Quill
        const quillReuniao = new Quill('#editorDescricaoReuniao', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['clean']
                ]
            }
        });

        const quillEvento = new Quill('#editorDescricaoEvento', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['clean']
                ]
            }
        });

        // Preview da imagem para eventos
        const inputImagem = document.getElementById('imagemEvento');
        const imgPreview = document.getElementById('imgPreview');

        inputImagem.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                imgPreview.src = URL.createObjectURL(file);
                imgPreview.style.display = 'block';
            } else {
                imgPreview.src = '';
                imgPreview.style.display = 'none';
            }
        });

        // Lista de participantes selecionados para reuniões
        const participantesSelect = document.getElementById('participantesReuniao');
        const listaSelecionados = document.getElementById('listaSelecionadosReuniao');

        participantesSelect.addEventListener('change', () => {
            listaSelecionados.innerHTML = '';
            const selecionados = Array.from(participantesSelect.selectedOptions).map(opt => opt.value);
            
            selecionados.forEach(nome => {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.textContent = nome;
                listaSelecionados.appendChild(li);
            });
        });

        // Dados de exemplo para as tabelas
        const dadosAgendamentos = {
            cultos: [
                {
                    id: 1,
                    tema: "Renovação Espiritual",
                    igreja: "Anglicana",
                    data: "05/05/2025",
                    diaSemana: "Domingo",
                    horaInicio: "08:00",
                    horaFim: "10:00",
                    descricao: "Culto de domingo pela manhã"
                },
                {
                    id: 2,
                    tema: "Culto da Juventude",
                    igreja: "Católica",
                    data: "10/05/2025",
                    diaSemana: "Sábado",
                    horaInicio: "18:30",
                    horaFim: "20:00",
                    descricao: "Culto especial para jovens"
                }
            ],
            reunioes: [
                {
                    id: 1,
                    titulo: "Reunião de Líderes",
                    igreja: "Anglicana",
                    local: "Sala de Reuniões",
                    data: "07/05/2025",
                    diaSemana: "Terça-feira",
                    horaInicio: "19:00",
                    horaFim: "21:00",
                    participantes: ["João Silva", "Maria Santos"],
                    descricao: "Planejamento mensal"
                }
            ],
            eventos: [
                {
                    id: 1,
                    titulo: "Conferência de Casais",
                    igreja: "Batista",
                    local: "Auditório Principal",
                    data: "15/05/2025",
                    diaSemana: "Quarta-feira",
                    horaInicio: "18:00",
                    horaFim: "22:00",
                    descricao: "Evento especial para casais"
                }
            ],
            consultas: [
                {
                    id: 1,
                    membro: "João Silva",
                    igreja: "Anglicana",
                    assunto: "Aconselhamento Familiar",
                    local: "Sala Pastoral",
                    data: "08/05/2025",
                    diaSemana: "Quarta-feira",
                    horaInicio: "15:00",
                    horaFim: "16:00",
                    pastor: "Pastor João",
                    observacoes: "Casal com problemas conjugais"
                }
            ]
        };

        // Armazenar dados no localStorage
        localStorage.setItem('agendamentos', JSON.stringify(dadosAgendamentos));

        // Função para carregar tabela conforme seleção
        function carregarTabela(tipo) {
            const dados = JSON.parse(localStorage.getItem('agendamentos'))[tipo];
            const cabecalho = document.getElementById('cabecalhoTabela');
            const corpo = document.getElementById('corpoTabela');
            const titulo = document.getElementById('tituloTabela');
            const totalRegistros = document.getElementById('totalRegistros');
            const infoRegistros = document.getElementById('infoRegistros');

            // Limpar tabela
            cabecalho.innerHTML = '';
            corpo.innerHTML = '';

            // Definir título e total de registros
            let tituloTabela = '';
            let colunas = [];

            switch(tipo) {
                case 'cultos':
                    tituloTabela = 'Cultos Agendados';
                    colunas = ['Tema', 'Igreja', 'Dia da Semana', 'Data', 'Hora Início', 'Hora Término', 'Ações'];
                    break;
                case 'reunioes':
                    tituloTabela = 'Reuniões Agendadas';
                    colunas = ['Título', 'Igreja', 'Local', 'Data', 'Hora Início', 'Hora Término', 'Ações'];
                    break;
                case 'eventos':
                    tituloTabela = 'Eventos Agendados';
                    colunas = ['Título', 'Igreja', 'Local', 'Data', 'Hora Início', 'Hora Término', 'Ações'];
                    break;
                case 'consultas':
                    tituloTabela = 'Consultas Pastorais';
                    colunas = ['Membro', 'Igreja', 'Assunto', 'Data', 'Hora Início', 'Pastor', 'Ações'];
                    break;
            }

            titulo.textContent = tituloTabela;
            totalRegistros.textContent = `${dados.length} registros`;
            infoRegistros.textContent = `Mostrando 1-${dados.length} de ${dados.length} registros`;

            // Criar cabeçalho
            const trCabecalho = document.createElement('tr');
            colunas.forEach(coluna => {
                const th = document.createElement('th');
                th.textContent = coluna;
                if (coluna !== 'Ações') {
                    th.classList.add('sortable');
                    const icon = document.createElement('i');
                    icon.className = 'bi bi-arrow-down';
                    th.appendChild(icon);
                }
                trCabecalho.appendChild(th);
            });
            cabecalho.appendChild(trCabecalho);

            // Preencher corpo da tabela
            dados.forEach(item => {
                const tr = document.createElement('tr');
                
                switch(tipo) {
                    case 'cultos':
                        tr.innerHTML = `
                            <td>${item.tema}</td>
                            <td>${item.igreja}</td>
                            <td>${item.diaSemana}</td>
                            <td>${item.data}</td>
                            <td>${item.horaInicio}</td>
                            <td>${item.horaFim}</td>
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
                        `;
                        break;
                    case 'reunioes':
                        tr.innerHTML = `
                            <td>${item.titulo}</td>
                            <td>${item.igreja}</td>
                            <td>${item.local}</td>
                            <td>${item.data}</td>
                            <td>${item.horaInicio}</td>
                            <td>${item.horaFim}</td>
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
                        `;
                        break;
                    case 'eventos':
                        tr.innerHTML = `
                            <td>${item.titulo}</td>
                            <td>${item.igreja}</td>
                            <td>${item.local}</td>
                            <td>${item.data}</td>
                            <td>${item.horaInicio}</td>
                            <td>${item.horaFim}</td>
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
                        `;
                        break;
                    case 'consultas':
                        tr.innerHTML = `
                            <td>${item.membro}</td>
                            <td>${item.igreja}</td>
                            <td>${item.assunto}</td>
                            <td>${item.data}</td>
                            <td>${item.horaInicio}</td>
                            <td>${item.pastor}</td>
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
                        `;
                        break;
                }
                
                corpo.appendChild(tr);
            });
        }

        // Event listener para o seletor de tipo de agendamento
        document.getElementById('tipoAgendamento').addEventListener('change', function() {
            carregarTabela(this.value);
        });

        // Event listener para pesquisa
        document.getElementById('pesquisarAgendamentos').addEventListener('input', function() {
            const termo = this.value.toLowerCase();
            const linhas = document.querySelectorAll('#corpoTabela tr');
            
            linhas.forEach(linha => {
                const textoLinha = linha.textContent.toLowerCase();
                linha.style.display = textoLinha.includes(termo) ? '' : 'none';
            });
        });

        // Formulários - apenas para demonstração (não implementei a persistência)
        document.getElementById('formCulto').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Culto cadastrado com sucesso!');
            this.reset();
            $('#modalCulto').modal('hide');
        });

        document.getElementById('formReuniao').addEventListener('submit', function(e) {
            e.preventDefault();
            document.getElementById('descricaoReuniaoHidden').value = quillReuniao.root.innerHTML;
            alert('Reunião cadastrada com sucesso!');
            this.reset();
            $('#modalReuniao').modal('hide');
        });

        document.getElementById('formConsulta').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Consulta pastoral cadastrada com sucesso!');
            this.reset();
            $('#modalConsulta').modal('hide');
        });

        document.getElementById('formEvento').addEventListener('submit', function(e) {
            e.preventDefault();
            document.getElementById('descricaoEventoHidden').value = quillEvento.root.innerHTML;
            alert('Evento cadastrado com sucesso!');
            this.reset();
            $('#modalEventos').modal('hide');
        });

        // Carregar tabela inicial (cultos)
        document.addEventListener('DOMContentLoaded', function() {
            carregarTabela('cultos');
        });
    </script>
</body>
</html>