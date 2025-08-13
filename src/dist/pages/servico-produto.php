
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Produtos / Serviços</h3></div>
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
                <!-- Card Produto -->
                <div class="col-12 col-sm-6 col-md-6">
                  <div class="info-box">
                    <span class="info-box-icon text-bg-success shadow-sm">
                      <i class="bi bi-box-seam"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text d-flex justify-content-between align-items-center">
                        Produto
                  <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalProduto">
                    Novo
                  </button>                      </span>
                      <span class="info-box-number">10</span>
                    </div>
                  </div>
                </div>
              
                <!-- Card Serviço -->
                <div class="col-12 col-sm-6 col-md-6">
                  <div class="info-box">
                    <span class="info-box-icon text-bg-warning shadow-sm">
                      <i class="bi bi-tools"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text d-flex justify-content-between align-items-center">
                        Serviço
                                    <button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#modalServico">
                                      Novo 
                              </button>
                      </span>
                      <span class="info-box-number">8</span>
                    </div>
                  </div>
                </div>
              </div>


              <div class="container my-4">
                <!-- Título Produtos -->
                <div class="row mb-2">
                  <div class="col-12">
                    <h5 class="mb-0">Produtos</h5>
                  </div>
                </div>
              
                <div class="row">
                  <!-- Card Produto -->
                  <div class="col-md-3">
                    <div class="card collapsed-card shadow-sm">
                      <div class="card-header">
                        <h3 class="card-title">Produto 1</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <p class="mb-1">Descrição curta do produto 1.</p>
                        <p class="mb-2"><span class="badge bg-info">Kz 5.000</span></p>
                        <div class="d-flex gap-2">
                          <button class="btn btn-sm btn-info" title="Ver"><i class="bi bi-eye"></i></button>
                          <button class="btn btn-sm btn-warning" title="Editar"><i class="bi bi-pencil"></i></button>
                          <button class="btn btn-sm btn-danger" title="Apagar"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
              
                  <!-- Copiar e colar + editar os dados para mais produtos -->
                  <div class="col-md-3">
                    <div class="card collapsed-card shadow-sm">
                      <div class="card-header">
                        <h3 class="card-title">Produto 2</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <p class="mb-1">Descrição curta do produto 2.</p>
                        <p class="mb-2"><span class="badge bg-info">Kz 3.000</span></p>
                        <div class="d-flex gap-2">
                          <button class="btn btn-sm btn-info"><i class="bi bi-eye"></i></button>
                          <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                          <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
              
                  <!-- Produto 3 -->
                  <div class="col-md-3">
                    <div class="card collapsed-card shadow-sm">
                      <div class="card-header">
                        <h3 class="card-title">Produto 3</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <p class="mb-1">Descrição do produto 3.</p>
                        <p class="mb-2"><span class="badge bg-info">Kz 7.500</span></p>
                        <div class="d-flex gap-2">
                          <button class="btn btn-sm btn-info"><i class="bi bi-eye"></i></button>
                          <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                          <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
              
                  <!-- Produto 4 -->
                  <div class="col-md-3">
                    <div class="card collapsed-card shadow-sm">
                      <div class="card-header">
                        <h3 class="card-title">Produto 4</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <p class="mb-1">Produto 4 com breve info.</p>
                        <p class="mb-2"><span class="badge bg-info">Kz 9.000</span></p>
                        <div class="d-flex gap-2">
                          <button class="btn btn-sm btn-info"><i class="bi bi-eye"></i></button>
                          <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                          <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
                <!-- Separador -->
                <hr class="my-4">
              
                <!-- Título Serviços -->
                <div class="row mb-2">
                  <div class="col-12">
                    <h5 class="mb-0">Serviços</h5>
                  </div>
                </div>
              
                <div class="row">
                    <!-- Serviço 1 -->
                    <div class="col-md-3">
                      <div class="card collapsed-card shadow-sm">
                        <div class="card-header">
                          <h3 class="card-title">Serviço 1</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                              <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                              <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <p class="mb-1">Manutenção de equipamento audiovisual.</p>
                          <p class="mb-2"><span class="badge bg-info">Kz 12.000</span></p>
                          <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-info"><i class="bi bi-eye" title="Ver"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil" title="Editar"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash" title="Apagar"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    <!-- Serviço 2 -->
                    <div class="col-md-3">
                      <div class="card collapsed-card shadow-sm">
                        <div class="card-header">
                          <h3 class="card-title">Serviço 2</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                              <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                              <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <p class="mb-1">Design gráfico para eventos corporativos.</p>
                          <p class="mb-2"><span class="badge bg-info">Kz 8.500</span></p>
                          <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-info"><i class="bi bi-eye" title="Ver"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil" title="Editar"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash" title="Apagar"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    <!-- Serviço 3 -->
                    <div class="col-md-3">
                      <div class="card collapsed-card shadow-sm">
                        <div class="card-header">
                          <h3 class="card-title">Serviço 3</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                              <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                              <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <p class="mb-1">Consultoria em marketing digital.</p>
                          <p class="mb-2"><span class="badge bg-info">Kz 15.000</span></p>
                          <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-info"><i class="bi bi-eye" title="Ver"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil" title="Editar"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash" title="Apagar"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
              </div>


              <!----modal produto-->

              <div class="modal fade" id="modalProduto" tabindex="-1" aria-labelledby="modalProdutoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header   bg-success text-white">
        <h5 class="modal-title" id="modalProdutoLabel">Cadastrar Produto</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
        <form>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Nome</label>
              <input type="text" class="form-control" placeholder="Nome do produto">
            </div>
            <div class="col">
              <label class="form-label">Preço</label>
              <input type="number" class="form-control" placeholder="Kz 0,00">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea class="form-control" rows="4" placeholder="Descreva o produto..."></textarea>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>

    </div>
  </div>
</div>


<!---modal serviço-->
<div class="modal fade" id="modalServico" tabindex="-1" aria-labelledby="modalServicoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="modalServicoLabel">Cadastrar Serviço</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
        <form>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Nome</label>
              <input type="text" class="form-control" placeholder="Nome do serviço">
            </div>
            <div class="col">
              <label class="form-label">Preço</label>
              <input type="number" class="form-control" placeholder="Kz 0,00">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea class="form-control" rows="4" placeholder="Descreva o serviço..."></textarea>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-info">Salvar</button>
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
    
   