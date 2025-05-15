
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Obreiros</h3></div>
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
            
              <!-- Categorias -->
             
            </div>
            
            <!-- /.row -->
            <!--begin::Row-->
           
           <!----tabela--->
         <!-- Botão para abrir modal -->
<div class="mb-3 d-flex justify-content-end">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#omnigrejasModal">
      <i class="bi bi-gear me-1"></i> Ver ou Editar OMINIGREJAS
    </button>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="omnigrejasModal" tabindex="-1" aria-labelledby="omnigrejasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white">
          <h5 class="modal-title" id="omnigrejasModalLabel">Editar Informações do Sistema OMINIGREJAS</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row mb-3">
              <div class="col-md-4">
                <label class="form-label">Nome do Sistema</label>
                <input type="text" class="form-control" placeholder="OMINIGREJAS">
              </div>
              <div class="col-md-4">
                <label class="form-label">Data de Existência</label>
                <input type="date" class="form-control">
              </div>
              <div class="col-md-4">
                <label class="form-label">Endereço</label>
                <input type="text" class="form-control" placeholder="Ex: Luanda - Angola">
              </div>
            </div>
  
            <div class="row mb-3">
              <div class="col-md-4">
                <label class="form-label">NIF</label>
                <input type="text" class="form-control" placeholder="Número de Identificação Fiscal">
              </div>
              <div class="col-md-4">
                <label class="form-label">Missão</label>
                <textarea class="form-control" rows="2" placeholder="Descreva a missão..."></textarea>
              </div>
              <div class="col-md-4">
                <label class="form-label">Valores</label>
                <textarea class="form-control" rows="2" placeholder="Descreva os valores..."></textarea>
              </div>
            </div>
  
            <div class="mb-3 text-end">
              <button type="submit" class="btn btn-success">
                <i class="bi bi-check2-circle"></i> Salvar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Tabela de igrejas -->
  <div class="row mt-4">
    <div class="col-12">
      <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
          <h3 class="card-title mb-0">Igrejas Cadastradas</h3>
          <span class="badge bg-light text-dark rounded-pill">2 registros</span>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-auto">
              <div class="btn-group" role="group" aria-label="Exportar dados">
                <button class="btn btn-light" title="Exportar para CSV"><i class="bi bi-filetype-csv text-primary"></i></button>
                <button class="btn btn-light" title="Exportar para Excel"><i class="bi bi-file-earmark-excel text-success"></i></button>
                <button class="btn btn-light" title="Exportar para PDF"><i class="bi bi-file-earmark-pdf text-danger"></i></button>
                <button class="btn btn-light" title="Imprimir"><i class="bi bi-printer text-dark"></i></button>
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
                  <th>Nome</th>
                  <th>Missão</th>
                  <th>Valores</th>
                  <th>Logo</th>
                  <th>Contacto</th>
                  <th>Dica</th>
                  <th class="text-center">Ação</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Igreja da Luz</td>
                  <td>Evangelizar com amor</td>
                  <td>Fé, união, serviço</td>
                  <td><img src="logo1.png" alt="Logo" width="40"></td>
                  <td>+244 923 456 789</td>
                  <td>Ativa nas comunidades</td>
                  <td class="text-center">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-outline-primary"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Templo Esperança</td>
                  <td>Transformar vidas</td>
                  <td>Esperança, compaixão, verdade</td>
                  <td><img src="logo2.png" alt="Logo" width="40"></td>
                  <td>+244 926 123 321</td>
                  <td>Foco em jovens</td>
                  <td class="text-center">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-outline-primary"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
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
                  <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item disabled"><a class="page-link" href="#">Próximo</a></li>
                </ul>
              </nav>
            </div>
          </div>
  
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
