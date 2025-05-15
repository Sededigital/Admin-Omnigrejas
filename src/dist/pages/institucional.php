
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
                        <button class="btn btn-sm btn-outline-primary px-3 mt-1">Novo</button>
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
                        <button class="btn btn-sm btn-outline-success px-3 mt-1">Novo</button>
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
                        <button class="btn btn-sm btn-outline-warning px-3 mt-1">Novo</button>
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
                        <button class="btn btn-sm btn-outline-danger px-3 mt-1">Novo</button>
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
                        <button class="btn btn-sm btn-outline-info px-3 mt-1">Novo</button>
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
                        <button class="btn btn-sm btn-outline-secondary px-3 mt-1">Novo</button>
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
       
       
        <!--end::App Content-->
      </main>
     
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
