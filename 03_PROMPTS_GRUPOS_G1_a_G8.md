# 🚀 8 PROMPTS DOS GRUPOS — Prontos para Colar no Antigravity Pro

**Como usar:** quando chegar a hora de disparar cada grupo, copie o
prompt correspondente, cole no Antigravity Pro, espere o GCRC.

**Ordem de disparo:**

| Grupo | Quando disparar | Plano B |
|---|---|---|
| G1 | Após GCRC do PASSO 1 confirmado | ChatGPT Pro |
| G2 | Após CEO criar subdomain HostGator (parallelo a G3) | ChatGPT Pro + FTP |
| G3 | Junto com G2 (paralelo) | ChatGPT Pro |
| G4 | Após **Gate CEO 1** + DNS configurado | ChatGPT Pro |
| G5 | Junto com G6 (paralelos, após G4) | ChatGPT Pro |
| G6 | Junto com G5 | ChatGPT Pro |
| G7 | Após **Gate CEO 2** + autorizações físicas | ChatGPT Pro |
| G8 | Após G7 completo | ChatGPT Pro |

---

## 🟦 GRUPO 1 — OPS-DOCS-UNIFICATION (3 dias)

```
Antigravity, mandato continuado conforme DEC-015.

EXECUTAR AGORA: packet OPS-DOCS-UNIFICATION-001
Arquivo: ops/control-plane/packets/active/OPS-DOCS-UNIFICATION-001.md

LEITURA OBRIGATÓRIA (DEC-026):
- STATE_PACK.md §17 §10 §12
- DECISIONS.md (DEC-035 confirma o objetivo)
- DOC_REGISTRY.yml estado atual
- O próprio packet

DURAÇÃO: 3 dias úteis de execução autônoma.

DIRETRIZES ESPECÍFICAS:
1. Script Python de inventário em ops/control-plane/scripts/audit/
   que mapeia TODOS os .md em docs/ + ops/control-plane/docs/
2. Para cada arquivo, decidir: KEEP / MIGRATE / ARCHIVE / MERGE
   Critérios:
   - Sistema A (docs/00-canonical, docs/01-08): KEEP (canônico)
   - Sistema C (ops/control-plane/docs): KEEP (operacional)
   - Sistema B (docs/plataforma/produto/operacao/etc.):
     - Conteúdo único valioso → MIGRATE para Sistema A
     - Conteúdo redundante → ARCHIVE em docs/archive/legacy/
3. Executar a decisão (não só planejar)
4. Atualizar DOC_REGISTRY.yml para refletir o estado final
5. Reescrever docs/README.md como leitor de DOC_REGISTRY
   (gerado por script, não manual)
6. Atualizar docs/diretrizes/GERAL.md §5 com nova hierarquia da verdade
7. Criar evidence em ops/control-plane/evidence/ops-docs-unification-001/:
   - INVENTORY_REPORT.md (estado inicial)
   - DECISION_MAP.md (KEEP/MIGRATE/ARCHIVE por arquivo)
   - EXECUTION_REPORT.md (o que foi feito)
   - VALIDATION_REPORT.md (validators PASS)

RISCOS A OBSERVAR (FMEA):
- Conflito de conteúdo Sistema A vs B → preservar ambos, criar adapter doc
- Link quebrado pós-migração → validate-links deve bloquear
- Perda de conteúdo único → docs/archive/legacy/ preserva fisicamente
- DOC_REGISTRY desatualizado → mesmo PR deve atualizar

PLANO B SE FALHAR:
- Se script Python falhar: usar fallback bash + find/grep
- Se validators falharem: corrigir até PASS antes do PR
- Se conflito grave: GCRC explica, CEO decide manual

VALIDATORS OBRIGATÓRIOS:
- validate-doc-headers PASS
- validate-links PASS (zero quebrados)
- validate-docs PASS
- DOC_REGISTRY.yml indexa 100% dos .md ativos

PR:
- Branch: ops/docs-unification-001
- Título: [G1][BETA b-0.1] Unificação documental DOC_REGISTRY único
- Marcar DEC-035 como EXECUTED em DECISIONS.md

GCRC v2 obrigatório no retorno conforme GCRC_FINAL_TEMPLATE.md.

Próximo passo após GCRC: aguardar CEO disparar G2 + G3 (paralelos).

Comece agora.
```

---

## 🟦 GRUPO 2 — OPS-PUBLIC-OBSERVABILITY (2 dias, paralelo a G3)

**Pré-requisito CEO (10 min):** criar subdomain no cPanel HostGator
(passo detalhado em FAILSAFE_ECO_EXECUTION_PLAYBOOK.md §G2.1).

```
Antigravity, mandato continuado.

EXECUTAR AGORA: packet OPS-PUBLIC-OBSERVABILITY-001
Em paralelo a GATE-RECONCILE-001 (branch separada).

LEITURA OBRIGATÓRIA:
- STATE_PACK.md
- DECISIONS.md (DEC-031, DEC-035, DEC-036)
- ops/control-plane/docs/runbooks/PUBLIC_CONTROL_BRIDGE_RUNBOOK.md
- O próprio packet

CONTEXTO ADICIONAL CONFIRMADO PELO CEO:
- Subdomain criado no cPanel HostGator: status.failsafe.com.br
- Document Root: /public_html/status/
- SSL Let's Encrypt ativo
- SSH HostGator funcional (chave já configurada em FS-OPS-002)
- Bridge pública github.com/hbrasilia/failsafe-control-bridge ativa

DURAÇÃO: 2 dias úteis.

DIRETRIZES ESPECÍFICAS:
1. Conectar via SSH HostGator usando chave configurada
2. Estrutura em /public_html/status/:
   /public_html/status/
   ├── index.html (responsive, lê /api/*.json via fetch)
   ├── api/
   │   ├── state.json
   │   ├── next-action.json
   │   ├── blockers.json
   │   ├── command-current.json
   │   ├── gcrc-inbox.json
   │   └── history.json
   ├── packets/ (visualização dos packets ativos)
   ├── decisions/ (DECs públicas sanitizadas)
   ├── assets/
   │   ├── style.css
   │   └── script.js
   ├── sitemap.xml
   ├── robots.txt
   └── cron/
       └── sync-from-bridge.php

3. Cron PHP (sync-from-bridge.php):
   - Roda a cada 5 minutos (cPanel cron UI)
   - curl raw.githubusercontent.com/hbrasilia/failsafe-control-bridge/main/STATE_PACK_PUBLIC.md
   - Parse markdown → JSON normalizado
   - Salva em /public_html/status/api/state.json
   - Mesma coisa para NEXT_ACTIONS_QUEUE.md, COMMAND_CURRENT.md, etc.
   - Log de execução em /home/[user]/logs/status-sync.log

4. index.html:
   - Mobile-first responsive
   - Carrega state.json via fetch
   - Mostra: status geral, packet ativo, blockers, próxima ação, timeline
   - Auto-refresh a cada 60s
   - Sem JavaScript externo (CSP strict)
   - Footer: "Gerado automaticamente. Não edite manualmente."

5. Auditoria sanitização ANTES do go-live:
   - grep -r "secret\|password\|token\|key" /public_html/status/ → zero
   - grep -r "192.168\|10\.\|127\." /public_html/status/ → zero
   - grep -r "C:\\\\\|/home/[user]\|/Users/" /public_html/status/ → zero
   - Documentar em SANITIZATION_AUDIT.md

6. SEO:
   - sitemap.xml com /status/ + /status/api/ + /status/packets/
   - robots.txt allow all
   - meta tags: title, description, Open Graph
   - Submeter ao Google Search Console (manual via cPanel ou Antigravity
     se tiver acesso ao GSC; se não, deixar instrução para CEO)

7. Smoke test externo (curl de outro IP/celular):
   - curl https://status.failsafe.com.br/ → 200 OK + HTML válido
   - curl https://status.failsafe.com.br/api/state.json → 200 + JSON válido
   - Latência < 500ms
   - Validar com ferramenta tipo securityheaders.com

PLANO B SE SSH HOSTGATOR FALHAR:
- Usar FTP via lftp para upload
- Cron configurado via cPanel UI (sem crontab manual)
- Documentar em FALLBACK_REPORT.md

GCRC v2 obrigatório com:
- URL pública funcional (screenshot)
- Resposta de curl externo (cabeçalhos + body)
- Tempo de resposta médio
- Auditoria sanitização PASS
- Cron rodando comprovado pelo log
- Instruções para Google Search Console (se não submetido)

Próximo passo após GCRC: aguardar CEO conferir Gate CEO 1.

Comece agora.
```

---

## 🟦 GRUPO 3 — GATE-RECONCILE-001 (1 dia, paralelo a G2)

```
Antigravity, mandato continuado.

EXECUTAR AGORA: packet GATE-RECONCILE-001
Em paralelo a OPS-PUBLIC-OBSERVABILITY-001 (branch separada).

LEITURA OBRIGATÓRIA:
- STATE_PACK.md §17 (estado atual aponta divergência)
- ops/control-plane/evidence/dec-028-public-control-bridge/BRIDGE_SYNC_REPORT.md
- ops/control-plane/docs/runbooks/PUBLIC_CONTROL_BRIDGE_RUNBOOK.md
- DECISIONS.md DEC-027 + DEC-036

DURAÇÃO: 1 dia útil.

DIRETRIZES ESPECÍFICAS:
1. Verificar divergência atual entre 3 fontes:
   - STATE_PACK.md §17 (canon interno)
   - failsafe-control-bridge/STATE_PACK_PUBLIC.md §17 (bridge)
   - failsafe-control-bridge/PUBLIC_STATUS.json.active_packet
   Documentar diff em DIVERGENCE_REPORT.md

2. Rodar localmente para validar UI:
   cd [REDACTED_LOCAL_PATH]
   npm install
   npm run dev:hub
   (aguardar servidor estabilizar em port 8080)

3. Playwright headless smoke test:
   - Navegar http://localhost:8080
   - Capturar DOM real
   - Screenshot full page
   - Comparar com VISUAL_PROOF_DEV_HUB.md armazenada
   - Verificar componentes Lovable importados:
     Sidebar magenta, Dashboard cards, Login com personas, etc.

4. DECISÃO BIFURCAÇÃO:
   A) UI renderizando OK conforme DEC-021/022:
      - Rodar publish-public-bridge.ps1 (Windows) ou .sh (Linux)
      - Atualizar STATE_PACK_PUBLIC.md §17 = espelho exato do interno
      - Atualizar PUBLIC_STATUS.json.active_packet
      - Marcar DEC-036 com resultado A em DECISIONS.md
   B) UI com regressão:
      - Rebaixar STATE_PACK.md interno §17 para NEEDS_COMPLETION
      - Criar packet UI-RECONCILE-FIX-001 em packets/active/
      - Marcar DEC-036 com resultado B
      - G4 não pode iniciar até correção mergeada

5. Evidência em ops/control-plane/evidence/gate-reconcile-001/:
   - DIVERGENCE_REPORT.md
   - PLAYWRIGHT_SCREENSHOTS/
   - DOM_DUMP.html
   - BIFURCATION_DECISION.md (A ou B com justificativa)

GCRC v2 obrigatório com:
- Bifurcação determinada (A ou B) com prova de runtime
- DEC-036 atualizada no PR
- Screenshots
- Próximo packet criado (se B)

Próximo passo após GCRC: aguardar Gate CEO 1.

Comece agora.
```

---

## ⚠️ APÓS G1+G2+G3 — Gate CEO 1

Ver `05_PONTOS_DE_CONTROLE_GATES.md` seção Gate CEO 1.

Após aprovação do Gate CEO 1, prosseguir para G4.

---

## 🟨 GRUPO 4 — CONTROL-CENTER-SETUP (5 dias)

**Pré-requisito CEO (15 min):**
1. DNS: apontar control.failsafe.com.br (CNAME ou A record) para IP VPS Contabo
2. Confirmar SSH `ssh antigravity@[IP_VPS]` funcional
3. Confirmar Cockpit web em https://[IP_VPS]:9090

```
Antigravity, mandato continuado.

EXECUTAR AGORA: packet CONTROL-CENTER-SETUP-001
Aprovação CEO Gate 1: DEC-037 registrada.

LEITURA OBRIGATÓRIA:
- O próprio packet
- DECISIONS.md DEC-031, DEC-034
- docs/beta-b-0.1/FAILSAFE_ECO_FINAL_DEFINITIVE_BLUEPRINT.md §4 G4
- ops/control-plane/docs/failsafejud/FEATURE_REUSE_MAP.md
- ops/control-plane/docs/runbooks/JUD_HOSTGATOR_MAPPING.md

CONTEXTO ADICIONAL CONFIRMADO PELO CEO:
- DNS control.failsafe.com.br aponta para VPS Contabo
- SSH antigravity@[IP_VPS] funcional
- Cockpit operacional em :9090

DURAÇÃO: 5 dias úteis (lote único, sem micro-aprovações).

DIRETRIZES ESPECÍFICAS:

Dia 1 — Setup base:
- Conectar SSH VPS
- Instalar Caddy 2: apt install caddy
- Instalar PHP 8.2-fpm: apt install php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-curl php8.2-gd php8.2-zip
- Instalar MariaDB 10.11: apt install mariadb-server
- mysql_secure_installation
- Criar database eco_control_center
- Criar user eco_admin com senha gerada (salvar no AccessBroker depois)

Dia 2 — Failsafejud adaptado:
- Baixar dump do HostGator: mysqldump failsafejud_db > /tmp/jud_schema.sql
- Importar schema no eco_control_center
- Clonar PHP em [REDACTED_PATH]/control-center/
- Modificar config.php apontando para eco_control_center local
- Remover módulos jurídicos específicos:
  rm -rf [REDACTED_PATH]/control-center/modules/{prazos,cnj_sync,plantao}
- Substituir branding via sed:
  find . -type f -name "*.php" -exec sed -i 's/HTF ADV SAAS/Failsafe Control Center/g' {} +
  find . -type f -name "*.php" -exec sed -i 's/HTF Advocacia/Failsafe ECO/g' {} +

Dia 3 — eco_state e auth GitHub:
- Criar tabela eco_state que espelha STATE_PACK.md
- Cron PHP a cada 1 min: lê STATE_PACK.md do repo (git pull) e atualiza eco_state
- Criar GitHub OAuth App:
  https://github.com/settings/applications/new
  - Application name: Failsafe Control Center
  - Homepage URL: https://control.failsafe.com.br
  - Callback URL: https://control.failsafe.com.br/auth/github/callback
  - Salvar Client ID + Secret no AccessBroker (criar tabela encrypted_credentials)
- Implementar PHP GitHub OAuth flow
- Implementar 2FA TOTP (já existe no failsafejud)

Dia 4 — 4 páginas iniciais:
1. /login (com botão "Login via GitHub" + form fallback senha+2FA)
2. /dashboard:
   - KPIs lendo eco_state
   - GitHub API: contagem PRs abertos, mergeados últimos 7 dias
   - Notices ativos (notices table)
   - Próximas ações de NEXT_ACTIONS_QUEUE.md
3. /packets:
   - Lista da pasta packets/active/ via git ls-files
   - Coluna ID, Título, Status, PR link, CI status, GCRC status
   - Botões: Despachar (POST /api/packets/{id}/dispatch),
     Pausar (status BLOCKED_BY_MANUAL_PAUSE),
     Cancelar (move para packets/blocked/),
     Ver evidência (modal)
4. /gcrcs:
   - Lista de retornos GCRC em ops/control-plane/evidence/*/GCRC_*.md
   - Diff inline dos arquivos modificados
   - Botões: Aprovar e Mergear (calls GitHub API),
     Rejeitar (marca como REJECTED_GCRC_FALSE_POSITIVE),
     Solicitar revisão (comenta no PR)

Dia 5 — Hardening + Caddy + Smoke test:
- Configurar /etc/caddy/Caddyfile:
  control.failsafe.com.br {
    root * [REDACTED_PATH]/control-center/public
    php_fastcgi unix//run/php/php8.2-fpm.sock
    file_server
    encode gzip
    header {
      Strict-Transport-Security "max-age=31536000"
      X-Frame-Options "DENY"
      X-Content-Type-Options "nosniff"
      Content-Security-Policy "default-src 'self'"
    }
  }
- systemctl reload caddy
- Smoke test:
  - CEO loga via GitHub OAuth do celular
  - Dashboard carrega < 2s
  - Aprova um GCRC mock no T3
  - Logout funciona
- Audit penetração básica:
  - SQL injection tests
  - XSS tests
  - CSRF token validation
- Backup config + DB para ASUSTOR

PLANO B SE VPS CONTABO FALHAR:
- Hospedar versão lite read-only no HostGator
- Documentar em FALLBACK_REPORT.md
- Criar DEC-041 para registrar fallback

VALIDATORS OBRIGATÓRIOS:
- HTTPS válido (testar com SSL Labs A+)
- GitHub OAuth funcional end-to-end
- 2FA TOTP funcional
- CSRF tokens em todos os forms
- SQL prepared statements only

GCRC v2 obrigatório com:
- URL final + screenshot do dashboard logado (CEO no celular)
- Resultado audit penetração
- Backup pós-setup confirmado em ASUSTOR
- Credenciais iniciais entregues via AccessBroker (NÃO em texto plano no GCRC)

Próximo passo após GCRC: disparar G5 + G6 em paralelo.

Comece agora.
```

---

## 🟨 GRUPO 5 — CONTROL-CENTER-COMPLETENESS (4 dias, paralelo G6)

```
Antigravity, mandato continuado.

EXECUTAR AGORA: G5 - Control Center Completude (5 packets em lote)
Em paralelo a G6 (ABSORB JUD→ECO).

Packets a executar:
- CC-VAULT-006 (Cofre AccessBroker UI)
- CC-IA-007 (Consulta IA Externa com auto-inject canon)
- CC-DR-008 (Disaster Recovery dashboard + botões)
- CC-BRIDGE-009 (Bridge sync visual)
- CC-AUDIT-010 (Audit log viewer)
- CC-SETTINGS-011 (Configurações tenants/users/themes)

(Você gera estes 6 packets seguindo PACKET_TEMPLATE.md e os executa em
sequência rápida dentro dos 4 dias.)

Branch: feature/control-center-completeness

DURAÇÃO: 4 dias úteis lote único.

DIRETRIZES ESPECÍFICAS:

[CC-VAULT-006] Página /vault:
- Reutilizar AccessBroker.php do failsafejud (AES-256-CBC já implementado)
- Tabela encrypted_credentials já deve existir do G4
- UI para CRUD de credenciais:
  Tipos suportados: github_pat, anthropic_api_key, openai_api_key,
  google_ai_key, asustor_creds, gdrive_oauth, hostgator_ssh,
  evolution_api_token, vps_ssh_key, lovable_api_key, zapsign_token,
  d4sign_token
- Acesso restrito: is_superadmin + 2FA TOTP obrigatório
- Audit log de cada acesso/edição
- Botão "Rotacionar" com workflow assistido
- Botão "Expiring soon" lista credenciais expirando < 30 dias

[CC-IA-007] Página /ia (RESOLVE "instruções não seguidas"):
- Form: dropdown provider (Claude/ChatGPT/Gemini/Grok/Hermes), dropdown tipo
  (estratégica/técnica/copy/diagnóstico), textarea pergunta
- Ao submeter, Control Center monta automaticamente:
  ```
  CONTEXTO CANÔNICO OBRIGATÓRIO (auto-injetado):
  - AGENTS.md (hash atual)
  - STATE_PACK.md §17 §10 §12
  - DECISIONS.md últimas 5 DECs resumo inline
  - Papel canônico do agente: [da diretriz correspondente]
  - Modo: MVP_FASTLANE
  REGRAS:
  - DEC-009, DEC-015, DEC-020, DEC-026, DEC-027 (resumos inline)
  - Anti-microfragmentação
  - GCRC v2 se for tarefa técnica
  PERGUNTA:
  [texto do CEO]
  ```
- Chama API correspondente usando chave do AccessBroker
- Registra em tabela ai_consultations:
  id, provider, type, full_prompt, response, tokens_used,
  cost_usd, timestamp, ip, user_id, audit
- Mostra resposta formatada com:
  Citação dos arquivos canon mencionados,
  Botão "Salvar em packet" (cria packet em packets/backlog/),
  Botão "Compartilhar com Aider" (cria comment no Antigravity),
  Botão "Rejeitar como drift" (marca provider como drift detected)

[CC-DR-008] Página /dr:
- Status cards lendo:
  - ASUSTOR último backup (via SSH read /backups/last-backup.json)
  - GDrive último upload (via rclone lsd)
  - Restore-smoke último drill (timestamp + resultado)
  - Retention: snapshots dos últimos 30/60/90 dias
- Botões:
  - "Run DR Drill" → executa backup-restore-smoke-checklist.md
  - "Force Backup Now" → trigger backup imediato via SSH ASUSTOR
  - "Verify Last Backup" → checksum + read test
  - "Retention Report" → tabela completa
- Alertas WhatsApp:
  - Backup falha 2x consecutivos
  - DR drill > 14 dias sem rodar
  - Snapshot Contabo > 7 dias

[CC-BRIDGE-009] Página /bridge:
- Snapshot canon interno (STATE_PACK.md) vs bridge pública
- Diff visual side-by-side
- Última sincronização timestamp + hash commit
- Botão "Force Re-Sync" → executa publish-public-bridge.sh via SSH
- URL pública linkada

[CC-AUDIT-010] Página /audit:
- audit_log table viewer (paginado)
- Filtros: período (24h/7d/30d/all), action, user, severity, IP
- Export CSV/JSON
- Append-only enforced via trigger SQL:
  CREATE TRIGGER prevent_audit_modification
  BEFORE UPDATE OR DELETE ON audit_log
  FOR EACH ROW SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'audit_log is append-only';

[CC-SETTINGS-011] Página /settings (5 sub-tabs):
- Tenants (multi-tenant interno)
- Users & Groups (CEO + admins + viewers)
- Theme tokens (visual do próprio Control Center)
- Integrations (URLs GitHub API, Hermes endpoint, N8N webhooks)
- Taxonomy (DEC-009 lista nomes proibidos com validação live)
- Maintenance Mode toggle (freezar dispatches)

IMPLEMENTAR TAMBÉM:
- Tiers T1/T2/T3 conforme DEC-034 em /lib/approval_tier.php
- Tabelas ui_screens_versions + ui_screens_current
- WhatsApp alerting via Evolution API (chave no AccessBroker)
- UptimeRobot configurado externamente (monitor /health endpoint)

VALIDATORS:
- 9 páginas todas retornam 200 quando logado
- 9 páginas redirecionam para login quando não logado
- Cofre: tentativa de acesso sem 2FA bloqueia
- IA: prompt completo registrado no audit_log
- DR Drill: smoke test passes
- Audit: tentativa de UPDATE/DELETE rejeitada pelo trigger

GCRC v2 obrigatório por sub-packet (6 GCRCs no total ou 1 consolidado).

Próximo passo: aguardar Gate CEO 2 (após G5 + G6 completos).

Comece agora.
```

---

## 🟨 GRUPO 6 — ABSORB-JUD-TO-ECO (8 dias, paralelo G5)

```
Antigravity, mandato continuado.

EXECUTAR AGORA: G6 ABSORB do failsafejud para ECO Core (4 packets)
Em paralelo a G5 (Control Center Completude). Branches separadas.

Branch: feature/absorb-jud-to-eco-core

LEITURA OBRIGATÓRIA:
- /mnt/user-data/outputs/FAILSAFEJUD_TO_ECO_ABSORPTION_PLAN.md
  (plano detalhado dos 17 padrões)
- ops/control-plane/docs/failsafejud/FEATURE_REUSE_MAP.md
- failsafejud source code para mineração de padrões:
  bootstrap.php, AccessBroker.php, TenantDataOps.php, Ui.php,
  People.php, WorkflowEngine.php, WhatsApp.php, audit() helper

DURAÇÃO: 8 dias úteis lote único.

ABSORB-001 (2 dias) — Órbita + ACL + Audit + Modo:
Schemas Postgres em packages/api-core/migrations/:
- 001_organizations.sql
- 002_tenants.sql (com is_test_mode boolean)
- 003_scoped_entities.sql
- 004_record_acl.sql (entity_type/entity_id/subject_type=user|group/access_level)
- 005_user_groups.sql
- 006_audit_log.sql (append-only via trigger Postgres)
Helpers TypeScript em packages/api-core/src/auth/:
- current_tenant_id()
- current_orbit()
- orbit_active()
- tenant_scope_sql()
- record_has_access(entity_type, entity_id, user_id)
- audit(action, target_table, target_id, payload)
RLS policies por tabela com PostgreSQL Row Level Security.

ABSORB-002 (2 dias) — Pessoas + Temas + Notices:
Schemas Postgres:
- 007_people.sql (id, tenant_id, type=PF|PJ, name, document, etc.)
- 008_person_roles.sql (N:N com tabela roles)
- 009_person_indications.sql
- 010_person_photos.sql
- 011_person_attachments.sql
- 012_person_addresses.sql
- 013_themes.sql
- 014_theme_tokens.sql (chaves CSS custom)
- 015_user_theme_preferences.sql
- 016_notices.sql (tenant_id NULL = global; severity; visible_until)
Helpers TS:
- packages/api-core/src/people/
- packages/api-core/src/themes/ (com :root injection via React context)
- packages/api-core/src/notices/

ABSORB-003 (2 dias) — Cofre + WhatsApp:
Schemas Postgres:
- 017_encrypted_credentials.sql (AES-256-GCM com chave KMS futuro)
- 018_credential_provider_configs.sql
- 019_whatsapp_templates.sql
- 020_whatsapp_messages.sql (in/out)
- 021_whatsapp_webhooks.sql
Helpers TS:
- packages/api-core/src/access-broker/
  Provider abstraction: datajud, cnj, govbr, icp_brasil, pje, esaj,
  eproc, projudi, d4sign, clicksign, zapsign, evolution_api, z_api
- packages/api-core/src/whatsapp/

ABSORB-004 (2 dias) — SLA/Prazos Genérico:
Schemas Postgres:
- 022_deadlines.sql
- 023_deadline_types.sql (parametrizável: business_days, calendar_days, work_hours)
- 024_holidays.sql
- 025_deadline_history.sql
Helpers TS:
- packages/api-core/src/deadlines/
  Engine genérico (sem CPC/CPP/CLT específico — fica para vertical Jud futuro)
  Cálculo: business_days(start, days, holidays)
  Semáforo: getSemaphore(deadline) → 'green'|'yellow'|'red'
  Triggers automáticos de notification

PARA CADA ABSORB:
- Migrations IDEMPOTENTES (CREATE IF NOT EXISTS, idempotent inserts)
- RLS leakage = 0 testado com 3 tenants sintéticos
- Helpers TypeScript com tipos rigorosos (strict mode, no any)
- Smoke tests automatizados em packages/api-core/tests/
- Rollback documentado em ROLLBACK_NOTES.md
- Documentação em docs/00-canonical/data-models/<feature>.md

EVIDÊNCIA por ABSORB em ops/control-plane/evidence/absorb-<XXX>/:
- MIGRATION_LOG.txt
- RLS_LEAKAGE_TEST_REPORT.md
- TYPESCRIPT_BUILD_LOG.txt
- SMOKE_TEST_RESULTS.json

VALIDATORS:
- npx tsc --noEmit PASS em todo o packages/api-core
- npm test PASS em packages/api-core
- RLS leakage = 0 (script test/rls-leakage.test.ts)
- Migrations rodam em ambiente staging sem erro

GCRC v2 obrigatório por ABSORB (4 GCRCs).

Próximo passo: aguardar Gate CEO 2.

Comece agora.
```

---

## ⚠️ APÓS G4+G5+G6 — Gate CEO 2

Ver `05_PONTOS_DE_CONTROLE_GATES.md` seção Gate CEO 2.

---

## 🟧 GRUPO 7 — STAGING-GATES (3 dias)

**Pré-requisito CEO (30 min):**
1. Criar snapshot Contabo
2. Revisar e autorizar regras UFW
3. Cadastrar 3 GitHub Secrets
4. Registrar DEC-039 com IDs

```
Antigravity, gates físicos liberados conforme DEC-039.

EXECUTAR EM SEQUÊNCIA:
1. STAGING-PROVISIONING-EXECUTION-001 (já existe em packets/active/)
2. RLS-STAGE-001 (já existe em packets/active/)

LEITURA OBRIGATÓRIA:
- DEC-039 (liberação CEO)
- ops/control-plane/docs/runbooks/STAGING_PROVISIONING_GATE.md
- ops/control-plane/docs/runbooks/RLS_STAGE_PLAN.md
- ops/control-plane/packets/active/STAGING-PROVISIONING-EXECUTION-001.md
- ops/control-plane/packets/active/RLS-STAGE-001.md

DURAÇÃO: 3 dias úteis.

CONTEXTO CONFIRMADO PELO CEO:
- Snapshot Contabo ID: [conforme DEC-039]
- UFW regras autorizadas
- Secrets cadastrados: FAILSAFE_SSH_VPS_KEY, STAGING_DB_PASSWORD, STAGING_DATABASE_URL
- Backup pré-bootstrap em ASUSTOR + GDrive validado

DIRETRIZES ESPECÍFICAS:

STAGING-PROVISIONING-EXECUTION-001:
- SSH VPS Contabo
- Aplicar regras UFW (configure_ufw_failsafe_vps.sh)
- Provisionar Postgres 16 + pgvector
- Aplicar todas as migrations do G6 ABSORB
- Criar 3 tenants sintéticos:
  tenant_alpha (Fabricante OEM piloto)
  tenant_beta (Autorizada)
  tenant_gamma (Cliente final)
- Validar conexão pelo Control Center
- Backup pós-provisionamento

RLS-STAGE-001:
- Aplicar RLS policies em todas as tabelas multi-tenant
- Smoke test cruzado:
  Logar como tenant_alpha → tentar acessar dados tenant_beta → BLOCKED
  Logar como tenant_beta → tentar acessar dados tenant_gamma → BLOCKED
- Documentar em RLS_LEAKAGE_PROOF.md

VALIDATORS:
- sudo ufw status → ativo, portas só esperadas
- psql $STAGING_DATABASE_URL → conecta
- RLS leakage = 0 com prova
- Backup pós-bootstrap registrado em ASUSTOR + GDrive
- Logs Postgres limpos (zero erros graves)

GCRC v2 obrigatório com:
- Saída de ufw status
- Saída de SHOW row_security em cada tabela
- Resultado do teste cruzado RLS
- ID do backup pós-bootstrap

Próximo passo: G8 (MVP UNOX deploy) - prioridade comercial soberana.

Comece agora.
```

---

## 🟥 GRUPO 8 — MVP-OEM-VALIDATION-AND-DEPLOY (5 dias) — P0 SOBERANA

```
Antigravity, mandato continuado.

EXECUTAR AGORA: packet MVP-OEM-VALIDATION-AND-DEPLOY-001
PRIORIDADE P0 SOBERANA — destrava viabilidade comercial UNOX.

LEITURA OBRIGATÓRIA:
- O próprio packet
- docs/05-execution/active/fs-ops-006-asset-services-oem-pilot-5-day-mvp.md (mock atual)
- ops/control-plane/docs/verticals/asset-service-management/MVP_ACCEPTANCE_CRITERIA.md
- ops/control-plane/docs/verticals/asset-service-management/MVP_BACKLOG.md
- ops/control-plane/docs/verticals/asset-service-management/WORKORDER_FLOW.md
- ops/control-plane/docs/verticals/asset-service-management/DATA_MODEL.md
- evidence/mvp-slice-005-preventative-pmoc/MVP_SLICE_005_PREVENTATIVE_PMOC_CLOSEOUT.md

DURAÇÃO: 5 dias úteis lote único.

Branch: feature/mvp-oem-deploy-validation

DIRETRIZES ESPECÍFICAS:

Dia 1 — Validação Hardened Mock FS-OPS-006:
- Para cada critério em MVP_ACCEPTANCE_CRITERIA.md, validar cobertura no mock
- Documentar gaps em GAPS_REPORT.md
- Corrigir gaps críticos (não-críticos vão para backlog)

Dia 2 — Finalização Slice 005 PMOC:
- Validação visual definitiva via Playwright DOM real
- Matriz 52 semanas renderizando corretamente
- Geração automática de OS preventiva ao chegar a semana programada
- Marcar MVP_SLICE_005 como CONCLUÍDO

Dia 3 — Deploy real staging:
- Build de apps/failsafe-hub (npm run build)
- Deploy via Caddy em subdomain demo:
  Sugestão: demo.failsafe.com.br ou control-tenant.failsafe.com.br
- Postgres staging com schemas G6 absorvidos aplicados
- RLS ativo
- Smoke test conectividade end-to-end

Dia 4 — 3 tenants sintéticos OEM:
- tenant_fabricante_oem_demo (Fabricante OEM piloto, NUNCA usar nome real)
- tenant_autorizada_demo (rede autorizada)
- tenant_cliente_final_demo (cliente final)
- Asset Passports com Serial Numbers fictícios:
  Ex: "FAILSAFE-DEMO-OVEN-001", "FAILSAFE-DEMO-OVEN-002", etc.
- QR Codes gerados:
  https://demo.failsafe.com.br/asset/FAILSAFE-DEMO-OVEN-001
- Seed data sanitizado conforme taxonomy guard

Dia 5 — Smoke test fluxo end-to-end:
1. Cliente final (no celular) escaneia QR Code do ativo demo
2. Abre chamado: nome="João Demo", telefone="11999999999",
   falha="Não esquenta", 3 fotos demo
3. Triador (logado como tenant_fabricante_oem_demo) vê chamado, converte em OS
4. Atribui técnico
5. Técnico (logado como tenant_autorizada_demo) recebe notificação,
   executa checklist, tira foto, GPS, assinatura
6. Solicita peça (validação garantia automática se data instalação < 12 meses)
7. CEO (logado como superadmin no Control Center) aprova orçamento
8. OS encerrada
9. Dashboard atualizado por persona:
   - Fabricante: todas as OSs
   - Autorizada: só as próprias
   - Cliente: só os próprios chamados

DOCUMENTAÇÃO ENTREGÁVEL:
- MANUAL_FABRICANTE.md (1 página, operacional)
- MANUAL_AUTORIZADA.md (1 página)
- MANUAL_CLIENTE_FINAL.md (1 página)
- ROTEIRO_DEMO_UNOX.md (script CEO ao cliente, 5 min)
- FAQ_DEMO.md (10 dúvidas comuns)

PLANO B SE ALGO FALHAR NO DIA 5:
- Identificar bloqueio específico (qual etapa do fluxo)
- Mock Hardened original (FS-OPS-006) continua disponível para demo de UI
- Real deploy fica para próximo ciclo
- Apresentação UNOX usa Mock + roteiro adaptado

GCRC v2 obrigatório com:
- Vídeo screencast do fluxo completo (15 min) em evidence/
- Screenshots por persona
- URL demo acessível pelo CEO via celular
- Resultado RLS leakage com 3 tenants
- Documentação entregue (5 arquivos)
- Relatório executivo 2 páginas: EXECUTIVE_REPORT.md

Próximo passo após GCRC: Gate CEO 3 (autorização para demo ao cliente UNOX).

Comece agora. P0 SOBERANA, executar com máxima prioridade.
```

---

## ⚠️ APÓS G8 — Gate CEO 3

Ver `05_PONTOS_DE_CONTROLE_GATES.md` seção Gate CEO 3.

Após Gate CEO 3 aprovado, **demo ao cliente UNOX** liberada.

