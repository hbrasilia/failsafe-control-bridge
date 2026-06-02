# STATE_PACK_PUBLIC â€” Estado PÃºblico do Failsafe ECO

> [!IMPORTANT]
> Este documento Ã© uma visÃ£o pÃºblica sanitizada do estado operacional.
> Repo Soberano: hbrasilia/failsafe (Privado)

# STATE_PACK â€” Estado CanÃ´nico Operacional (v0.1)

---
document_id: state-pack
version: 0.1.0-rc+2026-06-02
status: active
owner: CEO
scope: canonical-state
governance: no-regression
---

> [!IMPORTANT]
> **REGRA DE ESTADO CANÃ”NICO (DEC-026):** MemÃ³ria de chat temporÃ¡ria NÃƒO Ã© fonte de verdade para alinhamento operacional. Toda decisÃ£o tÃ©cnica e progressÃ£o de tarefas devem basear-se unicamente nas premissas registradas neste documento e nos arquivos locais.

---

## 1. Estado Atual do Failsafe ECO
- **Fase**: Phase 0.9 Discovery / Readiness do Piloto.
- **Status do Portal**: ImportaÃ§Ã£o estÃ©tica e reconciliaÃ§Ã£o visual do `failsafe01` concluÃ­das com sucesso. O linter e os testes de login/redirecionamento Playwright estÃ£o passando com 100% de sucesso. Hotfix de tela branca dev:hub concluÃ­do e testado.

## 2. ALPHA Vigente
- **Anti-Manual**: Todo fluxo deve priorizar empacotamento de automaÃ§Ãµes (checks, lints, assunÃ§Ãµes) locais e na esteira de CI/CD.
- **Blindagem de Taxonomia**: Proibido qualquer nome real de cliente comercial nos diretÃ³rios, rotas, tabelas ou caminhos ativos.
- **DesambiguaÃ§Ã£o semÃ¢ntica**:
  - `HERMES`: LLM local que roda na VPS.
  - `GERENTE`: Conselho operacional do Control Plane.
  - `Antigravity`: Executor autorizado.

## 3. RepositÃ³rio Soberano
- **Caminho FÃ­sico**: [hbrasilia/failsafe](file:///[REDACTED_LOCAL_PATH])

## 4. Control Plane
- **Caminho FÃ­sico**: [ops/control-plane/](file:///[REDACTED_LOCAL_PATH])

## 5. App Real Servido por dev:hub
- **Workspace**: `@failsafe/hub-web-staging` na pasta [apps/hub-web-staging](file:///[REDACTED_LOCAL_PATH]).

## 6. Workspaces Reais que devem ficar sincronizados
1. [apps/hub-web-staging](file:///[REDACTED_LOCAL_PATH]) (Workspace ativo de Staging)
2. [apps/hub-web](file:///[REDACTED_LOCAL_PATH]) (Workspace ativo de ProduÃ§Ã£o)

## 7. Pasta `apps/failsafe-hub`
- A pasta `apps/failsafe-hub` atua apenas como staging inativo ou arquivo. AlteraÃ§Ãµes nela **NÃƒO** refletem no runtime local e sÃ£o consideradas insuficientes/invÃ¡lidas para homologaÃ§Ã£o visual.

## 8. Lovable/failsafe01 como ReferÃªncia Visual (Bridge UI)
- **Projeto Fonte**: [failsafe01](file:///[REDACTED_LOCAL_PATH])
- **Papel**: Atua estritamente como a referÃªncia visual homologada para wow-factor e reconciliaÃ§Ã£o estÃ©tica. Backend, lÃ³gica, persistÃªncia local e dados sintÃ©ticos do repositÃ³rio soberano `hbrasilia/failsafe` prevalecem integralmente.

## 9. Taxonomia ALPHA
- **Ecossistema**: `Failsafe ECO`
- **Hub/base**: `Failsafe Central`
- **Vertical prioritÃ¡rio**: `Failsafe GestÃ£o de Ativos e ServiÃ§os`
- **Nome tÃ©cnico**: `Failsafe Asset & Service Management Cloud`
- **Pacotes/Capabilities**: OEM, Maintenance, Field Service, AT, Client, Parts, Billing, BI, Cortex e Bridge (NÃ£o sÃ£o verticais).
- **Nome real de cliente**: Nunca entra em produto, mÃ³dulo, branch, rota, tabela, seed, packet, dashboard, script, release, config ou doc canÃ´nica.

## 10. Slices 001â€“005 Implementados e Preservados
- **Slice 001**: CRUD local de Ativos e OSs em `localStorage`.
- **Slice 002**: Fluxo de peÃ§as, requisiÃ§Ãµes de estoque e Pedidos de Compra Internos.
- **Slice 003**: OrÃ§amento consolidado fixo (mÃ£o de obra R$ 250) e faturamento mock com chave `failsafe_invoices`.
- **Slice 004**: Fila offline com chave `failsafe_offline_queue`, sensor nativo de GPS e anexos multilaterais (laudos tÃ©cnicos).
- **Slice 005**: Matriz de 52 Semanas e agendamento preventivo de OSs.

## 11. Staging FÃ­sico
- **Status**: `BLOCKED_WAITING_GATES` (Bloqueio total de deploys ou escrita na VPS Contabo / HostGator / Vercel / Lovable).

## 12. Gates FÃ­sicos Pendentes
1. ComprovaÃ§Ã£o de Snapshot na VPS Contabo.
2. Blindagem e validaÃ§Ã£o das regras UFW do firewall.
3. Provisionamento das chaves GitHub Secrets (`FAILSAFE_SSH_VPS_KEY`, `STAGING_DB_PASSWORD`, `STAGING_DATABASE_URL`).
4. AprovaÃ§Ã£o fÃ­sica formalizada pelo CEO em `NEXT_ACTIONS_QUEUE.md` / `DECISIONS.md`.

## 13. Ãšltimos PRs Aceitos
- **PR #176 (Mesclado)**: ImportaÃ§Ã£o visual Lovable e fusÃ£o com lÃ³gica dos Slices 001-004.
- **PR #180 (Mesclado)**: ResoluÃ§Ã£o de incidentes de renderizaÃ§Ã£o reais nos hubs ativos.
- **PR #184 (Mesclado)**: Hotfix definitivo de tela branca (plugin Vite SWC, children Failsafe.tsx e Login.tsx redirect).
- **PR #185 (Mesclado)**: Enforce do Estado CanÃ´nico e CriaÃ§Ã£o do STATE_PACK.md sob a DEC-026.

## 14. PRs Pendentes
- Nenhum PR pendente no momento.

## 15. Ãšltimo GCRC Aceito
- **Status**: `COMPLETED` (PR #185 mesclado com sucesso, validando a criaÃ§Ã£o de STATE_PACK.md e enforce de estado canÃ´nico).

## 16. GCRCs Rebaixados / Falsos Positivos
- DeclaraÃ§Ãµes anteriores de paridade visual baseadas em build verde sem DOM renderizado ativamente na porta 8080.
- DeclaraÃ§Ã£o de "COMPLETED" para a DEC-026 sem PR remoto mesclado ou com commit local apenas (rebaixado para NEEDS_COMPLETION no inÃ­cio do packet CONTROL-PLANE-GCRC-GATE-001).

## 17. PrÃ³ximo Packet Autorizado
- **Atividade**: Iniciar o packet **FS-INFRA-017 / RLS-STAGE-001** (ConfiguraÃ§Ã£o fÃ­sica de banco PostgreSQL com pgvector e polÃ­ticas de RLS e multi-tenant no staging da VPS Contabo sob aprovaÃ§Ã£o formal).

## 18. AÃ§Ãµes Proibidas
- NÃ£o fazer push direto ou alteraÃ§Ã£o na branch `main` sem aprovaÃ§Ã£o do CI/CD.
- NÃ£o manipular secrets de produÃ§Ã£o ou dados confidenciais de clientes.
- NÃ£o executar comandos de deploy ou provisionamento fÃ­sico sem comprovaÃ§Ã£o de gates.
- NÃ£o presumir dados de conexÃ£o (falta de credencial = `BLOQUEADO POR ACESSO`).

## 19. CritÃ©rio de COMPLETED
Para qualquer tarefa tÃ©cnica ser considerada finalizada, exige-se:
1. PR remoto correspondente aberto.
2. Checks e esteiras de CI remotos do GitHub Actions verdes.
3. Merge ou status de ready-for-merge comprovado no repositÃ³rio.
4. EvidÃªncia documental versionada sob a pasta `ops/control-plane/evidence/`.
5. Prova fÃ­sica de runtime e DOM via testes automatizados (quando aplicÃ¡vel).
6. AtualizaÃ§Ã£o de `NEXT_ACTIONS_QUEUE.md` e metadados.

## 20. Regra de InicializaÃ§Ã£o de ExecuÃ§Ã£o
- Toda e qualquer execuÃ§Ã£o de agente ou IA deve comeÃ§ar obrigatoriamente pela leitura e verificaÃ§Ã£o dos seguintes arquivos locais:
  1. [STATE_PACK.md](file:///[REDACTED_LOCAL_PATH])
  2. [NEXT_ACTIONS_QUEUE.md](file:///[REDACTED_LOCAL_PATH])
  3. [DECISIONS.md](file:///[REDACTED_LOCAL_PATH])
  4. Ãšltimo GCRC aceito (conforme registrado no [AI_LOG.md](file:///[REDACTED_LOCAL_PATH])).

