# 🌌 FAILSAFE UNIVERSAL: Oblueprint do Ecossistema v3.1

O **FAILSAFE** é uma plataforma **PaaS (Platform as a Service)** de governança e utilidades, de propriedade da empresa **FAILSAFE**. Ele funciona como o sistema operacional de múltiplos SaaS verticais, provendo infraestrutura, inteligência e faturamento unificado.

### 🎭 Estratégia de Expertise (Core Oculto)
O core de inteligência da plataforma é alimentado pelo expertise da **DGMTEC**. Contudo, esta relação é **estratégica e confidencial**, não sendo divulgada na interface pública ou materiais de marketing, a menos que aprovada para fins de autoridade técnica em cenários específicos.

---

## 🏗️ FASES DE DESENVOLVIMENTO (Roadmap Progressivo)

Para garantir a entrega contínua sem comprometer a qualidade, o projeto segue este fluxo:

1. **FASE 1: FRONTEND & CORE PROTOTYPE (Lotes 1-3)**
   - Construção da casca corporativa, navegação entre satélites e mocks de dados funcionais.
   - Objetivo: Validação visual e de UX pelo investidor/cliente.

2. **FASE 2: MVP & INTELLIGENCE (Lotes 4-5)**
   - Implementação da lógica de BI (20 KPIs), Motor de Temas e fluxos de CRUD simulados.
   - Objetivo: Produto Mínimo Viável para demonstração de "Poder de Dados".

3. **FASE 3: BACKEND & INTEGRATION (Lote 6+)**
   - Conexão com Supabase/Edge Functions, integração real com Gateways de Pagamento e APIs externas (n8n, etc).
   - Objetivo: Escalabilidade e persistência real de dados.

---

## 🏛️ 1. MÓDULO: FAILSAFE HUB (CENTRAL ADMIN)
*O orquestrador de serviços comuns e governança global.*

### 1.1 Gestão de Tenants & Onboarding
- **[FUNÇÃO] Dashboard de Instâncias:** Lista de todos os clientes com status (Ativo/Suspenso/Trial).
- **[FUNÇÃO] Domain Binding:** Campo para apontamento de domínio próprio (CNAME) para White-label.
- **[FUNÇÃO] Health Monitor:** Barra visual de "saúde do cliente" baseada em tickets abertos e consumo.
- **[FUNÇÃO] Solution Mapper:** Toggles para ativar/desativar módulos (PRO, FoodOps, Billing) por tenant.

### 1.2 Billing Hub (A "Joia da Coroa")
- **[FUNÇÃO] Wallet de Créditos:** Visualização de saldo de "Créditos de IA" e "Créditos de Transação".
- **[FUNÇÃO] Allowance Engine:** Definição de cotas mensais baseadas no plano (BASE/PRO/ENTERPRISE).
- **[FUNÇÃO] Gateway Manager:** Configuração de chaves de API para MercadoPago, Kiwify e NuPay.
- **[FUNÇÃO] Webhook Listener:** Registro e reprocessamento de notificações de pagamento recebidas.

### 1.3 Branding & Personalização
- **[FUNÇÃO] HSL Expert Editor:** Ajuste fino de matiz, saturação e luminosidade para cores de marca.
- **[FUNÇÃO] Preset Explorer:** Galeria com 12 temas base (Onyx, Emerald, Sky, etc.) para troca rápida.
- **[FUNÇÃO] Logo Uploader:** Gestão de logos para Sidebar, Favicon e Relatórios.

---

## 🛠️ 2. MÓDULO: FAILSAFE PRO (INDUSTRIAL & ASSETS)
*Especializado em ativos de alta criticidade e telemetria.*

### 2.1 Gestão de Ativos 360º (Lifecycle)
- **[FUNÇÃO] QR Code Landing Page:** Portal exclusivo do ativo com manuais, fotos e histórico.
- **[FUNÇÃO] Calculadora de MTBF:** Indicador automático de Tempo Médio entre Falhas.
- **[FUNÇÃO] Asset Life Expectancy:** Alerta visual de EOL (Fim de Vida Útil) baseado em histórico.
- **[FUNÇÃO] Component Stock Suggestion:** Lista de peças críticas recomendadas para estoque local.

### 2.2 Manutenção & Field Service
- **[FUNÇÃO] Orquestrador de OS:** Gestão de aberturas, triagem e fechamento de Ordens de Serviço.
- **[FUNÇÃO] Ranking de Técnicos:** Seleção automatizada baseada em certificação e performance.
- **[FUNÇÃO] Checklist Builder:** Criador de formulários dinâmicos para auditorias e NRs.

---

## 🍩 3. MÓDULO: DOCE AJUDA (FOODOPS & RETAIL)
*Especializado em fluxo de pedidos e gestão de varejo.*

### 3.1 Operacional & Vendas
- **[FUNÇÃO] Kitchen Lag Monitor:** Alerta visual de atrasos no preparo de pedidos.
- **[FUNÇÃO] Omnichannel Dashboard:** Visão unificada de vendas (Delivery, PDV, WhatsApp).
- **[FUNÇÃO] Inventory Rupture Calculator:** Estima perda financeira por falta de produto.

---

## 🌐 5. INTERNACIONALIZAÇÃO (i18n) — REQUISITO OBRIGATÓRIO
*Aplica-se a todos os módulos: Hub, PRO e FoodOps.*

> **Princípio:** O ecossistema nasce em Português BR como língua nativa, mas deve oferecer tradução completa a escolha do cliente (por tenant e por usuário).

### 5.1 Língua Nativa
- **`pt-BR` — Português (Brasil):** Idioma padrão do sistema. Toda UI, mensagens de erro, emails e relatórios devem ser gerados nativamente em pt-BR.

### 5.2 Idiomas Suportados (Tradução Completa)

| Código | Idioma | Nota |
|---|---|---|
| `pt-BR` | 🇧🇷 Português (Brasil) | **Nativo** — padrão do sistema |
| `en-US` | 🇺🇸 Inglês (EUA) | Obrigatório — acesso global e integrações |
| `es-ES` | 🇪🇸 Espanhol | Obrigatório — mercado LATAM e Europa |
| `it-IT` | 🇮🇹 Italiano | Obrigatório |
| `pt-PT` | 🇵🇹 Português (Portugal) | Obrigatório — mercado europeu |
| `fr-FR` | 🇫🇷 Francês | Obrigatório |
| `de-DE` | 🇩🇪 Alemão | Obrigatório |

### 5.3 Escopo da Tradução
- **UI Completa:** Menus, labels, botões, tooltips, modais e mensagens de erro.
- **Emails Transacionais:** Boas-vindas, fatura, alerta de suspensão, redefinir senha.
- **Relatórios e PDFs:** Cabeçalhos, rodapés e campos dinâmicos gerados pelo sistema.
- **Landing Pages dos Tenants (FoodOps):** Tradução completa das lojas dos clientes.
- **Suporte Interno:** Paineis e audit logs do Hub.

### 5.4 Regras de Implementação
- **Seleção de idioma:** Por **tenant** (padrão da plataforma) e por **usuário** (preferência individual).
- **Fallback:** Caso uma chave não exista no idioma selecionado, exibir em `pt-BR`.
- **Biblioteca:** Usar `i18next` + `react-i18next` no frontend; arquivos `.json` por locale.
- **Estrutura de arquivos:**
  ```
  src/
  └── locales/
      ├── pt-BR.json   (nativo)
      ├── en-US.json
      ├── es-ES.json
      ├── it-IT.json
      ├── pt-PT.json
      ├── fr-FR.json
      └── de-DE.json
  ```
- **Idiomas novos:** Adicionáveis como módulo opcional no futuro (ex: `zh-CN`, `ja-JP`).

---

## 🔌 6. HUB DE INTEGRAÇÕES (A ORQUESTRA)
- **[BOTÃO] Ativar n8n:** Link/Widget para orquestração visual de fluxos.
- **[BOTÃO] Conectar Flowise:** Interface para gestão de agentes de IA.
- **[BOTÃO] Launch Chatwoot:** Acesso direto ao helpdesk omnichannel.
- **[FUNÇÃO] Evolution API:** Gestão de instâncias de WhatsApp diretamente pelo Hub.

---
**Status da Documentação:** Consolidada v3.2 (i18n + Domínios Registrados)

