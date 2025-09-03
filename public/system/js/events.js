/**
 * JavaScript para a página de gestão de eventos
 * Arquivo: events.js
 */

document.addEventListener('livewire:loaded', () => {
    console.log('Events page JavaScript loaded');

    // Escutar evento de refresh dos eventos
    Livewire.on('refreshEvents', () => {
        console.log('Events refreshed');
        // Lógica adicional de refresh se necessário
    });

    // Resetar formulário quando modal for fechado
    const eventModal = document.getElementById('eventModal');
    if (eventModal) {
        eventModal.addEventListener('hidden.bs.modal', function () {
            // Chamar método do Livewire para resetar modal
            $wire.call('closeModal');
            console.log('Event modal closed and reset');
        });

        eventModal.addEventListener('shown.bs.modal', function () {
            console.log('Event modal opened');
            // Focar no primeiro campo se necessário
            const firstInput = eventModal.querySelector('input, select, textarea');
            if (firstInput) {
                setTimeout(() => firstInput.focus(), 100);
            }
        });
    }

    // Validação de datas e horários
    const dataInicioInput = document.querySelector('input[name="data_inicio"]');
    const dataFimInput = document.querySelector('input[name="data_fim"]');
    const horaInicioInput = document.querySelector('input[name="hora_inicio"]');
    const horaFimInput = document.querySelector('input[name="hora_fim"]');

    if (dataInicioInput && dataFimInput) {
        dataFimInput.addEventListener('change', function() {
            const inicio = new Date(dataInicioInput.value);
            const fim = new Date(this.value);

            if (fim < inicio) {
                alert('A data de fim não pode ser anterior à data de início.');
                this.value = '';
            }
        });
    }

    if (horaInicioInput && horaFimInput) {
        horaFimInput.addEventListener('change', function() {
            const inicio = horaInicioInput.value;
            const fim = this.value;

            if (inicio && fim && fim <= inicio) {
                alert('A hora de fim deve ser posterior à hora de início.');
                this.value = '';
            }
        });
    }

    // Melhorar experiência do usuário nos selects
    const selects = document.querySelectorAll('#eventModal select');
    selects.forEach(select => {
        select.addEventListener('change', function() {
            console.log(`${this.name} changed to: ${this.value}`);
        });
    });

    // Formatação automática de preço
    const precoInput = document.querySelector('input[name="preco"]');
    if (precoInput) {
        precoInput.addEventListener('blur', function() {
            if (this.value) {
                this.value = parseFloat(this.value).toFixed(2);
            }
        });
    }

    // Loading states para botões
    const saveButton = document.querySelector('#eventModal .btn-primary');
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

    // Validação de capacidade
    const capacidadeInput = document.querySelector('input[name="capacidade_maxima"]');
    if (capacidadeInput) {
        capacidadeInput.addEventListener('input', function() {
            if (this.value < 0) {
                this.value = 0;
            }
        });
    }

    console.log('All Events page JavaScript initialized successfully');
});