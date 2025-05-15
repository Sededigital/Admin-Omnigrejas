
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
      
      <div class="modal-header bg-success text-white">
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
    
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      /* apexcharts
       * -------
       * Here we will create a few charts using apexcharts
       */

      //-----------------------
      // - MONTHLY SALES CHART -
      //-----------------------

      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 180,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#sales-chart'),
        sales_chart_options,
      );
      sales_chart.render();

      //---------------------------
      // - END MONTHLY SALES CHART -
      //---------------------------

      function createSparklineChart(selector, data) {
        const options = {
          series: [{ data }],
          chart: {
            type: 'line',
            width: 150,
            height: 30,
            sparkline: {
              enabled: true,
            },
          },
          colors: ['var(--bs-primary)'],
          stroke: {
            width: 2,
          },
          tooltip: {
            fixed: {
              enabled: false,
            },
            x: {
              show: false,
            },
            y: {
              title: {
                formatter: function (seriesName) {
                  return '';
                },
              },
            },
            marker: {
              show: false,
            },
          },
        };

        const chart = new ApexCharts(document.querySelector(selector), options);
        chart.render();
      }

      const table_sparkline_1_data = [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54];
      const table_sparkline_2_data = [12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 44];
      const table_sparkline_3_data = [15, 46, 21, 59, 33, 15, 34, 42, 56, 19, 64];
      const table_sparkline_4_data = [30, 56, 31, 69, 43, 35, 24, 32, 46, 29, 64];
      const table_sparkline_5_data = [20, 76, 51, 79, 53, 35, 54, 22, 36, 49, 64];
      const table_sparkline_6_data = [5, 36, 11, 69, 23, 15, 14, 42, 26, 19, 44];
      const table_sparkline_7_data = [12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 74];

      createSparklineChart('#table-sparkline-1', table_sparkline_1_data);
      createSparklineChart('#table-sparkline-2', table_sparkline_2_data);
      createSparklineChart('#table-sparkline-3', table_sparkline_3_data);
      createSparklineChart('#table-sparkline-4', table_sparkline_4_data);
      createSparklineChart('#table-sparkline-5', table_sparkline_5_data);
      createSparklineChart('#table-sparkline-6', table_sparkline_6_data);
      createSparklineChart('#table-sparkline-7', table_sparkline_7_data);

      //-------------
      // - PIE CHART -
      //-------------

      const pie_chart_options = {
        series: [700, 500, 400, 600, 300, 100],
        chart: {
          type: 'donut',
        },
        labels: ['Chrome', 'Edge', 'FireFox', 'Safari', 'Opera', 'IE'],
        dataLabels: {
          enabled: false,
        },
        colors: ['#0d6efd', '#20c997', '#ffc107', '#d63384', '#6f42c1', '#adb5bd'],
      };

      const pie_chart = new ApexCharts(document.querySelector('#pie-chart'), pie_chart_options);
      pie_chart.render();

      //-----------------
      // - END PIE CHART -
      //-----------------
    </script>
    <!--end::Script-->
  </body>
</html>
