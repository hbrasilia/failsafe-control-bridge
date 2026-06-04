# ðŸš€ 8 PROMPTS DOS GRUPOS â€” Prontos para Colar no Antigravity Pro

**Como usar:** quando chegar a hora de disparar cada grupo, copie o
prompt correspondente, cole no Antigravity Pro, espere o GCRC.

**Ordem de disparo:**

| Grupo | Quando disparar | Plano B |
|---|---|---|
| G1 | ApÃ³s GCRC do PASSO 1 confirmado | ChatGPT Pro |
| G2 | ApÃ³s CEO criar subdomain HostGator (parallelo a G3) | ChatGPT Pro + FTP |
| G3 | Junto com G2 (paralelo) | ChatGPT Pro |
| G4 | ApÃ³s **Gate CEO 1** + DNS configurado | ChatGPT Pro |
| G5 | Junto com G6 (paralelos, apÃ³s G4) | ChatGPT Pro |
| G6 | Junto com G5 | ChatGPT Pro |
| G7 | ApÃ³s **Gate CEO 2** + autorizaÃ§Ãµes fÃ­sicas | ChatGPT Pro |
| G8 | ApÃ³s G7 completo | ChatGPT Pro |

---

## ðŸŸ¦ GRUPO 1 â€” OPS-DOCS-UNIFICATION (3 dias)

```
Antigravity, mandato continuado conforme DEC-015.

EXECUTAR AGORA: packet OPS-DOCS-UNIFICATION-001
Arquivo: ops/control-plane/packets/active/OPS-DOCS-UNIFICATION-001.md

LEITURA OBRIGATÃ“RIA (DEC-026):
- STATE_PACK.md Â§17 Â§10 Â§12
- DECISIONS.md (DEC-035 confirma o objetivo)
- DOC_REGISTRY.yml estado atual
- O prÃ³prio packet

DURAÃ‡ÃƒO: 3 dias Ãºteis de execuÃ§Ã£o autÃ´noma.

DIRETRIZES ESPECÃFICAS:
1. Script Python de inventÃ¡rio em ops/control-plane/scripts/audit/
   que mapeia TODOS os .md em docs/ + ops/control-plane/docs/
2. Para cada arquivo, decidir: KEEP / MIGRATE / ARCHIVE / MERGE
   CritÃ©rios:
   - Sistema A (docs/00-canonical, docs/01-08): KEEP (canÃ´nico)
   - Sistema C (ops/control-plane/docs): KEEP (operacional)
   - Sistema B (docs/plataforma/produto/operacao/etc.):
     - ConteÃºdo Ãºnico valioso â†’ MIGRATE para Sistema A
     - ConteÃºdo redundante â†’ ARCHIVE em docs/archive/legacy/
3. Executar a decisÃ£o (nÃ£o sÃ³ planejar)
4. Atualizar DOC_REGISTRY.yml para refletir o estado final
5. Reescrever docs/README.md como leitor de DOC_REGISTRY
   (gerado por script, nÃ£o manual)
6. Atualizar docs/diretrizes/GERAL.md Â§5 com nova hierarquia da verdade
7. Criar evidence em ops/control-plane/evidence/ops-docs-unification-001/:
   - INVENTORY_REPORT.md (estado inicial)
   - DECISION_MAP.md (KEEP/MIGRATE/ARCHIVE por arquivo)
   - EXECUTION_REPORT.md (o que foi feito)
   - VALIDATION_REPORT.md (validators PASS)

RISCOS A OBSERVAR (FMEA):
- Conflito de conteÃºdo Sistema A vs B â†’ preservar ambos, criar adapter doc
- Link quebrado pÃ³s-migraÃ§Ã£o â†’ validate-links deve bloquear
- Perda de conteÃºdo Ãºnico â†’ docs/archive/legacy/ preserva fisicamente
- DOC_REGISTRY desatualizado â†’ mesmo PR deve atualizar

PLANO B SE FALHAR:
- Se script Python falhar: usar fallback bash + find/grep
- Se validators falharem: corrigir atÃ© PASS antes do PR
- Se conflito grave: GCRC explica, CEO decide manual

VALIDATORS OBRIGATÃ“RIOS:
- validate-doc-headers PASS
- validate-links PASS (zero quebrados)
- validate-docs PASS
- DOC_REGISTRY.yml indexa 100% dos .md ativos

PR:
- Branch: ops/docs-unification-001
- TÃ­tulo: [G1][BETA b-0.1] UnificaÃ§Ã£o documental DOC_REGISTRY Ãºnico
- Marcar DEC-035 como EXECUTED em DECISIONS.md

GCRC v2 obrigatÃ³rio no retorno conforme GCRC_FINAL_TEMPLATE.md.

PrÃ³ximo passo apÃ³s GCRC: aguardar CEO disparar G2 + G3 (paralelos).

Comece agora.
```

---

## ðŸŸ¦ GRUPO 2 â€” OPS-PUBLIC-OBSERVABILITY (2 dias, paralelo a G3)

**PrÃ©-requisito CEO (10 min):** criar subdomain no cPanel HostGator
(passo detalhado em FAILSAFE_ECO_EXECUTION_PLAYBOOK.md Â§G2.1).

```
Antigravity, mandato continuado.

EXECUTAR AGORA: packet OPS-PUBLIC-OBSERVABILITY-001
Em paralelo a GATE-RECONCILE-001 (branch separada).

LEITURA OBRIGATÃ“RIA:
- STATE_PACK.md
- DECISIONS.md (DEC-031, DEC-035, DEC-036)
- ops/control-plane/docs/runbooks/PUBLIC_CONTROL_BRIDGE_RUNBOOK.md
- O prÃ³prio packet

CONTEXTO ADICIONAL CONFIRMADO PELO CEO:
- Subdomain criado no cPanel HostGator: status.failsafe.com.br
- Document Root: ~/status.failsafe.com.br/
- SSL Let's Encrypt ativo
- SSH HostGator funcional (chave jÃ¡ configurada em FS-OPS-002)
- Bridge pÃºblica github.com/hbrasilia/failsafe-control-bridge ativa

DURAÃ‡ÃƒO: 2 dias Ãºteis.

DIRETRIZES ESPECÃFICAS:
1. Conectar via SSH HostGator usando chave configurada
2. Estrutura em ~/status.failsafe.com.br/:
   ~/status.failsafe.com.br/
   â”œâ”€â”€ index.html (responsive, lÃª /api/*.json via fetch)
   â”œâ”€â”€ api/
   â”‚   â”œâ”€â”€ state.json
   â”‚   â”œâ”€â”€ next-action.json
   â”‚   â”œâ”€â”€ blockers.json
   â”‚   â”œâ”€â”€ command-current.json
   â”‚   â”œâ”€â”€ gcrc-inbox.json
   â”‚   â””â”€â”€ history.json
   â”œâ”€â”€ packets/ (visualizaÃ§Ã£o dos packets ativos)
   â”œâ”€â”€ decisions/ (DECs pÃºblicas sanitizadas)
   â”œâ”€â”€ assets/
   â”‚   â”œâ”€â”€ style.css
   â”‚   â””â”€â”€ script.js
   â”œâ”€â”€ sitemap.xml
   â”œâ”€â”€ robots.txt
   â””â”€â”€ cron/
       â””â”€â”€ sync-from-bridge.php

3. Cron PHP (sync-from-bridge.php):
   - Roda a cada 5 minutos (cPanel cron UI)
   - curl raw.githubusercontent.com/hbrasilia/failsafe-control-bridge/main/STATE_PACK_PUBLIC.md
   - Parse markdown â†’ JSON normalizado
   - Salva em ~/status.failsafe.com.br/api/state.json
   - Mesma coisa para NEXT_ACTIONS_QUEUE.md, COMMAND_CURRENT.md, etc.
   - Log de execuÃ§Ã£o em /home/[user]/logs/status-sync.log

4. index.html:
   - Mobile-first responsive
   - Carrega state.json via fetch
   - Mostra: status geral, packet ativo, blockers, prÃ³xima aÃ§Ã£o, timeline
   - Auto-refresh a cada 60s
   - Sem JavaScript externo (CSP strict)
   - Footer: "Gerado automaticamente. NÃ£o edite manualmente."

5. Auditoria sanitizaÃ§Ã£o ANTES do go-live:
   - grep -r "secret\|password\|token\|key" ~/status.failsafe.com.br/ â†’ zero
   - grep -r "192.168\|10\.\|127\." ~/status.failsafe.com.br/ â†’ zero
   - grep -r "C:\\\\\|/home/[user]\|/Users/" ~/status.failsafe.com.br/ â†’ zero
   - Documentar em SANITIZATION_AUDIT.md

6. SEO:
   - sitemap.xml com /status/ + /status/api/ + /status/packets/
   - robots.txt allow all
   - meta tags: title, description, Open Graph
   - Submeter ao Google Search Console (manual via cPanel ou Antigravity
     se tiver acesso ao GSC; se nÃ£o, deixar instruÃ§Ã£o para CEO)

7. Smoke test externo (curl de outro IP/celular):
   - curl https://status.failsafe.com.br/ â†’ 200 OK + HTML vÃ¡lido
   - curl https://status.failsafe.com.br/api/state.json â†’ 200 + JSON vÃ¡lido
   - LatÃªncia < 500ms
   - Validar com ferramenta tipo securityheaders.com

PLANO B SE SSH HOSTGATOR FALHAR:
- Usar FTP via lftp para upload
- Cron configurado via cPanel UI (sem crontab manual)
- Documentar em FALLBACK_REPORT.md

GCRC v2 obrigatÃ³rio com:
- URL pÃºblica funcional (screenshot)
- Resposta de curl externo (cabeÃ§alhos + body)
- Tempo de resposta mÃ©dio
- Auditoria sanitizaÃ§Ã£o PASS
- Cron rodando comprovado pelo log
- InstruÃ§Ãµes para Google Search Console (se nÃ£o submetido)

PrÃ³ximo passo apÃ³s GCRC: aguardar CEO conferir Gate CEO 1.

Comece agora.
```

---

## ðŸŸ¦ GRUPO 3 â€” GATE-RECONCILE-001 (1 dia, paralelo a G2)

```
Antigravity, mandato continuado.

EXECUTAR AGORA: packet GATE-RECONCILE-001
Em paralelo a OPS-PUBLIC-OBSERVABILITY-001 (branch separada).

LEITURA OBRIGATÃ“RIA:
- STATE_PACK.md Â§17 (estado atual aponta divergÃªncia)
- ops/control-plane/evidence/dec-028-public-control-bridge/BRIDGE_SYNC_REPORT.md
- ops/control-plane/docs/runbooks/PUBLIC_CONTROL_BRIDGE_RUNBOOK.md
- DECISIONS.md DEC-027 + DEC-036

DURAÃ‡ÃƒO: 1 dia Ãºtil.

DIRETRIZES ESPECÃFICAS:
1. Verificar divergÃªncia atual entre 3 fontes:
   - STATE_PACK.md Â§17 (canon interno)
   - failsafe-control-bridge/STATE_PACK_PUBLIC.md Â§17 (bridge)
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

4. DECISÃƒO BIFURCAÃ‡ÃƒO:
   A) UI renderizando OK conforme DEC-021/022:
      - Rodar publish-public-bridge.ps1 (Windows) ou .sh (Linux)
      - Atualizar STATE_PACK_PUBLIC.md Â§17 = espelho exato do interno
      - Atualizar PUBLIC_STATUS.json.active_packet
      - Marcar DEC-036 com resultado A em DECISIONS.md
   B) UI com regressÃ£o:
      - Rebaixar STATE_PACK.md interno Â§17 para NEEDS_COMPLETION
      - Criar packet UI-RECONCILE-FIX-001 em packets/active/
      - Marcar DEC-036 com resultado B
      - G4 nÃ£o pode iniciar atÃ© correÃ§Ã£o mergeada

5. EvidÃªncia em ops/control-plane/evidence/gate-reconcile-001/:
   - DIVERGENCE_REPORT.md
   - PLAYWRIGHT_SCREENSHOTS/
   - DOM_DUMP.html
   - BIFURCATION_DECISION.md (A ou B com justificativa)

GCRC v2 obrigatÃ³rio com:
- BifurcaÃ§Ã£o determinada (A ou B) com prova de runtime
- DEC-036 atualizada no PR
- Screenshots
- PrÃ³ximo packet criado (se B)

PrÃ³ximo passo apÃ³s GCRC: aguardar Gate CEO 1.

Comece agora.
```

---

## âš ï¸ APÃ“S G1+G2+G3 â€” Gate CEO 1

Ver `05_PONTOS_DE_CONTROLE_GATES.md` seÃ§Ã£o Gate CEO 1.

ApÃ³s aprovaÃ§Ã£o do Gate CEO 1, prosseguir para G4.

---

## ðŸŸ¨ GRUPO 4 â€” CONTROL-CENTER-SETUP (5 dias)

**PrÃ©-requisito CEO (15 min):**
1. DNS: apontar control.failsafe.com.br (CNAME ou A record) para IP VPS Contabo
2. Confirmar SSH `ssh antigravity@[IP_VPS]` funcional
3. Confirmar Cockpit web em https://[IP_VPS]:9090

```
Antigravity, mandato continuado.

EXECUTAR AGORA: packet CONTROL-CENTER-SETUP-001
AprovaÃ§Ã£o CEO Gate 1: DEC-037 registrada.

LEITURA OBRIGATÃ“RIA:
- O prÃ³prio packet
- DECISIONS.md DEC-031, DEC-034
- docs/beta-b-0.1/FAILSAFE_ECO_FINAL_DEFINITIVE_BLUEPRINT.md Â§4 G4
- ops/control-plane/docs/failsafejud/FEATURE_REUSE_MAP.md
- ops/control-plane/docs/runbooks/JUD_HOSTGATOR_MAPPING.md

CONTEXTO ADICIONAL CONFIRMADO PELO CEO:
- DNS control.failsafe.com.br aponta para VPS Contabo
- SSH antigravity@[IP_VPS] funcional
- Cockpit operacional em :9090

DURAÃ‡ÃƒO: 5 dias Ãºteis (lote Ãºnico, sem micro-aprovaÃ§Ãµes).

DIRETRIZES ESPECÃFICAS:

Dia 1 â€” Setup base:
- Conectar SSH VPS
- Instalar Caddy 2: apt install caddy
- Instalar PHP 8.2-fpm: apt install php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-curl php8.2-gd php8.2-zip
- Instalar MariaDB 10.11: apt install mariadb-server
- mysql_secure_installation
- Criar database eco_control_center
- Criar user eco_admin com senha gerada (salvar no AccessBroker depois)

Dia 2 â€” Failsafejud adaptado:
- Baixar dump do HostGator: mysqldump failsafejud_db > /tmp/jud_schema.sql
- Importar schema no eco_control_center
- Clonar PHP em [REDACTED_PATH]/control-center/
- Modificar config.php apontando para eco_control_center local
- Remover mÃ³dulos jurÃ­dicos especÃ­ficos:
  rm -rf [REDACTED_PATH]/control-center/modules/{prazos,cnj_sync,plantao}
- Substituir branding via sed:
  find . -type f -name "*.php" -exec sed -i 's/HTF ADV SAAS/Failsafe Control Center/g' {} +
  find . -type f -name "*.php" -exec sed -i 's/HTF Advocacia/Failsafe ECO/g' {} +

Dia 3 â€” eco_state e auth GitHub:
- Criar tabela eco_state que espelha STATE_PACK.md
- Cron PHP a cada 1 min: lÃª STATE_PACK.md do repo (git pull) e atualiza eco_state
- Criar GitHub OAuth App:
  https://github.com/settings/applications/new
  - Application name: Failsafe Control Center
  - Homepage URL: https://control.failsafe.com.br
  - Callback URL: https://control.failsafe.com.br/auth/github/callback
  - Salvar Client ID + Secret no AccessBroker (criar tabela encrypted_credentials)
- Implementar PHP GitHub OAuth flow
- Implementar 2FA TOTP (jÃ¡ existe no failsafejud)

Dia 4 â€” 4 pÃ¡ginas iniciais:
1. /login (com botÃ£o "Login via GitHub" + form fallback senha+2FA)
2. /dashboard:
   - KPIs lendo eco_state
   - GitHub API: contagem PRs abertos, mergeados Ãºltimos 7 dias
   - Notices ativos (notices table)
   - PrÃ³ximas aÃ§Ãµes de NEXT_ACTIONS_QUEUE.md
3. /packets:
   - Lista da pasta packets/active/ via git ls-files
   - Coluna ID, TÃ­tulo, Status, PR link, CI status, GCRC status
   - BotÃµes: Despachar (POST /api/packets/{id}/dispatch),
     Pausar (status BLOCKED_BY_MANUAL_PAUSE),
     Cancelar (move para packets/blocked/),
     Ver evidÃªncia (modal)
4. /gcrcs:
   - Lista de retornos GCRC em ops/control-plane/evidence/*/GCRC_*.md
   - Diff inline dos arquivos modificados
   - BotÃµes: Aprovar e Mergear (calls GitHub API),
     Rejeitar (marca como REJECTED_GCRC_FALSE_POSITIVE),
     Solicitar revisÃ£o (comenta no PR)

Dia 5 â€” Hardening + Caddy + Smoke test:
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
- Audit penetraÃ§Ã£o bÃ¡sica:
  - SQL injection tests
  - XSS tests
  - CSRF token validation
- Backup config + DB para ASUSTOR

PLANO B SE VPS CONTABO FALHAR:
- Hospedar versÃ£o lite read-only no HostGator
- Documentar em FALLBACK_REPORT.md
- Criar DEC-041 para registrar fallback

VALIDATORS OBRIGATÃ“RIOS:
- HTTPS vÃ¡lido (testar com SSL Labs A+)
- GitHub OAuth funcional end-to-end
- 2FA TOTP funcional
- CSRF tokens em todos os forms
- SQL prepared statements only

GCRC v2 obrigatÃ³rio com:
- URL final + screenshot do dashboard logado (CEO no celular)
- Resultado audit penetraÃ§Ã£o
- Backup pÃ³s-setup confirmado em ASUSTOR
- Credenciais iniciais entregues via AccessBroker (NÃƒO em texto plano no GCRC)

PrÃ³ximo passo apÃ³s GCRC: disparar G5 + G6 em paralelo.

Comece agora.
```

---

## ðŸŸ¨ GRUPO 5 â€” CONTROL-CENTER-COMPLETENESS (4 dias, paralelo G6)

```
Antigravity, mandato continuado.

EXECUTAR AGORA: G5 - Control Center Completude (5 packets em lote)
Em paralelo a G6 (ABSORB JUDâ†’ECO).

Packets a executar:
- CC-VAULT-006 (Cofre AccessBroker UI)
- CC-IA-007 (Consulta IA Externa com auto-inject canon)
- CC-DR-008 (Disaster Recovery dashboard + botÃµes)
- CC-BRIDGE-009 (Bridge sync visual)
- CC-AUDIT-010 (Audit log viewer)
- CC-SETTINGS-011 (ConfiguraÃ§Ãµes tenants/users/themes)

(VocÃª gera estes 6 packets seguindo PACKET_TEMPLATE.md e os executa em
sequÃªncia rÃ¡pida dentro dos 4 dias.)

Branch: feature/control-center-completeness

DURAÃ‡ÃƒO: 4 dias Ãºteis lote Ãºnico.

DIRETRIZES ESPECÃFICAS:

[CC-VAULT-006] PÃ¡gina /vault:
- Reutilizar AccessBroker.php do failsafejud (AES-256-CBC jÃ¡ implementado)
- Tabela encrypted_credentials jÃ¡ deve existir do G4
- UI para CRUD de credenciais:
  Tipos suportados: github_pat, anthropic_api_key, openai_api_key,
  google_ai_key, asustor_creds, gdrive_oauth, hostgator_ssh,
  evolution_api_token, vps_ssh_key, lovable_api_key, zapsign_token,
  d4sign_token
- Acesso restrito: is_superadmin + 2FA TOTP obrigatÃ³rio
- Audit log de cada acesso/ediÃ§Ã£o
- BotÃ£o "Rotacionar" com workflow assistido
- BotÃ£o "Expiring soon" lista credenciais expirando < 30 dias

[CC-IA-007] PÃ¡gina /ia (RESOLVE "instruÃ§Ãµes nÃ£o seguidas"):
- Form: dropdown provider (Claude/ChatGPT/Gemini/Grok/Hermes), dropdown tipo
  (estratÃ©gica/tÃ©cnica/copy/diagnÃ³stico), textarea pergunta
- Ao submeter, Control Center monta automaticamente:
  ```
  CONTEXTO CANÃ”NICO OBRIGATÃ“RIO (auto-injetado):
  - AGENTS.md (hash atual)
  - STATE_PACK.md Â§17 Â§10 Â§12
  - DECISIONS.md Ãºltimas 5 DECs resumo inline
  - Papel canÃ´nico do agente: [da diretriz correspondente]
  - Modo: MVP_FASTLANE
  REGRAS:
  - DEC-009, DEC-015, DEC-020, DEC-026, DEC-027 (resumos inline)
  - Anti-microfragmentaÃ§Ã£o
  - GCRC v2 se for tarefa tÃ©cnica
  PERGUNTA:
  [texto do CEO]
  ```
- Chama API correspondente usando chave do AccessBroker
- Registra em tabela ai_consultations:
  id, provider, type, full_prompt, response, tokens_used,
  cost_usd, timestamp, ip, user_id, audit
- Mostra resposta formatada com:
  CitaÃ§Ã£o dos arquivos canon mencionados,
  BotÃ£o "Salvar em packet" (cria packet em packets/backlog/),
  BotÃ£o "Compartilhar com Aider" (cria comment no Antigravity),
  BotÃ£o "Rejeitar como drift" (marca provider como drift detected)

[CC-DR-008] PÃ¡gina /dr:
- Status cards lendo:
  - ASUSTOR Ãºltimo backup (via SSH read /backups/last-backup.json)
  - GDrive Ãºltimo upload (via rclone lsd)
  - Restore-smoke Ãºltimo drill (timestamp + resultado)
  - Retention: snapshots dos Ãºltimos 30/60/90 dias
- BotÃµes:
  - "Run DR Drill" â†’ executa backup-restore-smoke-checklist.md
  - "Force Backup Now" â†’ trigger backup imediato via SSH ASUSTOR
  - "Verify Last Backup" â†’ checksum + read test
  - "Retention Report" â†’ tabela completa
- Alertas WhatsApp:
  - Backup falha 2x consecutivos
  - DR drill > 14 dias sem rodar
  - Snapshot Contabo > 7 dias

[CC-BRIDGE-009] PÃ¡gina /bridge:
- Snapshot canon interno (STATE_PACK.md) vs bridge pÃºblica
- Diff visual side-by-side
- Ãšltima sincronizaÃ§Ã£o timestamp + hash commit
- BotÃ£o "Force Re-Sync" â†’ executa publish-public-bridge.sh via SSH
- URL pÃºblica linkada

[CC-AUDIT-010] PÃ¡gina /audit:
- audit_log table viewer (paginado)
- Filtros: perÃ­odo (24h/7d/30d/all), action, user, severity, IP
- Export CSV/JSON
- Append-only enforced via trigger SQL:
  CREATE TRIGGER prevent_audit_modification
  BEFORE UPDATE OR DELETE ON audit_log
  FOR EACH ROW SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'audit_log is append-only';

[CC-SETTINGS-011] PÃ¡gina /settings (5 sub-tabs):
- Tenants (multi-tenant interno)
- Users & Groups (CEO + admins + viewers)
- Theme tokens (visual do prÃ³prio Control Center)
- Integrations (URLs GitHub API, Hermes endpoint, N8N webhooks)
- Taxonomy (DEC-009 lista nomes proibidos com validaÃ§Ã£o live)
- Maintenance Mode toggle (freezar dispatches)

IMPLEMENTAR TAMBÃ‰M:
- Tiers T1/T2/T3 conforme DEC-034 em /lib/approval_tier.php
- Tabelas ui_screens_versions + ui_screens_current
- WhatsApp alerting via Evolution API (chave no AccessBroker)
- UptimeRobot configurado externamente (monitor /health endpoint)

VALIDATORS:
- 9 pÃ¡ginas todas retornam 200 quando logado
- 9 pÃ¡ginas redirecionam para login quando nÃ£o logado
- Cofre: tentativa de acesso sem 2FA bloqueia
- IA: prompt completo registrado no audit_log
- DR Drill: smoke test passes
- Audit: tentativa de UPDATE/DELETE rejeitada pelo trigger

GCRC v2 obrigatÃ³rio por sub-packet (6 GCRCs no total ou 1 consolidado).

PrÃ³ximo passo: aguardar Gate CEO 2 (apÃ³s G5 + G6 completos).

Comece agora.
```

---

## ðŸŸ¨ GRUPO 6 â€” ABSORB-JUD-TO-ECO (8 dias, paralelo G5)

```
Antigravity, mandato continuado.

EXECUTAR AGORA: G6 ABSORB do failsafejud para ECO Core (4 packets)
Em paralelo a G5 (Control Center Completude). Branches separadas.

Branch: feature/absorb-jud-to-eco-core

LEITURA OBRIGATÃ“RIA:
- /mnt/user-data/outputs/FAILSAFEJUD_TO_ECO_ABSORPTION_PLAN.md
  (plano detalhado dos 17 padrÃµes)
- ops/control-plane/docs/failsafejud/FEATURE_REUSE_MAP.md
- failsafejud source code para mineraÃ§Ã£o de padrÃµes:
  bootstrap.php, AccessBroker.php, TenantDataOps.php, Ui.php,
  People.php, WorkflowEngine.php, WhatsApp.php, audit() helper

DURAÃ‡ÃƒO: 8 dias Ãºteis lote Ãºnico.

ABSORB-001 (2 dias) â€” Ã“rbita + ACL + Audit + Modo:
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

ABSORB-002 (2 dias) â€” Pessoas + Temas + Notices:
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

ABSORB-003 (2 dias) â€” Cofre + WhatsApp:
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

ABSORB-004 (2 dias) â€” SLA/Prazos GenÃ©rico:
Schemas Postgres:
- 022_deadlines.sql
- 023_deadline_types.sql (parametrizÃ¡vel: business_days, calendar_days, work_hours)
- 024_holidays.sql
- 025_deadline_history.sql
Helpers TS:
- packages/api-core/src/deadlines/
  Engine genÃ©rico (sem CPC/CPP/CLT especÃ­fico â€” fica para vertical Jud futuro)
  CÃ¡lculo: business_days(start, days, holidays)
  SemÃ¡foro: getSemaphore(deadline) â†’ 'green'|'yellow'|'red'
  Triggers automÃ¡ticos de notification

PARA CADA ABSORB:
- Migrations IDEMPOTENTES (CREATE IF NOT EXISTS, idempotent inserts)
- RLS leakage = 0 testado com 3 tenants sintÃ©ticos
- Helpers TypeScript com tipos rigorosos (strict mode, no any)
- Smoke tests automatizados em packages/api-core/tests/
- Rollback documentado em ROLLBACK_NOTES.md
- DocumentaÃ§Ã£o em docs/00-canonical/data-models/<feature>.md

EVIDÃŠNCIA por ABSORB em ops/control-plane/evidence/absorb-<XXX>/:
- MIGRATION_LOG.txt
- RLS_LEAKAGE_TEST_REPORT.md
- TYPESCRIPT_BUILD_LOG.txt
- SMOKE_TEST_RESULTS.json

VALIDATORS:
- npx tsc --noEmit PASS em todo o packages/api-core
- npm test PASS em packages/api-core
- RLS leakage = 0 (script test/rls-leakage.test.ts)
- Migrations rodam em ambiente staging sem erro

GCRC v2 obrigatÃ³rio por ABSORB (4 GCRCs).

PrÃ³ximo passo: aguardar Gate CEO 2.

Comece agora.
```

---

## âš ï¸ APÃ“S G4+G5+G6 â€” Gate CEO 2

Ver `05_PONTOS_DE_CONTROLE_GATES.md` seÃ§Ã£o Gate CEO 2.

---

## ðŸŸ§ GRUPO 7 â€” STAGING-GATES (3 dias)

**PrÃ©-requisito CEO (30 min):**
1. Criar snapshot Contabo
2. Revisar e autorizar regras UFW
3. Cadastrar 3 GitHub Secrets
4. Registrar DEC-039 com IDs

```
Antigravity, gates fÃ­sicos liberados conforme DEC-039.

EXECUTAR EM SEQUÃŠNCIA:
1. STAGING-PROVISIONING-EXECUTION-001 (jÃ¡ existe em packets/active/)
2. RLS-STAGE-001 (jÃ¡ existe em packets/active/)

LEITURA OBRIGATÃ“RIA:
- DEC-039 (liberaÃ§Ã£o CEO)
- ops/control-plane/docs/runbooks/STAGING_PROVISIONING_GATE.md
- ops/control-plane/docs/runbooks/RLS_STAGE_PLAN.md
- ops/control-plane/packets/active/STAGING-PROVISIONING-EXECUTION-001.md
- ops/control-plane/packets/active/RLS-STAGE-001.md

DURAÃ‡ÃƒO: 3 dias Ãºteis.

CONTEXTO CONFIRMADO PELO CEO:
- Snapshot Contabo ID: [conforme DEC-039]
- UFW regras autorizadas
- Secrets cadastrados: FAILSAFE_SSH_VPS_KEY, STAGING_DB_PASSWORD, STAGING_DATABASE_URL
- Backup prÃ©-bootstrap em ASUSTOR + GDrive validado

DIRETRIZES ESPECÃFICAS:

STAGING-PROVISIONING-EXECUTION-001:
- SSH VPS Contabo
- Aplicar regras UFW (configure_ufw_failsafe_vps.sh)
- Provisionar Postgres 16 + pgvector
- Aplicar todas as migrations do G6 ABSORB
- Criar 3 tenants sintÃ©ticos:
  tenant_alpha (Fabricante OEM piloto)
  tenant_beta (Autorizada)
  tenant_gamma (Cliente final)
- Validar conexÃ£o pelo Control Center
- Backup pÃ³s-provisionamento

RLS-STAGE-001:
- Aplicar RLS policies em todas as tabelas multi-tenant
- Smoke test cruzado:
  Logar como tenant_alpha â†’ tentar acessar dados tenant_beta â†’ BLOCKED
  Logar como tenant_beta â†’ tentar acessar dados tenant_gamma â†’ BLOCKED
- Documentar em RLS_LEAKAGE_PROOF.md

VALIDATORS:
- sudo ufw status â†’ ativo, portas sÃ³ esperadas
- psql $STAGING_DATABASE_URL â†’ conecta
- RLS leakage = 0 com prova
- Backup pÃ³s-bootstrap registrado em ASUSTOR + GDrive
- Logs Postgres limpos (zero erros graves)

GCRC v2 obrigatÃ³rio com:
- SaÃ­da de ufw status
- SaÃ­da de SHOW row_security em cada tabela
- Resultado do teste cruzado RLS
- ID do backup pÃ³s-bootstrap

PrÃ³ximo passo: G8 (MVP UNOX deploy) - prioridade comercial soberana.

Comece agora.
```

---

## ðŸŸ¥ GRUPO 8 â€” MVP-OEM-VALIDATION-AND-DEPLOY (5 dias) â€” P0 SOBERANA

```
Antigravity, mandato continuado.

EXECUTAR AGORA: packet MVP-OEM-VALIDATION-AND-DEPLOY-001
PRIORIDADE P0 SOBERANA â€” destrava viabilidade comercial UNOX.

LEITURA OBRIGATÃ“RIA:
- O prÃ³prio packet
- docs/05-execution/active/fs-ops-006-asset-services-oem-pilot-5-day-mvp.md (mock atual)
- ops/control-plane/docs/verticals/asset-service-management/MVP_ACCEPTANCE_CRITERIA.md
- ops/control-plane/docs/verticals/asset-service-management/MVP_BACKLOG.md
- ops/control-plane/docs/verticals/asset-service-management/WORKORDER_FLOW.md
- ops/control-plane/docs/verticals/asset-service-management/DATA_MODEL.md
- evidence/mvp-slice-005-preventative-pmoc/MVP_SLICE_005_PREVENTATIVE_PMOC_CLOSEOUT.md

DURAÃ‡ÃƒO: 5 dias Ãºteis lote Ãºnico.

Branch: feature/mvp-oem-deploy-validation

DIRETRIZES ESPECÃFICAS:

Dia 1 â€” ValidaÃ§Ã£o Hardened Mock FS-OPS-006:
- Para cada critÃ©rio em MVP_ACCEPTANCE_CRITERIA.md, validar cobertura no mock
- Documentar gaps em GAPS_REPORT.md
- Corrigir gaps crÃ­ticos (nÃ£o-crÃ­ticos vÃ£o para backlog)

Dia 2 â€” FinalizaÃ§Ã£o Slice 005 PMOC:
- ValidaÃ§Ã£o visual definitiva via Playwright DOM real
- Matriz 52 semanas renderizando corretamente
- GeraÃ§Ã£o automÃ¡tica de OS preventiva ao chegar a semana programada
- Marcar MVP_SLICE_005 como CONCLUÃDO

Dia 3 â€” Deploy real staging:
- Build de apps/failsafe-hub (npm run build)
- Deploy via Caddy em subdomain demo:
  SugestÃ£o: demo.failsafe.com.br ou control-tenant.failsafe.com.br
- Postgres staging com schemas G6 absorvidos aplicados
- RLS ativo
- Smoke test conectividade end-to-end

Dia 4 â€” 3 tenants sintÃ©ticos OEM:
- tenant_fabricante_oem_demo (Fabricante OEM piloto, NUNCA usar nome real)
- tenant_autorizada_demo (rede autorizada)
- tenant_cliente_final_demo (cliente final)
- Asset Passports com Serial Numbers fictÃ­cios:
  Ex: "FAILSAFE-DEMO-OVEN-001", "FAILSAFE-DEMO-OVEN-002", etc.
- QR Codes gerados:
  https://demo.failsafe.com.br/asset/FAILSAFE-DEMO-OVEN-001
- Seed data sanitizado conforme taxonomy guard

Dia 5 â€” Smoke test fluxo end-to-end:
1. Cliente final (no celular) escaneia QR Code do ativo demo
2. Abre chamado: nome="JoÃ£o Demo", telefone="11999999999",
   falha="NÃ£o esquenta", 3 fotos demo
3. Triador (logado como tenant_fabricante_oem_demo) vÃª chamado, converte em OS
4. Atribui tÃ©cnico
5. TÃ©cnico (logado como tenant_autorizada_demo) recebe notificaÃ§Ã£o,
   executa checklist, tira foto, GPS, assinatura
6. Solicita peÃ§a (validaÃ§Ã£o garantia automÃ¡tica se data instalaÃ§Ã£o < 12 meses)
7. CEO (logado como superadmin no Control Center) aprova orÃ§amento
8. OS encerrada
9. Dashboard atualizado por persona:
   - Fabricante: todas as OSs
   - Autorizada: sÃ³ as prÃ³prias
   - Cliente: sÃ³ os prÃ³prios chamados

DOCUMENTAÃ‡ÃƒO ENTREGÃVEL:
- MANUAL_FABRICANTE.md (1 pÃ¡gina, operacional)
- MANUAL_AUTORIZADA.md (1 pÃ¡gina)
- MANUAL_CLIENTE_FINAL.md (1 pÃ¡gina)
- ROTEIRO_DEMO_UNOX.md (script CEO ao cliente, 5 min)
- FAQ_DEMO.md (10 dÃºvidas comuns)

PLANO B SE ALGO FALHAR NO DIA 5:
- Identificar bloqueio especÃ­fico (qual etapa do fluxo)
- Mock Hardened original (FS-OPS-006) continua disponÃ­vel para demo de UI
- Real deploy fica para prÃ³ximo ciclo
- ApresentaÃ§Ã£o UNOX usa Mock + roteiro adaptado

GCRC v2 obrigatÃ³rio com:
- VÃ­deo screencast do fluxo completo (15 min) em evidence/
- Screenshots por persona
- URL demo acessÃ­vel pelo CEO via celular
- Resultado RLS leakage com 3 tenants
- DocumentaÃ§Ã£o entregue (5 arquivos)
- RelatÃ³rio executivo 2 pÃ¡ginas: EXECUTIVE_REPORT.md

PrÃ³ximo passo apÃ³s GCRC: Gate CEO 3 (autorizaÃ§Ã£o para demo ao cliente UNOX).

Comece agora. P0 SOBERANA, executar com mÃ¡xima prioridade.
```

---

## âš ï¸ APÃ“S G8 â€” Gate CEO 3

Ver `05_PONTOS_DE_CONTROLE_GATES.md` seÃ§Ã£o Gate CEO 3.

ApÃ³s Gate CEO 3 aprovado, **demo ao cliente UNOX** liberada.

