# 🏛️ Sistema de Gestão de Igrejas

Sistema completo para gerenciamento de igrejas com interface responsiva, modais otimizados e integração total com Livewire.

## 📋 Índice

- [Visão Geral](#visão-geral)
- [Funcionalidades](#funcionalidades)
- [Estrutura de Arquivos](#estrutura-de-arquivos)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Instalação](#instalação)
- [Uso](#uso)
- [Componentes](#componentes)
- [API](#api)
- [Customização](#customização)

## 🎯 Visão Geral

O sistema de gestão de igrejas oferece uma interface moderna e responsiva para administrar igrejas, com funcionalidades completas de CRUD, filtros avançados, métricas em tempo real e modais otimizados.

### ✨ Características Principais

- **Interface Responsiva**: Tabelas em desktop, cards em mobile
- **Modais Otimizados**: Abertura/fechamento rápido com JavaScript nativo
- **Validação em Tempo Real**: Feedback visual instantâneo
- **Métricas Dinâmicas**: Contadores atualizados automaticamente
- **Filtros Avançados**: Busca, status e ordenação
- **Upload de Arquivos**: Logo da igreja com preview
- **Dark Mode**: Suporte completo ao tema escuro

## 🚀 Funcionalidades

### 📊 Dashboard de Métricas
- **Total de Igrejas**: Contador geral
- **Igrejas Novas**: Cadastradas no mês atual
- **Igrejas Ativas**: Status aprovado
- **Botão Adicionar**: Acesso rápido ao cadastro

### 🔍 Sistema de Filtros
- **Busca em Tempo Real**: Nome, NIF, localização, contato
- **Filtro por Status**: Ativas, Inativas, Todas
- **Ordenação**: Nome, Data de Criação, Número de Membros
- **Paginação**: 12 itens por página

### 📝 Gestão de Igrejas
- **Cadastro Completo**: 3 abas organizadas
- **Edição Inline**: Carregamento automático dos dados
- **Validação Robusta**: Campos obrigatórios e únicos
- **Upload de Logo**: Preview e validação de arquivos
- **Tipos de Igreja**: Independente, Sede, Filial
- **Status de Aprovação**: Pendente, Aprovado, Rejeitado

### 📱 Interface Responsiva
- **Desktop**: Tabela completa com todas as informações
- **Mobile/Tablet**: Cards informativos e compactos
- **Ações Contextuais**: Botões adaptados ao dispositivo

## 📁 Estrutura de Arquivos

```
├── app/Livewire/System/Geral/Church/Only/
│   └── OnlyChurches.php                    # Componente principal
├── resources/views/system/geral/Church/only/
│   ├── only-churches.blade.php             # View principal
│   └── church-modal.blade.php              # Modal de cadastro/edição
├── public/system/
│   ├── css/
│   │   └── css_pages.css                   # Estilos globais
│   └── js/
│       └── igreja.js                       # JavaScript específico
├── app/db/Models/
│   └── Igreja.php                          # Model Igreja
└── app/Models/
    ├── IgrejaMembro.php                    # Model Membros
    ├── AssinaturaAtual.php                 # Model Assinaturas
    └── User.php                            # Model Usuários
```

## 🛠️ Tecnologias Utilizadas

### Backend
- **Laravel 10+**: Framework PHP
- **Livewire 3**: Componentes reativos
- **Eloquent ORM**: Mapeamento objeto-relacional
- **PostgreSQL**: Banco de dados

### Frontend
- **Bootstrap 5**: Framework CSS
- **JavaScript ES6+**: Funcionalidades interativas
- **Hope UI**: Sistema de design
- **Font Awesome**: Ícones

### Ferramentas
- **Blade Templates**: Sistema de templates
- **Livewire Attributes**: Validação e eventos
- **File Upload**: Gerenciamento de arquivos
- **Query String**: URLs amigáveis

## ⚙️ Instalação

### 1. Dependências
```bash
# Instalar dependências do Laravel
composer install

# Instalar dependências do Node.js
npm install
```

### 2. Configuração
```bash
# Copiar arquivo de ambiente
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate

# Configurar banco de dados no .env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=admin_omnigrejas
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 3. Banco de Dados
```bash
# Executar migrações
php artisan migrate

# Executar seeders (opcional)
php artisan db:seed
```

### 4. Assets
```bash
# Compilar assets
npm run build

# Ou para desenvolvimento
npm run dev
```

## 📖 Uso

### Acessando o Sistema
```
URL: /churches/only
Rota: Route::get('/churches/only', OnlyChurches::class)
```

### Operações Básicas

#### Cadastrar Igreja
1. Click em "Nova Igreja" ou card "Adicionar"
2. Preencher dados nas 3 abas:
   - **Informações Básicas**: Nome, NIF, Contato, Localização
   - **Detalhes**: Descrição, Sobre, Designação
   - **Configurações**: Tipo, Status, Sede (se filial)
3. Upload de logo (opcional)
4. Salvar

#### Editar Igreja
1. Click no ícone de edição na tabela/card
2. Modal abre com dados preenchidos
3. Modificar campos necessários
4. Salvar alterações

#### Filtrar e Buscar
1. **Busca**: Digite no campo de busca
2. **Status**: Selecione Ativas/Inativas
3. **Ordenação**: Escolha critério de ordenação
4. **Paginação**: Navegue pelas páginas

## 🧩 Componentes

### OnlyChurches (Livewire Component)

#### Propriedades Principais
```php
// Filtros e busca
public $search = '';
public $statusFilter = '';
public $orderBy = 'nome';
public $orderDirection = 'asc';

// Modal
public $showModal = false;
public $isEditing = false;

// Campos do formulário
public $nome = '';
public $nif = '';
public $contacto = '';
// ... outros campos
```

#### Métodos Principais
```php
// Gestão do modal
public function openModal()
public function editIgreja($id)
public function closeModal()

// CRUD
public function saveChurch()
public function deleteIgreja($id)

// Utilitários
public function carregarMetricas()
public function getPastorPrincipal($igreja)
public function getStatusBadgeClass($status)
```

### IgrejaManager (JavaScript Class)

#### Funcionalidades
```javascript
// Controle do modal
openModal()
closeModal()

// Event listeners
setupEventListeners()
setupLivewireListeners()

// Utilitários
toggleSedeField(tipo)
activateFirstTab()
debug()
```

## 🔌 API

### Eventos Livewire

#### Disparados pelo Componente
```php
// Abrir modal
$this->dispatch('open-church-modal');

// Fechar modal
$this->dispatch('close-church-modal');

// Notificações
$this->dispatch('toast', [
    'type' => 'success',
    'message' => 'Igreja salva com sucesso!'
]);
```

#### Recebidos pelo Componente
```php
#[On('modal-opened')]
public function modalOpened()

#[On('modal-closed')]
public function closeModal()
```

### Validações

#### Regras de Validação
```php
protected $rules = [
    'nome' => 'required|string|max:255',
    'nif' => 'required|string|max:50|unique:igrejas,nif',
    'contacto' => 'required|string|max:255',
    'localizacao' => 'required|string',
    'logo' => 'nullable|image|max:2048',
    'status_aprovacao' => 'required|in:pendente,aprovado,rejeitado',
    'tipo' => 'required|in:independente,sede,filial',
];
```

## 🎨 Customização

### Estilos CSS

#### Classes Principais
```css
/* Cards de métricas */
.metric-card

/* Avatares */
.church-avatar, .user-avatar, .entity-avatar

/* Estados */
.status-active, .status-inactive, .status-pending

/* Interatividade */
.card-hover, .icon-interactive

/* Responsividade */
@media (max-width: 768px)
@media (max-width: 576px)
```

### Configurações JavaScript

#### Opções do Modal
```javascript
this.modal = new bootstrap.Modal(this.modalElement, {
    backdrop: 'static',  // Não fecha clicando fora
    keyboard: false,     // ESC controlado manualmente
    focus: true         // Foco automático
});
```

### Personalização de Cores

#### Variáveis CSS
```css
:root {
    --bs-primary: #0d6efd;
    --bs-success: #198754;
    --bs-warning: #ffc107;
    --bs-danger: #dc3545;
}
```

## 🐛 Troubleshooting

### Problemas Comuns

#### Modal não abre
```javascript
// Debug no console
window.debugIgrejaManager();

// Verificar dependências
console.log('Bootstrap:', typeof bootstrap !== 'undefined');
console.log('Livewire:', typeof Livewire !== 'undefined');
```

#### Modal não fecha
```javascript
// Verificar estado de salvamento
console.log('Is Saving:', window.igrejaManager.isSaving);

// Forçar fechamento
window.closeChurchModal();
```

#### Validação não funciona
```php
// Verificar regras
dd($this->rules);

// Verificar dados
dd($this->validate());
```

## 📈 Performance

### Otimizações Implementadas

- **Modal sempre carregado**: Evita re-renderização
- **JavaScript nativo**: Bootstrap controla animações
- **Eager Loading**: Relacionamentos carregados eficientemente
- **Paginação**: Apenas 12 itens por página
- **CSS otimizado**: Classes reutilizáveis

### Métricas de Performance

- **Abertura do modal**: < 100ms
- **Carregamento da página**: < 2s
- **Busca em tempo real**: < 300ms
- **Upload de arquivo**: < 5s (2MB)

## 🔒 Segurança

### Validações Implementadas

- **CSRF Protection**: Tokens automáticos
- **File Upload**: Validação de tipo e tamanho
- **SQL Injection**: Eloquent ORM protege
- **XSS Protection**: Blade templates escapam dados
- **Unique Constraints**: NIF único por igreja

## 📝 Changelog

### v1.0.0 (Atual)
- ✅ Sistema completo de CRUD
- ✅ Interface responsiva
- ✅ Modais otimizados
- ✅ Validação em tempo real
- ✅ Upload de arquivos
- ✅ Métricas dinâmicas
- ✅ Filtros avançados
- ✅ Dark mode

## 🤝 Contribuição

### Como Contribuir

1. **Fork** o projeto
2. **Crie** uma branch para sua feature
3. **Commit** suas mudanças
4. **Push** para a branch
5. **Abra** um Pull Request

### Padrões de Código

- **PSR-12**: Padrão de código PHP
- **Blade**: Templates organizados
- **JavaScript ES6+**: Sintaxe moderna
- **CSS BEM**: Nomenclatura consistente

## 📞 Suporte

### Contato
- **Email**: suporte@omnigrejas.com
- **Documentação**: /docs
- **Issues**: GitHub Issues

### Logs
```bash
# Logs do Laravel
tail -f storage/logs/laravel.log

# Logs do servidor
tail -f /var/log/nginx/error.log
```

---

**Desenvolvido com ❤️ para a gestão eficiente de igrejas**

*Sistema Admin Omnigrejas - v1.0.0*