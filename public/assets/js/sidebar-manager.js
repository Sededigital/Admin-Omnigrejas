window.SidebarManager = class {
    constructor() {
        this.initialized = false;
        this.sidebarState = localStorage.getItem('sidebar-mini') === 'true';
        this.handleToggle = this.handleToggle.bind(this);
        this.handleOutsideClick = this.handleOutsideClick.bind(this);
        this.handleWindowResize = this.handleWindowResize.bind(this);
        this.handleNavigation = this.handleNavigation.bind(this);
    }

    init() {
        this.sidebar = document.querySelector('.sidebar');
        this.toggleBtns = document.querySelectorAll('[data-toggle="sidebar"]');
        this.isMobile = window.innerWidth < 992;

        if (!this.sidebar || !this.toggleBtns.length) return;

        // Remover listeners antigos
        this.cleanup();

        // Restaurar estado
        if (this.sidebarState) {
            this.sidebar.classList.add('sidebar-mini');
        } else {
            this.sidebar.classList.remove('sidebar-mini');
        }

        // Adicionar novos listeners
        this.toggleBtns.forEach(btn => {
            btn.addEventListener('click', this.handleToggle);
        });

        // Adicionar listener para cliques fora do sidebar
        document.addEventListener('click', this.handleOutsideClick);

        // Adicionar listener para redimensionamento da janela
        window.addEventListener('resize', this.handleWindowResize);

        // Adicionar listener para navegação do Livewire
        document.addEventListener('livewire:navigated', this.handleNavigation);

        // Inicializar scrollbar
        this.initScrollbar();

        this.initialized = true;
    }

    handleToggle(e) {
        e.preventDefault();
        e.stopPropagation();

        if (!this.sidebar) return;

        this.sidebarState = !this.sidebarState;
        localStorage.setItem('sidebar-mini', this.sidebarState);

        if (this.sidebarState) {
            this.sidebar.classList.add('sidebar-mini');
        } else {
            this.sidebar.classList.remove('sidebar-mini');
        }

        // Atualizar scrollbar após a transição
        setTimeout(() => this.updateScrollbar(), 300);
    }

    initScrollbar() {
        const scrollContainer = this.sidebar.querySelector('.data-scrollbar');
        if (!scrollContainer || typeof Scrollbar === 'undefined') return;

        // Destruir instância anterior
        const existingInstance = Scrollbar.get(scrollContainer);
        if (existingInstance) {
            existingInstance.destroy();
        }

        // Criar nova instância
        this.scrollbar = Scrollbar.init(scrollContainer, {
            damping: 0.05,
            continuousScrolling: true,
            alwaysShowTracks: true
        });
    }

    updateScrollbar() {
        if (this.scrollbar) {
            this.scrollbar.update();
        }
    }

    handleOutsideClick(event) {
        if (this.isMobile && this.sidebar && !this.sidebar.contains(event.target) &&
            !event.target.closest('[data-toggle="sidebar"]')) {
            this.closeSidebar();
        }
    }

    handleWindowResize() {
        this.isMobile = window.innerWidth < 992;
    }

    handleNavigation() {
        if (this.isMobile) {
            this.closeSidebar();
        }
    }

    closeSidebar() {
        if (this.sidebar && !this.sidebar.classList.contains('sidebar-mini')) {
            this.sidebarState = true;
            localStorage.setItem('sidebar-mini', 'true');
            this.sidebar.classList.add('sidebar-mini');
            setTimeout(() => this.updateScrollbar(), 300);
        }
    }

    cleanup() {
        if (this.toggleBtns) {
            this.toggleBtns.forEach(btn => {
                btn.removeEventListener('click', this.handleToggle);
            });
        }
        document.removeEventListener('click', this.handleOutsideClick);
        window.removeEventListener('resize', this.handleWindowResize);
        document.removeEventListener('livewire:navigated', this.handleNavigation);
    }
};
