-- =========================================================
-- OMNIGREJAS • SCHEMA COMPLETO EXPANDIDO (PostgreSQL)
-- Data: 2025-08-24
-- =========================================================

-- Extensões necessárias
CREATE EXTENSION IF NOT EXISTS pgcrypto;
CREATE EXTENSION IF NOT EXISTS citext;

-- ==================== ENUMs ====================
DROP TYPE IF EXISTS role_enum CASCADE;
CREATE TYPE role_enum AS ENUM ('root','super_admin','admin','pastor','ministro','obreiro','diacono','membro','anonymous');

DROP TYPE IF EXISTS approval_status_enum CASCADE;
CREATE TYPE approval_status_enum AS ENUM ('pendente','aprovado','rejeitado');

DROP TYPE IF EXISTS membership_status_enum CASCADE;
CREATE TYPE membership_status_enum AS ENUM ('ativo','inativo');

DROP TYPE IF EXISTS gender_enum CASCADE;
CREATE TYPE gender_enum AS ENUM ('masculino','feminino','nao_informado');

DROP TYPE IF EXISTS transaction_type_enum CASCADE;
CREATE TYPE transaction_type_enum AS ENUM ('entrada','saida');

DROP TYPE IF EXISTS event_type_enum CASCADE;
CREATE TYPE event_type_enum AS ENUM ('culto','evento','retiro','congresso');

-- ==================== USUÁRIOS ====================
CREATE TABLE IF NOT EXISTS users (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  name TEXT NOT NULL,
  email CITEXT UNIQUE,
  email_verified_at TIMESTAMPTZ DEFAULT NULL,
  password TEXT,
  phone TEXT,
  photo_url TEXT,
  role role_enum NOT NULL DEFAULT 'anonymous',
  denomination TEXT DEFAULT 'Geral',
  is_active BOOLEAN NOT NULL DEFAULT TRUE,
  remember_token VARCHAR(300) NULL,
  created_by UUID REFERENCES users(id) ON DELETE SET NULL,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  deleted_at TIMESTAMPTZ NULL
);

-- ==================== IGREJAS ====================
CREATE TABLE IF NOT EXISTS igrejas (
  id BIGSERIAL PRIMARY KEY,
  nome TEXT NOT NULL,
  nif VARCHAR(50) NOT NULL UNIQUE,
  sigla VARCHAR(20),
  descricao TEXT,
  sobre TEXT,
  contacto TEXT,
  localizacao TEXT,
  logo TEXT,
  status_aprovacao approval_status_enum NOT NULL DEFAULT 'pendente',
  sede_id BIGINT REFERENCES igrejas(id) ON DELETE SET NULL,
  tipo TEXT CHECK (tipo IN ('sede','filial','independente')) DEFAULT 'independente',
  designacao TEXT,
  created_by UUID REFERENCES users(id) ON DELETE SET NULL,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  CONSTRAINT fk_sede_check CHECK (id IS NULL OR id <> sede_id),
  deleted_at TIMESTAMPTZ NULL
);

CREATE INDEX idx_igrejas_sede_id ON igrejas(sede_id);

-- ==================== MEMBROS ====================
CREATE TABLE IF NOT EXISTS igreja_membros (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
  user_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  cargo role_enum NOT NULL CHECK (cargo IN ('admin','pastor','ministro','obreiro','diacono','membro')),
  status membership_status_enum NOT NULL DEFAULT 'ativo',
  data_entrada DATE NOT NULL DEFAULT CURRENT_DATE,
  numero_membro TEXT,
  principal BOOLEAN NOT NULL DEFAULT false, -- igreja principal do usuário
  created_by UUID REFERENCES users(id) ON DELETE SET NULL,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  deleted_at TIMESTAMPTZ NULL
);

CREATE UNIQUE INDEX idx_usuario_igreja_principal
ON igreja_membros(user_id)
WHERE principal = true;


CREATE TABLE IF NOT EXISTS membro_perfis (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_membro_id UUID NOT NULL UNIQUE REFERENCES igreja_membros(id) ON DELETE CASCADE,
  genero gender_enum NOT NULL DEFAULT 'nao_informado',
  data_nascimento DATE,
  endereco TEXT,
  observacoes TEXT,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  created_by UUID REFERENCES users(id) ON DELETE SET NULL

);

CREATE TABLE IF NOT EXISTS igreja_membros_historico (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_membro_id UUID NOT NULL REFERENCES igreja_membros(id) ON DELETE CASCADE,
  cargo role_enum NOT NULL,
  inicio DATE NOT NULL DEFAULT CURRENT_DATE,
  fim DATE,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- ==================== MINISTÉRIOS ====================
CREATE TABLE IF NOT EXISTS ministerios (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE CASCADE,
  nome TEXT NOT NULL,
  descricao TEXT,
  ativo BOOLEAN DEFAULT TRUE,
  created_at TIMESTAMPTZ DEFAULT now(),
  deleted_at TIMESTAMPTZ NULL
);

CREATE TABLE IF NOT EXISTS igreja_membros_ministerios (
  membro_id UUID REFERENCES igreja_membros(id) ON DELETE CASCADE,
  ministerio_id UUID REFERENCES ministerios(id) ON DELETE CASCADE,
  funcao TEXT,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  deleted_at TIMESTAMPTZ NULL,
  PRIMARY KEY (membro_id, ministerio_id)
);

-- ==================== FINANCEIRO ====================
CREATE TABLE IF NOT EXISTS financeiro_categorias (
  id BIGSERIAL PRIMARY KEY,
  igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
  nome TEXT NOT NULL,
  tipo transaction_type_enum NOT NULL,
  UNIQUE (igreja_id, nome, tipo),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS financeiro_movimentos (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
  tipo transaction_type_enum NOT NULL,
  categoria_id BIGINT REFERENCES financeiro_categorias(id) ON DELETE SET NULL,
  valor NUMERIC(14,2) NOT NULL CHECK (valor >= 0),
  descricao TEXT,
  data_transacao DATE NOT NULL DEFAULT CURRENT_DATE,
  metodo_pagamento TEXT,
  responsavel_id UUID REFERENCES users(id) ON DELETE SET NULL,
  comprovante_url TEXT,
  created_by UUID REFERENCES users(id) ON DELETE SET NULL,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  deleted_at TIMESTAMPTZ NULL
);
CREATE INDEX idx_financeiro_movimentos_igreja_data ON financeiro_movimentos(igreja_id, data_transacao);

-- ===============================================
-- Eventos únicos (inclui cultos especiais, reuniões, ensaios, congressos)
-- ===============================================
DROP TABLE IF EXISTS eventos CASCADE;
CREATE TABLE IF NOT EXISTS eventos (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
    titulo TEXT NOT NULL,
    tipo TEXT CHECK (tipo IN ('culto','reuniao','ensaio','evento_social','outro')) DEFAULT 'outro',
    data_evento DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fim TIME,
    local_evento TEXT,
    descricao TEXT,
    created_by TEXT NOT NULL,
    responsavel UUID REFERENCES users(id) ON DELETE SET NULL,
    status TEXT CHECK (status IN ('agendado','realizado','cancelado')) DEFAULT 'agendado',
    created_at TIMESTAMPTZ DEFAULT now(),
    updated_at TIMESTAMPTZ DEFAULT now(),
    deleted_at TIMESTAMPTZ NULL
);

CREATE TABLE IF NOT EXISTS escalas (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  culto_evento_id UUID REFERENCES eventos(id) ON DELETE CASCADE,
  membro_id UUID REFERENCES igreja_membros(id) ON DELETE CASCADE,
  funcao TEXT NOT NULL,
  observacoes TEXT,
  created_at TIMESTAMPTZ DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- ==================== SOCIAL ====================
CREATE TABLE IF NOT EXISTS posts (
  id BIGSERIAL PRIMARY KEY,
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE SET NULL,
  author_id UUID REFERENCES users(id) ON DELETE SET NULL,
  titulo TEXT,
  content TEXT NOT NULL,
  media_url TEXT,
  media_type TEXT,
  is_video BOOLEAN,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS post_reactions (
  post_id BIGINT REFERENCES posts(id) ON DELETE CASCADE,
  user_id UUID REFERENCES users(id) ON DELETE CASCADE,
  reaction TEXT CHECK (reaction IN ('like','love','haha','wow','sad','angry')),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  PRIMARY KEY (post_id, user_id)
);

-- ==================== AUDITORIA ====================
CREATE TABLE IF NOT EXISTS auditoria_logs (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  tabela TEXT NOT NULL,
  registro_id TEXT NOT NULL,
  acao TEXT NOT NULL CHECK (acao IN ('insert','update','delete')),
  usuario_id UUID REFERENCES users(id) ON DELETE SET NULL,
  data_acao TIMESTAMPTZ NOT NULL DEFAULT now(),
  valores JSONB
);

-- ==================== COMUNICAÇÃO INTERNA ====================
CREATE TABLE IF NOT EXISTS comunicacoes (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
  titulo TEXT NOT NULL,
  conteudo TEXT NOT NULL,
  tipo TEXT CHECK (tipo IN ('notificacao','aviso','campanha_oracao','diretiva')),
  destino TEXT CHECK (destino IN ('sede','filial','todos')),
  data_envio TIMESTAMPTZ NOT NULL DEFAULT now(),
  enviado_por UUID REFERENCES users(id) ON DELETE SET NULL,
  status TEXT NOT NULL DEFAULT 'enviado' CHECK (status IN ('rascunho','enviado','lido')),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS mensagens_privadas (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  remetente_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  destinatario_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  conteudo TEXT NOT NULL,
  lida BOOLEAN DEFAULT FALSE,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS igreja_chats (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
  nome TEXT NOT NULL,
  descricao TEXT,
  criado_por UUID REFERENCES users(id) ON DELETE SET NULL,
  created_at TIMESTAMPTZ DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS igreja_chat_mensagens (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  chat_id UUID NOT NULL REFERENCES igreja_chats(id) ON DELETE CASCADE,
  autor_id UUID REFERENCES users(id) ON DELETE SET NULL,
  conteudo TEXT NOT NULL,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  lida_por JSONB DEFAULT '[]'
);

CREATE TABLE IF NOT EXISTS notificacoes (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  user_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  tipo TEXT NOT NULL,
  referencia_id UUID,
  titulo TEXT,
  mensagem TEXT,
  lida BOOLEAN DEFAULT FALSE,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- ==================== NOVOS MÓDULOS ====================

-- Educação / Discipulado
CREATE TABLE IF NOT EXISTS cursos (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE CASCADE,
  titulo TEXT NOT NULL,
  descricao TEXT,
  duracao_semanas INT,
  ativo BOOLEAN DEFAULT TRUE,
  created_at TIMESTAMPTZ DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS curso_conteudos (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  curso_id UUID REFERENCES cursos(id) ON DELETE CASCADE,
  titulo TEXT NOT NULL,
  tipo TEXT CHECK (tipo IN ('video','pdf','texto')),
  url TEXT,
  ordem INT,
  created_at TIMESTAMPTZ DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS curso_matriculas (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  curso_id UUID REFERENCES cursos(id) ON DELETE CASCADE,
  membro_id UUID REFERENCES igreja_membros(id) ON DELETE CASCADE,
  data_matricula TIMESTAMPTZ DEFAULT now(),
  status TEXT DEFAULT 'ativo' CHECK (status IN ('ativo','concluido','cancelado')),
  UNIQUE (curso_id, membro_id),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS curso_progresso (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  matricula_id UUID REFERENCES curso_matriculas(id) ON DELETE CASCADE,
  conteudo_id UUID REFERENCES curso_conteudos(id) ON DELETE CASCADE,
  concluido BOOLEAN DEFAULT FALSE,
  data_conclusao TIMESTAMPTZ,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- Relatórios e Estatísticas
CREATE TABLE IF NOT EXISTS relatorios_cache (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  tipo TEXT NOT NULL,
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE CASCADE,
  periodo TEXT,
  dados JSONB,
  gerado_em TIMESTAMPTZ DEFAULT now(),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- Gestão de Recursos
CREATE TABLE IF NOT EXISTS recursos (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE CASCADE,
  nome TEXT NOT NULL,
  tipo TEXT NOT NULL,
  descricao TEXT,
  disponivel BOOLEAN DEFAULT TRUE,
  created_at TIMESTAMPTZ DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS agendamentos_recursos (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  recurso_id UUID REFERENCES recursos(id) ON DELETE CASCADE,
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE CASCADE,
  inicio TIMESTAMPTZ NOT NULL,
  fim TIMESTAMPTZ NOT NULL,
  reservado_por UUID REFERENCES users(id) ON DELETE SET NULL,
  status TEXT DEFAULT 'pendente' CHECK (status IN ('pendente','aprovado','rejeitado','concluido')),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- Doações Online
CREATE TABLE IF NOT EXISTS doacoes_online (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE CASCADE,
  user_id UUID REFERENCES users(id) ON DELETE SET NULL,
  valor NUMERIC(14,2) NOT NULL,
  metodo TEXT CHECK (metodo IN ('cash','multicaixa_express','transferencia','deposito','tpa')),
  referencia TEXT,
  data TIMESTAMPTZ DEFAULT now(),
  status TEXT DEFAULT 'confirmado' CHECK (status IN ('pendente','confirmado','falhou')),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- Voluntariado
CREATE TABLE IF NOT EXISTS voluntarios (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  membro_id UUID REFERENCES igreja_membros(id) ON DELETE CASCADE,
  area_interesse TEXT,
  disponibilidade TEXT,
  ativo BOOLEAN DEFAULT TRUE,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS escala_auto (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE CASCADE,
  voluntario_id UUID REFERENCES voluntarios(id) ON DELETE CASCADE,
  data DATE NOT NULL,
  funcao TEXT,
  status TEXT DEFAULT 'agendado' CHECK (status IN ('agendado','concluido','cancelado')),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- Módulo Pastoral
CREATE TABLE IF NOT EXISTS atendimentos_pastorais (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE CASCADE,
  membro_id UUID REFERENCES igreja_membros(id) ON DELETE SET NULL,
  pastor_id UUID REFERENCES users(id) ON DELETE SET NULL,
  tipo TEXT CHECK (tipo IN ('visita','aconselhamento','outro')),
  descricao TEXT,
  data_atendimento TIMESTAMPTZ DEFAULT now(),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS pedidos_oracao (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE CASCADE,
  membro_id UUID REFERENCES igreja_membros(id) ON DELETE SET NULL,
  pedido TEXT NOT NULL,
  atendido BOOLEAN DEFAULT FALSE,
  data_pedido TIMESTAMPTZ DEFAULT now(),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- Gamificação
CREATE TABLE IF NOT EXISTS engajamento_pontos (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  user_id UUID REFERENCES users(id) ON DELETE CASCADE,
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE CASCADE,
  pontos INT DEFAULT 0,
  motivo TEXT,
  data TIMESTAMPTZ DEFAULT now(),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS engajamento_badges (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  user_id UUID REFERENCES users(id) ON DELETE CASCADE,
  igreja_id BIGINT REFERENCES igrejas(id) ON DELETE CASCADE,
  badge TEXT NOT NULL,
  descricao TEXT,
  data TIMESTAMPTZ DEFAULT now(),
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);


-- =========================================================
-- OMNIGREJAS • MIGRAÇÃO INCREMENTAL
-- Novas tabelas: enquete_denuncias, financeiro_auditoria, agenda
-- =========================================================

-- ==================== ENQUETE_DENUNCIAS ====================
CREATE TABLE IF NOT EXISTS enquete_denuncias (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
  texto TEXT NOT NULL,
  data TIMESTAMPTZ NOT NULL DEFAULT now(),
  criado_por UUID REFERENCES users(id) ON DELETE SET NULL,
  created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- ==================== FINANCEIRO_AUDITORIA ====================
CREATE TABLE IF NOT EXISTS financeiro_auditoria (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  movimento_id UUID NOT NULL REFERENCES financeiro_movimentos(id) ON DELETE CASCADE,
  valor_anterior NUMERIC(14,2),
  valor_novo NUMERIC(14,2),
  detalhes JSONB DEFAULT '{}'::jsonb,
  alterado_por UUID REFERENCES users(id) ON DELETE SET NULL,
  data_alteracao TIMESTAMPTZ NOT NULL DEFAULT now()
);


-- ==================== AGENDA ====================
CREATE TABLE IF NOT EXISTS agenda (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  user_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  evento_id UUID REFERENCES eventos(id) ON DELETE CASCADE,
  lembrete INTERVAL,
  status TEXT CHECK (status IN ('pendente','confirmado','cancelado')) NOT NULL DEFAULT 'pendente',
  created_at TIMESTAMPTZ NOT NULL DEFAULT now()
);


-- ==================== MARKETPLACE ====================

-- Produtos/Serviços oferecidos por uma igreja
CREATE TABLE IF NOT EXISTS marketplace_produtos (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
  nome TEXT NOT NULL,
  descricao TEXT,
  preco NUMERIC(14,2) NOT NULL CHECK (preco >= 0),
  estoque INT DEFAULT 0 CHECK (estoque >= 0),
  ativo BOOLEAN DEFAULT TRUE,
  created_at TIMESTAMPTZ DEFAULT now(),
  updated_at TIMESTAMPTZ DEFAULT now()
);

-- Pedidos feitos por membros, pastores ou até usuários anônimos
CREATE TABLE IF NOT EXISTS marketplace_pedidos (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  produto_id UUID NOT NULL REFERENCES marketplace_produtos(id) ON DELETE CASCADE,
  igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
  comprador_id UUID REFERENCES users(id) ON DELETE SET NULL,
  quantidade INT NOT NULL DEFAULT 1 CHECK (quantidade > 0),
  status TEXT NOT NULL DEFAULT 'pendente' CHECK (status IN ('pendente','pago','enviado','concluido','cancelado')),
  data_pedido TIMESTAMPTZ DEFAULT now()
);

-- Pagamentos associados aos pedidos
CREATE TABLE IF NOT EXISTS marketplace_pagamentos (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  pedido_id UUID NOT NULL REFERENCES marketplace_pedidos(id) ON DELETE CASCADE,
  metodo TEXT CHECK (metodo IN ('multicaixa_express','cash','tpa','deposito')),
  valor NUMERIC(14,2) NOT NULL CHECK (valor >= 0),
  referencia TEXT,
  status TEXT NOT NULL DEFAULT 'pendente' CHECK (status IN ('pendente','confirmado','falhou','estornado')),
  data_pagamento TIMESTAMPTZ DEFAULT now()
);



-- ===============================================
-- Cultos semanais fixos (recorrentes)
-- ===============================================
DROP TABLE IF EXISTS cultos_padrao CASCADE;
CREATE TABLE IF NOT EXISTS cultos_padrao (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
    dia_semana INT NOT NULL CHECK (dia_semana BETWEEN 0 AND 6), -- 0=Dom, 6=Sáb
    hora_inicio TIME NOT NULL,
    hora_fim TIME,
    titulo TEXT NOT NULL,
    descricao TEXT,
    ativo BOOLEAN DEFAULT TRUE,
    criado_em TIMESTAMPTZ DEFAULT now(),
    deleted_at TIMESTAMPTZ NULL
);



-- ===============================================
-- Tabela de Comentários (para posts e eventos)
-- ===============================================
CREATE TABLE IF NOT EXISTS comentarios (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    user_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    post_id BIGINT REFERENCES posts(id) ON DELETE CASCADE,
    evento_id UUID REFERENCES eventos(id) ON DELETE CASCADE,
    comentario_pai UUID REFERENCES comentarios(id) ON DELETE CASCADE,
    conteudo TEXT NOT NULL,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);


-- ===============================================
-- Habilidades dos Membros (Mapa de Talentos)
-- ===============================================
CREATE TABLE IF NOT EXISTS habilidades_membros (
  membro_id UUID REFERENCES igreja_membros(id) ON DELETE CASCADE,
  habilidade TEXT NOT NULL,
  nivel TEXT CHECK (nivel IN ('iniciante','intermediario','avancado')),
  PRIMARY KEY (membro_id, habilidade)
);




-- Índices auxiliares
CREATE INDEX idx_marketplace_produtos_igreja ON marketplace_produtos(igreja_id);
CREATE INDEX idx_marketplace_pedidos_comprador ON marketplace_pedidos(comprador_id);
CREATE INDEX idx_marketplace_pedidos_igreja ON marketplace_pedidos(igreja_id);
CREATE INDEX idx_marketplace_pagamentos_pedido ON marketplace_pagamentos(pedido_id);



-- ==================== ÍNDICES ====================
CREATE INDEX idx_igreja_membros_user ON igreja_membros(user_id);
CREATE INDEX idx_igreja_membros_igreja ON igreja_membros(igreja_id);
CREATE INDEX idx_posts_igreja ON posts(igreja_id);
CREATE INDEX idx_financeiro_data ON financeiro_movimentos(data_transacao);

-- Função para gerar numero_membro automaticamente
CREATE OR REPLACE FUNCTION gerar_numero_membro()
RETURNS TRIGGER AS $$
DECLARE
    novo_numero INT;
BEGIN
    -- Pega o próximo número dentro da mesma igreja
    SELECT COALESCE(MAX(SPLIT_PART(numero_membro, '-', 2)::INT), 0) + 1
    INTO novo_numero
    FROM igreja_membros
    WHERE igreja_id = NEW.igreja_id;

    -- Define numero_membro no formato Omnigreja-<n>
    NEW.numero_membro := 'Omnigreja-' || novo_numero::TEXT;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;



-- Função para definir igreja principal de um membro
DROP TRIGGER IF EXISTS trg_gerar_numero_membro ON igreja_membros;
CREATE TRIGGER trg_gerar_numero_membro
BEFORE INSERT ON igreja_membros
FOR EACH ROW
WHEN (NEW.numero_membro IS NULL) -- só gera se o campo estiver vazio
EXECUTE FUNCTION gerar_numero_membro();


CREATE OR REPLACE FUNCTION set_principal_igreja_membro()
RETURNS TRIGGER AS $$
BEGIN
  IF (SELECT tipo FROM igrejas WHERE id = NEW.igreja_id) IN ('sede', 'independente') THEN
    NEW.principal := true;
  END IF;
  RETURN NEW;
END;
$$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS trg_set_principal_igreja_membro ON igreja_membros;

CREATE TRIGGER trg_set_principal_igreja_membro
BEFORE INSERT ON igreja_membros
FOR EACH ROW
EXECUTE FUNCTION set_principal_igreja_membro();


-- Habilita extensão necessária para UUID
CREATE EXTENSION IF NOT EXISTS pgcrypto;

-- =========================================================
-- OMNIGREJAS • MÓDULO DE ASSINATURAS E PACOTES (BILLING)
-- Versão: 2025-09-01
-- =========================================================

-- ==================== MÓDULOS ====================
CREATE TABLE modulos (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(255) UNIQUE NOT NULL, -- Ex: 'financeiro', 'igrejas', 'cursos'
    descricao TEXT,
    created_at TIMESTAMPTZ DEFAULT now(),
    updated_at TIMESTAMPTZ DEFAULT now()
);

-- ==================== PACOTES ====================
CREATE TABLE pacote (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL UNIQUE,
    descricao TEXT,
    preco NUMERIC(10,2) NOT NULL,
    duracao_meses INT NOT NULL,       -- duração padrão em meses
    trial_dias INT DEFAULT 0,         -- número de dias de trial padrão
    created_at TIMESTAMPTZ DEFAULT now(),
    updated_at TIMESTAMPTZ DEFAULT now(),
    deleted_at TIMESTAMPTZ NULL
);

-- ==================== PERMISSÕES DE PACOTES ====================
CREATE TABLE pacote_permissao (
    id BIGSERIAL PRIMARY KEY,
    pacote_id BIGINT NOT NULL REFERENCES pacote(id) ON DELETE CASCADE,
    modulo_id BIGINT NOT NULL REFERENCES modulos(id) ON DELETE CASCADE,
    permissao TEXT NOT NULL CHECK (permissao IN ('leitura','escrita','nenhuma')),
    created_at TIMESTAMPTZ DEFAULT now(),
    updated_at TIMESTAMPTZ DEFAULT now(),
    deleted_at TIMESTAMPTZ NULL,
    UNIQUE (pacote_id, modulo_id)
);

-- ==================== HISTÓRICO DE ASSINATURAS ====================
CREATE TABLE assinatura_historico (
    id BIGSERIAL PRIMARY KEY,
    igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
    pacote_id BIGINT NOT NULL REFERENCES pacote(id) ON DELETE CASCADE,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    valor NUMERIC(10,2) NOT NULL,
    status TEXT NOT NULL CHECK (status IN ('Ativo','Cancelado','Expirado')),
    forma_pagamento TEXT,
    transacao_id UUID,
    trial_fim DATE,                   -- data final real do trial
    duracao_meses_custom INT,         -- se cliente escolheu duração diferente
    vitalicio BOOLEAN DEFAULT FALSE,  -- assinatura vitalícia
    created_at TIMESTAMPTZ DEFAULT now(),
    updated_at TIMESTAMPTZ DEFAULT now()
);

-- ==================== ASSINATURA ATUAL ====================
CREATE TABLE assinatura_atual (
    igreja_id BIGINT PRIMARY KEY REFERENCES igrejas(id) ON DELETE CASCADE,
    pacote_id BIGINT NOT NULL REFERENCES pacote(id),
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    status TEXT NOT NULL CHECK (status IN ('Ativo','Cancelado','Expirado')) DEFAULT 'Ativo',
    trial_fim DATE,                   -- data final do trial atual
    duracao_meses_custom INT,         -- caso esteja diferente do pacote
    vitalicio BOOLEAN DEFAULT FALSE,  -- se for vitalício
    created_at TIMESTAMPTZ DEFAULT now(),
    updated_at TIMESTAMPTZ DEFAULT now()
);

-- ==================== PAGAMENTOS DE ASSINATURAS ====================
CREATE TABLE assinatura_pagamentos (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    assinatura_id BIGINT NOT NULL REFERENCES assinatura_historico(id) ON DELETE CASCADE,
    igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
    valor NUMERIC(10,2) NOT NULL,
    metodo_pagamento TEXT NOT NULL CHECK (metodo_pagamento IN ('deposito','cartao','multicaixa_express','tpa','transferencia','outro')),
    referencia TEXT,
    status TEXT NOT NULL CHECK (status IN ('pendente','confirmado','falhou','estornado')) DEFAULT 'pendente',
    data_pagamento TIMESTAMPTZ DEFAULT now(),
    created_at TIMESTAMPTZ DEFAULT now(),
    updated_at TIMESTAMPTZ DEFAULT now()
);

CREATE INDEX idx_assinatura_pagamentos_igreja ON assinatura_pagamentos(igreja_id);
CREATE INDEX idx_assinatura_pagamentos_status ON assinatura_pagamentos(status);

-- ==================== IGREJAS ASSINADAS ====================
CREATE TABLE igrejas_assinadas (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
    pacote_id BIGINT NOT NULL REFERENCES pacote(id) ON DELETE CASCADE,
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    data_adesao TIMESTAMPTZ DEFAULT now(),
    data_cancelamento TIMESTAMPTZ,
    observacoes TEXT,
    created_at TIMESTAMPTZ DEFAULT now(),
    updated_at TIMESTAMPTZ DEFAULT now(),
    UNIQUE (igreja_id, pacote_id, ativo)
);

-- ==================== LOGS DE ASSINATURAS ====================
CREATE TABLE assinatura_logs (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
    pacote_id BIGINT REFERENCES pacote(id) ON DELETE SET NULL,
    acao TEXT NOT NULL CHECK (acao IN ('criado','upgrade','downgrade','cancelado','renovado','pagamento','expirado')),
    descricao TEXT,
    usuario_id UUID REFERENCES users(id) ON DELETE SET NULL,
    data_acao TIMESTAMPTZ DEFAULT now(),
    detalhes JSONB DEFAULT '{}'::jsonb
);
CREATE INDEX idx_assinatura_logs_igreja ON assinatura_logs(igreja_id);

-- ==================== CICLOS DE COBRANÇA ====================
CREATE TABLE assinatura_ciclos (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    assinatura_id BIGINT NOT NULL REFERENCES assinatura_historico(id) ON DELETE CASCADE,
    inicio DATE NOT NULL,
    fim DATE NOT NULL,
    valor NUMERIC(10,2) NOT NULL,
    status TEXT NOT NULL CHECK (status IN ('pendente','pago','atrasado','falhou')),
    gerado_em TIMESTAMPTZ DEFAULT now()
);

-- ==================== MÉTODOS DE PAGAMENTO ====================
CREATE TABLE igrejas_metodos_pagamento (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
    tipo TEXT NOT NULL CHECK (tipo IN ('cash','multicaixa_express','tpa','transferencia','deposito')),
    detalhes JSONB DEFAULT '{}'::jsonb,
    ativo BOOLEAN DEFAULT TRUE,
    criado_em TIMESTAMPTZ DEFAULT now()
);

-- ==================== CUPONS DE DESCONTO ====================
CREATE TABLE assinatura_cupons (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    codigo VARCHAR(50) UNIQUE NOT NULL,
    descricao TEXT,
    desconto_percentual INT CHECK (desconto_percentual BETWEEN 0 AND 100),
    desconto_valor NUMERIC(10,2),
    valido_de DATE,
    valido_ate DATE,
    uso_max INT DEFAULT 1,
    usado INT DEFAULT 0,
    ativo BOOLEAN DEFAULT TRUE,
    criado_em TIMESTAMPTZ DEFAULT now()
);

CREATE TABLE assinatura_cupons_uso (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    assinatura_id BIGINT NOT NULL REFERENCES assinatura_historico(id) ON DELETE CASCADE,
    cupom_id UUID NOT NULL REFERENCES assinatura_cupons(id) ON DELETE CASCADE,
    usado_em TIMESTAMPTZ DEFAULT now()
);

-- ==================== RENOVAÇÃO AUTOMÁTICA ====================
CREATE TABLE assinatura_auto_renovacao (
    igreja_id BIGINT PRIMARY KEY REFERENCES igrejas(id) ON DELETE CASCADE,
    ativo BOOLEAN DEFAULT TRUE,
    metodo_pagamento_id UUID REFERENCES igrejas_metodos_pagamento(id) ON DELETE SET NULL,
    ultima_tentativa TIMESTAMPTZ,
    proxima_tentativa TIMESTAMPTZ
);

-- ==================== FALHAS DE PAGAMENTO ====================
CREATE TABLE assinatura_pagamentos_falhas (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    pagamento_id UUID REFERENCES assinatura_pagamentos(id) ON DELETE CASCADE,
    igreja_id BIGINT NOT NULL REFERENCES igrejas(id) ON DELETE CASCADE,
    motivo TEXT NOT NULL,
    data TIMESTAMPTZ DEFAULT now(),
    resolvido BOOLEAN DEFAULT FALSE
);

-- ==================== NOTIFICAÇÕES DE COBRANÇA ====================
CREATE TABLE assinatura_notificacoes (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    assinatura_id BIGINT NOT NULL REFERENCES assinatura_historico(id) ON DELETE CASCADE,
    tipo TEXT NOT NULL CHECK (tipo IN ('lembrete','atraso','cancelamento')),
    titulo TEXT NOT NULL,
    mensagem TEXT,
    enviada_em TIMESTAMPTZ,
    lida_em TIMESTAMPTZ,
    status TEXT CHECK (status IN ('enviada','lida','ignorada')) DEFAULT 'enviada',
    created_at TIMESTAMPTZ DEFAULT now(),
    updated_at TIMESTAMPTZ DEFAULT now()
);

-- ==================== HISTÓRICO DE MUDANÇAS DE PLANO ====================
CREATE TABLE assinatura_upgrades (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    assinatura_id BIGINT NOT NULL REFERENCES assinatura_historico(id) ON DELETE CASCADE,
    pacote_anterior BIGINT REFERENCES pacote(id) ON DELETE SET NULL,
    pacote_novo BIGINT NOT NULL REFERENCES pacote(id) ON DELETE CASCADE,
    valor_diferenca NUMERIC(10,2),
    data_upgrade DATE NOT NULL DEFAULT CURRENT_DATE,
    motivo TEXT,
    usuario_id UUID REFERENCES users(id) ON DELETE SET NULL,
    created_at TIMESTAMPTZ DEFAULT now(),
    updated_at TIMESTAMPTZ DEFAULT now()
);

-- ==================== FATURAS ====================
CREATE TABLE assinatura_faturas (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    assinatura_id BIGINT NOT NULL REFERENCES assinatura_historico(id) ON DELETE CASCADE,
    numero_fatura VARCHAR(50) UNIQUE NOT NULL,
    valor_total NUMERIC(10,2) NOT NULL,
    moeda VARCHAR(10) DEFAULT 'AKZ',
    status TEXT CHECK (status IN ('pendente','paga','cancelada','estornada')) DEFAULT 'pendente',
    data_emissao TIMESTAMPTZ DEFAULT now(),
    data_vencimento DATE,
    data_pagamento TIMESTAMPTZ,
    detalhes JSONB DEFAULT '{}'::jsonb
);

-- ==================== ÍNDICES AUXILIARES ====================
CREATE INDEX idx_assinatura_notificacoes_assinatura ON assinatura_notificacoes(assinatura_id);
CREATE INDEX idx_assinatura_notificacoes_tipo ON assinatura_notificacoes(tipo);
CREATE INDEX idx_assinatura_upgrades_assinatura ON assinatura_upgrades(assinatura_id);
CREATE INDEX idx_assinatura_upgrades_data ON assinatura_upgrades(data_upgrade);



-- =========================================================
-- OMNIGREJAS • VIEWS DE ASSINATURAS / BILLING
-- Versão: 2025-09-01
-- =========================================================

-- ==================== VIEW: ASSINATURAS ATIVAS ====================
CREATE OR REPLACE VIEW view_assinaturas_ativas AS
SELECT
    i.id AS igreja_id,
    i.nome AS igreja_nome,
    a.pacote_id,
    p.nome AS pacote_nome,
    a.data_inicio,
    a.data_fim,
    a.trial_fim,
    a.vitalicio,
    a.status
FROM assinatura_atual a
JOIN igrejas i ON i.id = a.igreja_id
JOIN pacote p ON p.id = a.pacote_id
WHERE a.status = 'Ativo'
  AND (a.vitalicio = TRUE OR a.data_fim IS NULL OR a.data_fim >= CURRENT_DATE);

-- ==================== VIEW: ASSINATURAS INATIVAS ====================
CREATE OR REPLACE VIEW view_assinaturas_inativas AS
SELECT
    i.id AS igreja_id,
    i.nome AS igreja_nome,
    a.pacote_id,
    p.nome AS pacote_nome,
    a.data_inicio,
    a.data_fim,
    a.trial_fim,
    a.vitalicio,
    a.status
FROM assinatura_atual a
JOIN igrejas i ON i.id = a.igreja_id
JOIN pacote p ON p.id = a.pacote_id
WHERE (a.status IN ('Cancelado','Expirado'))
   OR (a.vitalicio = FALSE AND a.data_fim < CURRENT_DATE);

-- ==================== VIEW: PAGAMENTOS CONFIRMADOS ====================
CREATE OR REPLACE VIEW view_assinatura_pagamentos_confirmados AS
SELECT
    ap.id AS pagamento_id,
    ap.igreja_id,
    i.nome AS igreja_nome,
    ap.valor,
    ap.metodo_pagamento,
    ap.status,
    ap.data_pagamento
FROM assinatura_pagamentos ap
JOIN igrejas i ON i.id = ap.igreja_id
WHERE ap.status = 'confirmado'
ORDER BY ap.data_pagamento DESC;

-- ==================== VIEW: ASSINATURAS EM ATRASO ====================
CREATE OR REPLACE VIEW view_assinaturas_em_atraso AS
SELECT
    ac.id AS ciclo_id,
    ac.assinatura_id,
    ah.igreja_id,
    i.nome AS igreja_nome,
    ah.pacote_id,
    p.nome AS pacote_nome,
    ac.inicio,
    ac.fim,
    ac.valor,
    ac.status
FROM assinatura_ciclos ac
JOIN assinatura_historico ah ON ah.id = ac.assinatura_id
JOIN igrejas i ON i.id = ah.igreja_id
JOIN pacote p ON p.id = ah.pacote_id
WHERE ac.status IN ('pendente','atrasado')
  AND ac.fim < CURRENT_DATE;

-- ==================== VIEW: LOGS DE ASSINATURAS ====================
CREATE OR REPLACE VIEW view_assinatura_logs AS
SELECT
    al.id AS log_id,
    al.igreja_id,
    i.nome AS igreja_nome,
    al.pacote_id,
    p.nome AS pacote_nome,
    al.acao,
    al.descricao,
    u.name AS usuario,
    al.data_acao,
    al.detalhes
FROM assinatura_logs al
JOIN igrejas i ON i.id = al.igreja_id
LEFT JOIN pacote p ON p.id = al.pacote_id
LEFT JOIN users u ON u.id = al.usuario_id
ORDER BY al.data_acao DESC;

-- =========================================================
-- FIM DAS VIEWS DE ASSINATURAS
-- =========================================================



-- =========================================================
-- OMNIGREJAS • FUNCTIONS (Billing)
-- Versão: 2025-09-01
-- =========================================================

-- ==================== FUNCTION: RENOVAR ASSINATURA ====================
CREATE OR REPLACE FUNCTION renovar_assinatura(p_igreja BIGINT, p_meses INT)
RETURNS VOID AS $$
BEGIN
    UPDATE assinatura_atual
    SET data_inicio = CURRENT_DATE,
        data_fim = CASE WHEN vitalicio THEN data_fim ELSE CURRENT_DATE + (p_meses || ' months')::INTERVAL END,
        status = 'Ativo',
        updated_at = now()
    WHERE igreja_id = p_igreja;

    INSERT INTO assinatura_historico (igreja_id, pacote_id, data_inicio, data_fim, valor, status, vitalicio)
    SELECT igreja_id, pacote_id, CURRENT_DATE,
           CASE WHEN vitalicio THEN CURRENT_DATE ELSE CURRENT_DATE + (p_meses || ' months')::INTERVAL END,
           0, 'Ativo', vitalicio
    FROM assinatura_atual
    WHERE igreja_id = p_igreja;

    INSERT INTO assinatura_logs (igreja_id, pacote_id, acao, descricao, data_acao)
    SELECT igreja_id, pacote_id, 'renovado', 'Renovação automática', now()
    FROM assinatura_atual
    WHERE igreja_id = p_igreja;
END;
$$ LANGUAGE plpgsql;

-- ==================== FUNCTION: CANCELAR ASSINATURA ====================
CREATE OR REPLACE FUNCTION cancelar_assinatura(p_igreja BIGINT, p_motivo TEXT)
RETURNS VOID AS $$
BEGIN
    UPDATE assinatura_atual
    SET status = 'Cancelado',
        data_fim = CURRENT_DATE,
        updated_at = now()
    WHERE igreja_id = p_igreja;

    UPDATE igrejas_assinadas
    SET ativo = FALSE,
        data_cancelamento = now(),
        observacoes = p_motivo
    WHERE igreja_id = p_igreja
      AND ativo = TRUE;

    INSERT INTO assinatura_logs (igreja_id, acao, descricao, data_acao)
    VALUES (p_igreja, 'cancelado', p_motivo, now());
END;
$$ LANGUAGE plpgsql;

-- ==================== FUNCTION: REGISTRAR PAGAMENTO ====================
CREATE OR REPLACE FUNCTION registrar_pagamento(
    p_assinatura BIGINT,
    p_igreja BIGINT,
    p_valor NUMERIC,
    p_metodo TEXT,
    p_ref TEXT
) RETURNS UUID AS $$
DECLARE
    v_pagamento_id UUID;
BEGIN
    INSERT INTO assinatura_pagamentos (assinatura_id, igreja_id, valor, metodo_pagamento, referencia, status, data_pagamento)
    VALUES (p_assinatura, p_igreja, p_valor, p_metodo, p_ref, 'confirmado', now())
    RETURNING id INTO v_pagamento_id;

    INSERT INTO assinatura_logs (igreja_id, pacote_id, acao, descricao, data_acao, detalhes)
    SELECT p_igreja, ah.pacote_id, 'pagamento', 'Pagamento confirmado', now(),
           jsonb_build_object('valor', p_valor, 'metodo', p_metodo, 'referencia', p_ref)
    FROM assinatura_historico ah
    WHERE ah.id = p_assinatura;

    RETURN v_pagamento_id;
END;
$$ LANGUAGE plpgsql;


-- =========================================================
-- FIM DO ARQUIVO DE FUNCTIONS DE ASSINATURAS
-- =========================================================


-- =========================================================
-- OMNIGREJAS • TRIGGERS (Billing)
-- Versão: 2025-09-01
-- =========================================================

-- ==================== TRIGGER: Atualizar assinatura ao registrar pagamento ====================
CREATE OR REPLACE FUNCTION trg_atualizar_assinatura_apos_pagamento()
RETURNS TRIGGER AS $$
DECLARE
    v_pacote BIGINT;
    v_duracao INT;
    v_vitalicio BOOLEAN;
BEGIN
    IF NEW.status = 'confirmado' THEN
        SELECT pacote_id, vitalicio INTO v_pacote, v_vitalicio
        FROM assinatura_historico WHERE id = NEW.assinatura_id;

        SELECT duracao_meses INTO v_duracao FROM pacote WHERE id = v_pacote;

        INSERT INTO assinatura_atual (igreja_id, pacote_id, data_inicio, data_fim, status, vitalicio, created_at, updated_at)
        VALUES (
            NEW.igreja_id,
            v_pacote,
            CURRENT_DATE,
            CASE WHEN v_vitalicio THEN NULL ELSE CURRENT_DATE + (v_duracao || ' months')::INTERVAL END,
            'Ativo',
            v_vitalicio,
            now(),
            now()
        )
        ON CONFLICT (igreja_id) DO UPDATE
        SET pacote_id = EXCLUDED.pacote_id,
            data_inicio = CURRENT_DATE,
            data_fim = EXCLUDED.data_fim,
            vitalicio = EXCLUDED.vitalicio,
            status = 'Ativo',
            updated_at = now();

        UPDATE assinatura_historico
        SET status = 'Ativo',
            data_fim = CASE WHEN vitalicio THEN data_fim ELSE CURRENT_DATE + (v_duracao || ' months')::INTERVAL END,
            updated_at = now()
        WHERE id = NEW.assinatura_id;

        INSERT INTO assinatura_logs (igreja_id, pacote_id, acao, descricao, data_acao, detalhes)
        VALUES (NEW.igreja_id, v_pacote, 'pagamento', 'Pagamento confirmado e assinatura renovada', now(),
                jsonb_build_object('pagamento_id', NEW.id, 'valor', NEW.valor, 'metodo', NEW.metodo_pagamento));
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trg_assinatura_pagamento_confirmado
AFTER INSERT OR UPDATE ON assinatura_pagamentos
FOR EACH ROW
EXECUTE FUNCTION trg_atualizar_assinatura_apos_pagamento();

-- ==================== TRIGGER: Expirar assinatura ====================
CREATE OR REPLACE FUNCTION trg_expirar_assinatura()
RETURNS TRIGGER AS $$
BEGIN
    IF NEW.vitalicio = FALSE AND NEW.data_fim < CURRENT_DATE AND NEW.status = 'Ativo' THEN
        NEW.status := 'Expirado';
        INSERT INTO assinatura_logs (igreja_id, pacote_id, acao, descricao, data_acao)
        VALUES (NEW.igreja_id, NEW.pacote_id, 'expirado', 'Assinatura expirada automaticamente', now());
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trg_assinatura_expirar
BEFORE UPDATE ON assinatura_atual
FOR EACH ROW
EXECUTE FUNCTION trg_expirar_assinatura();

-- ==================== TRIGGER: Cancelamento explícito ====================
CREATE OR REPLACE FUNCTION trg_cancelar_assinatura_log()
RETURNS TRIGGER AS $$
BEGIN
    IF NEW.status = 'Cancelado' AND OLD.status <> 'Cancelado' THEN
        INSERT INTO assinatura_logs (igreja_id, pacote_id, acao, descricao, data_acao)
        VALUES (NEW.igreja_id, NEW.pacote_id, 'cancelado', 'Cancelamento manual registrado por trigger', now());
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trg_assinatura_cancelada
AFTER UPDATE ON assinatura_atual
FOR EACH ROW
EXECUTE FUNCTION trg_cancelar_assinatura_log();


-- =========================================================
-- FIM DO ARQUIVO DE TRIGGERS
-- =========================================================
