/**
 * JavaScript para a página de gestão de membros
 * Arquivo: members.js
 */

document.addEventListener('livewire:loaded', () => {
    console.log('Members page JavaScript loaded');

    // Escutar evento de refresh dos membros
    Livewire.on('refreshMembers', () => {
        console.log('Members refreshed');
        // Lógica adicional de refresh se necessário
    });

    // Resetar formulário quando modal for fechado
    const memberModal = document.getElementById('memberModal');
    if (memberModal) {
        memberModal.addEventListener('hidden.bs.modal', function () {
            // Chamar método do Livewire para resetar modal
            $wire.call('closeModal');
            console.log('Member modal closed and reset');
        });

        memberModal.addEventListener('shown.bs.modal', function () {
            console.log('Member modal opened');
            // Focar no primeiro campo se necessário
            const firstInput = memberModal.querySelector('input, select, textarea');
            if (firstInput) {
                setTimeout(() => firstInput.focus(), 100);
            }
        });
    }

    // Validação adicional de datas
    const dataEntradaInput = document.querySelector('input[name="data_entrada"]');
    const dataSaidaInput = document.querySelector('input[name="data_saida"]');

    if (dataEntradaInput && dataSaidaInput) {
        dataSaidaInput.addEventListener('change', function() {
            const entrada = new Date(dataEntradaInput.value);
            const saida = new Date(this.value);

            if (saida < entrada) {
                alert('A data de saída não pode ser anterior à data de entrada.');
                this.value = '';
            }
        });
    }

    // Melhorar experiência do usuário nos selects
    const selects = document.querySelectorAll('#memberModal select');
    selects.forEach(select => {
        select.addEventListener('change', function() {
            console.log(`${this.name} changed to: ${this.value}`);
        });
    });

    // Loading states para botões
    const saveButton = document.querySelector('#memberModal .btn-primary');
    if (saveButton) {
        // O loading state já é controlado pelo Livewire wire:loading
        console.log('Save button loading states configured via Livewire');
    }

    // Animações suaves para transições
    const cards = document.querySelectorAll('.card-hover');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    console.log('All Members page JavaScript initialized successfully');
});