<?php
// Teste das variáveis do .env
function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception('.env file not found');
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        
        // Pular comentários e linhas vazias
        if (empty($line) || strpos($line, '#') === 0) {
            continue;
        }
        
        // Verificar se a linha contém um comentário inline
        if (strpos($line, '#') !== false) {
            // Pegar apenas a parte antes do comentário
            $line = trim(explode('#', $line)[0]);
        }
        
        // Verificar se ainda tem conteúdo após remover comentários
        if (empty($line) || strpos($line, '=') === false) {
            continue;
        }
        
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

try {
    // Carregar .env
    loadEnv('.env');
    
    echo "<h2>🧪 Teste das variáveis do .env</h2>";
    echo "<hr>";
    
    // Testar variáveis
    $vars = ['SUPABASE_URL', 'SUPABASE_ANON_KEY', 'SUPABASE_SERVICE_ROLE_KEY'];
    
    foreach ($vars as $var) {
        if (isset($_ENV[$var])) {
            echo "<p><strong>✅ {$var}:</strong><br>";
            
            if ($var === 'SUPABASE_URL') {
                echo $_ENV[$var] . "</p>";
            } else {
                // Mostrar apenas início e fim das chaves por segurança
                $value = $_ENV[$var];
                $masked = substr($value, 0, 10) . '...' . substr($value, -10);
                echo $masked . "</p>";
            }
        } else {
            echo "<p><strong>❌ {$var}:</strong> Não encontrada</p>";
        }
    }
    
    echo "<hr>";
    echo "<h3>🔗 Teste de conexão com Supabase</h3>";
    
    // Teste simples de conexão
    $url = $_ENV['SUPABASE_URL'] . "/rest/v1/";
    $headers = [
        'apikey: ' . $_ENV['SUPABASE_ANON_KEY'],
        'Authorization: Bearer ' . $_ENV['SUPABASE_ANON_KEY']
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode == 200) {
        echo "<p><strong>✅ Conexão:</strong> Supabase conectado com sucesso!</p>";
    } else {
        echo "<p><strong>❌ Conexão:</strong> Erro HTTP {$httpCode}</p>";
        echo "<p><strong>Resposta:</strong> " . htmlspecialchars($response) . "</p>";
    }
    
} catch (Exception $e) {
    echo "<p><strong>❌ Erro:</strong> " . $e->getMessage() . "</p>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Omnigrejas | Criar conta</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Página de Registro" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE é um Painel Administrativo Bootstrap 5 Gratuito, 30 páginas de exemplo usando Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="src/dist/css/adminlte.css" />
</head>
<!--end::Head-->
<!--begin::Body-->
<body class="register-page bg-body-secondary">
    <div class="register-box">
      <div class="register-logo">
        <img src="../Admin-Omnigrejas/src/dist/assets/img/logo.png" width="100" height="100" alt=""> <br>
        <a href="../index2.html">Omnigrejas | Criar Conta</a>
      </div>
      <!-- /.register-logo -->
      <div class="card">
        <div class="card-body register-card-body">
          <p class="register-box-msg">Registre uma nova conta</p>
          
          <?php if ($message): ?>
            <div class="alert alert-<?php echo $messageType === 'success' ? 'success' : 'danger'; ?> alert-dismissible">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <?php echo htmlspecialchars($message); ?>
            </div>
          <?php endif; ?>
          
          <form method="post" action="">
            <div class="input-group mb-3">
              <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required 
                     value="<?php echo htmlspecialchars($_POST['nome'] ?? ''); ?>" />
              <div class="input-group-text"><span class="bi bi-person"></span></div>
            </div>
            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email" required 
                     value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" />
              <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="senha" class="form-control" placeholder="Senha (mín. 6 caracteres)" required minlength="6" />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
            <!--begin::Row-->
            <div class="row">
              <div class="col-12 mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="termos" value="1" id="flexCheckDefault" required />
                  <label class="form-check-label" for="flexCheckDefault">
                    Eu concordo com os <a href="#">termos</a>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-12 mb-2">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>
          
          <!-- /.social-auth-links -->
          <p class="mb-0">
            <a href="index.php" class="text-center"> Eu já tenho uma conta </a>
          </p>
        </div>
        <!-- /.register-card-body -->
      </div>
    </div>
    <!-- /.register-box -->
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
    <script src="../../../dist/js/adminlte.js"></script>
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
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>