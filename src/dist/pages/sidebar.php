  <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="main.php" class="brand-link">
            <img
              src="../../dist/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Omnigrejas</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <!-- Dashboard -->
              <li class="nav-item menu-open">
                <a href="?pagina=home" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                     Painel de Controle
                  
                  </p>
                </a>
              </li>
      
              <!-- Igrejas Dropdown -->
              <li class="nav-item">
                <a  class="nav-link">
                  <i class="nav-icon bi bi-house-door-fill"></i>
                  <p>
                    igrejas
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="?pagina=igrejas" class="nav-link">
                      <i class="nav-icon bi bi-building"></i>
                      <p>Igrejas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?pagina=menu-preco" class="nav-link">
                      <i class="nav-icon bi bi-tag-fill"></i>
                      <p>Menu de Preço</p>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="?pagina=relatorio_cultural" class="nav-link">
                      <i class="nav-icon bi bi-tag-fill"></i>
                      <p>Relatório Cultural</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?pagina=departamentos" class="nav-link">
                      <i class="nav-icon bi bi-diagram-3-fill"></i>
                      <p>Departamentos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?pagina=institucional" class="nav-link">
                      <i class="nav-icon bi bi-info-circle-fill"></i>
                      <p>Institucional</p>
                    </a>
                  </li>
                </ul>
              </li>
      
              <!-- Gestão de Membros Dropdown -->
              <li class="nav-item">
                <a  class="nav-link">
                  <i class="nav-icon bi bi-people-fill"></i>
                  <p>
                    Gestão de Membros
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-person-plus-fill"></i>
                      <p>Criar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-credit-card-fill"></i>
                      <p>Cartão</p>
                    </a>
                  </li>
                </ul>
              </li>
      
              <!-- Link normal sem dropdown -->
             
      
              <!-- Agendamentos -->
              <li class="nav-item">
                <a href="?pagina=agendamentos" class="nav-link">
                  <i class="nav-icon bi bi-calendar-check-fill"></i>
                  <p>Agendamentos</p>
                </a>
              </li>
      
              <!-- Categorias -->
              <li class="nav-item">
                <a href="?pagina=categorias" class="nav-link">
                  <i class="nav-icon bi bi-collection-fill"></i>
                  <p>Categorias</p>
                </a>
              </li>
      
              <!-- Alianças -->
              <li class="nav-item">
                <a href="?pagina=aliancas" class="nav-link">
                  <i class="nav-icon bi bi-shake"></i>
                  <p>Alianças</p>
                </a>
              </li>
      
              <!-- Gestão Users -->
              <li class="nav-item">
                <a href="?pagina=gestao-usuarios" class="nav-link">
                  <i class="nav-icon bi bi-person-gear"></i>
                  <p>Gestão Users</p>
                </a>
              </li>
      
              <!-- Gestão Valores -->
              <li class="nav-item">
                <a href="?pagina=gestao-valores" class="nav-link">
                  <i class="nav-icon bi bi-cash-stack"></i>
                  <p>Gestão Valores</p>
                </a>
              </li>
      
              <!-- Obreiros -->
              <li class="nav-item">
                <a href="?pagina=obreiros" class="nav-link">
                  <i class="nav-icon bi bi-person-badge-fill"></i>
                  <p>Obreiros</p>
                </a>
              </li>
      
              <!-- Operações Dropdown -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-gear-fill"></i>
                  <p>
                    Operações
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="?pagina=servico-produto" class="nav-link">
                      <i class="nav-icon bi bi-basket-fill"></i>
                      <p>Serviços/Produtos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?pagina=publicacoes" class="nav-link">
                      <i class="nav-icon bi bi-megaphone-fill"></i>
                      <p>Ativar Publicidades</p>
                    </a>
                  </li>
                </ul>
              </li>
      
              <!-- Public/Eventos/Normais -->
              <li class="nav-item">
                <a href="?pagina=publicacoes-igrejas" class="nav-link">
                  <i class="nav-icon bi bi-newspaper"></i>
                  <p>Public/Eventos/Normais</p>
                </a>
              </li>
      
              <!-- Configuração-Omini -->
              <li class="nav-item">
                <a href="?pagina=configuracoes" class="nav-link">
                  <i class="nav-icon bi bi-sliders"></i>
                  <p>Configuração-Omini</p>
                </a>
              </li>
      
              <!-- Solicitações/Compras -->
              <li class="nav-item">
                <a href="?pagina=gestao-compras" class="nav-link">
                  <i class="nav-icon bi bi-cart-check-fill"></i>
                  <p>Solicitações/Compras</p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>