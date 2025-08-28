// Criar instância global apenas se ainda não existir
if (!window.sidebarManager) {
  window.sidebarManager = new window.SidebarManager();
}

function initializeUI() {
  if (window.sidebarManager) {
    window.sidebarManager.init();
  }
  if (window.HopeUI) {
    window.HopeUI.init();
  }
}

document.addEventListener('DOMContentLoaded', initializeUI);
document.addEventListener('livewire:navigated', initializeUI);
