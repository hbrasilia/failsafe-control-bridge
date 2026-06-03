# STATE_PACK_PUBLIC — Estado Público do Failsafe ECO

> [!IMPORTANT]
> Este documento é uma visão pública sanitizada do estado operacional.
> Repo Soberano: hbrasilia/failsafe (Privado)

# STATE_PACK — Estado Canônico Operacional (v0.1)

---
document_id: state-pack
version: 0.1.0-rc+2026-06-02
status: active
owner: CEO
scope: canonical-state
governance: no-regression
---

> [!IMPORTANT]
> **REGRA DE ESTADO CANÔNICO (DEC-026):** Memória de chat temporária NÃO é fonte de verdade para alinhamento operacional. Toda decisão técnica e progressão de tarefas devem basear-se unicamente nas premissas registradas neste documento e nos arquivos locais.

---

## 1. Estado Atual do Failsafe ECO
- **Fase**: Phase 0.9 Discovery / Readiness do Piloto.
- **Status do Portal**: Importação estética e reconciliação visual do `failsafe01` concluídas com sucesso. O linter e os testes de login/redirecionamento Playwright estão passando com 100% de sucesso. Hotfix de tela branca dev:hub concluído e testado.

## 2. ALPHA Vigente
- **Anti-Manual**: Todo fluxo deve priorizar empacotamento de automações (checks, lints, assunções) locais e na esteira de CI/CD.
- **Blindagem de Taxonomia**: Proibido qualquer nome real de cliente comercial nos diretórios, rotas, tabelas ou caminhos ativos.
- **Desambiguação semântica**:
  - `HERMES`: LLM local que roda na VPS.
  - `GERENTE`: Conselho operacional do Control Plane.
  - `Antigravity`: Executor autorizado.

## 3. Repositório Soberano
- **Caminho Físico**: [hbrasilia/failsafe](file:///[REDACTED_LOCAL_PATH])

## 4. Control Plane
- **Caminho Físico**: [ops/control-plane/](file:///[REDACTED_LOCAL_PATH])

## 5. App Real Servido por dev:hub
- **Workspace**: `@failsafe/hub-web-staging` na pasta [apps/hub-web-staging](file:///[REDACTED_LOCAL_PATH]).

## 6. Workspaces Reais que devem ficar sincronizados
1. [apps/hub-web-staging](file:///[REDACTED_LOCAL_PATH]) (Workspace ativo de Staging)
2. [apps/hub-web](file:///[REDACTED_LOCAL_PATH]) (Workspace ativo de Produção)

## 7. Pasta `apps/failsafe-hub`
- A pasta `apps/failsafe-hub` atua apenas como staging inativo ou arquivo. Alterações nela **NÃO** refletem no runtime local e são consideradas insuficientes/inválidas para homologação visual.

## 8. Lovable/failsafe01 como Referência Visual (Bridge UI)
- **Projeto Fonte**: [failsafe01](file:///[REDACTED_LOCAL_PATH])
- **Papel**: Atua estritamente como a referência visual homologada para wow-factor e reconciliação estética. Backend, lógica, persistência local e dados sintéticos do repositório soberano `hbrasilia/failsafe` prevalecem integralmente.

## 9. Taxonomia ALPHA
- **Ecossistema**: `Failsafe ECO`
- **Hub/base**: `Failsafe Central`
- **Vertical prioritário**: `Failsafe Gestão de Ativos e Serviços`
- **Nome técnico**: `Failsafe Asset & Service Management Cloud`
- **Pacotes/Capabilities**: OEM, Maintenance, Field Service, AT, Client, Parts, Billing, BI, Cortex e Bridge (Não são verticais).
- **Nome real de cliente**: Nunca entra em produto, módulo, branch, rota, tabela, seed, packet, dashboard, script, release, config ou doc canônica.

## 10. Slices 001–005 Implementados e Preservados
- **Slice 001**: CRUD local de Ativos e OSs em `localStorage`.
- **Slice 002**: Fluxo de peças, requisições de estoque e Pedidos de Compra Internos.
- **Slice 003**: Orçamento consolidado fixo (mão de obra R$ 250) e faturamento mock com chave `failsafe_invoices`.
- **Slice 004**: Fila offline com chave `failsafe_offline_queue`, sensor nativo de GPS e anexos multilaterais (laudos técnicos).
- **Slice 005**: Matriz de 52 Semanas e agendamento preventivo de OSs.

## 11. Staging Físico
- **Status**: `BLOCKED_WAITING_GATES` (Avaliação de provimento de gates FS-INFRA-017-GATE-PROVISION realizada; pendente segredos e snapshot Contabo).



## 12. Gates Físicos Pendentes
1. Comprovação de Snapshot na VPS Contabo (BLOCKED_BY_ACCESS).
2. Provisionamento das chaves GitHub Secrets (`FAILSAFE_SSH_VPS_KEY`, `STAGING_DB_PASSWORD`, `STAGING_DATABASE_URL`) (BLOCKED_BY_CREDENTIAL).
3. Aprovação física formalizada pelo CEO em `NEXT_ACTIONS_QUEUE.md` / `DECISIONS.md`.


## 13. Últimos PRs Aceitos
- **PR #176 (Mesclado)**: Importação visual Lovable e fusão com lógica dos Slices 001-004.
- **PR #180 (Mesclado)**: Resolução de incidentes de renderização reais nos hubs ativos.
- **PR #184 (Mesclado)**: Hotfix definitivo de tela branca (plugin Vite SWC, children Failsafe.tsx e Login.tsx redirect).
- **PR #185 (Mesclado)**: Enforce do Estado Canônico e Criação do STATE_PACK.md sob a DEC-026.

## 14. PRs Pendentes
- Nenhum PR pendente no momento.

## 15. Último GCRC Aceito
- **Status**: `COMPLETED` (PR #185 mesclado com sucesso, validando a criação de STATE_PACK.md e enforce de estado canônico).

## 16. GCRCs Rebaixados / Falsos Positivos
- Declarações anteriores de paridade visual baseadas em build verde sem DOM renderizado ativamente na porta 8080.
- Declaração de "COMPLETED" para a DEC-026 sem PR remoto mesclado ou com commit local apenas (rebaixado para NEEDS_COMPLETION no início do packet CONTROL-PLANE-GCRC-GATE-001).

## 17. Próximo Packet Autorizado
- **Atividade**: Iniciar o packet **FS-INFRA-017 / RLS-STAGE-001** (Configuração física de banco PostgreSQL com pgvector e políticas de RLS e multi-tenant no staging da VPS Contabo sob aprovação formal).

## 18. Ações Proibidas
- Não fazer push direto ou alteração na branch `main` sem aprovação do CI/CD.
- Não manipular secrets de produção ou dados confidenciais de clientes.
- Não executar comandos de deploy ou provisionamento físico sem comprovação de gates.
- Não presumir dados de conexão (falta de credencial = `BLOQUEADO POR ACESSO`).

## 19. Critério de COMPLETED
Para qualquer tarefa técnica ser considerada finalizada, exige-se:
1. PR remoto correspondente aberto.
2. Checks e esteiras de CI remotos do GitHub Actions verdes.
3. Merge ou status de ready-for-merge comprovado no repositório.
4. Evidência documental versionada sob a pasta `ops/control-plane/evidence/`.
5. Prova física de runtime e DOM via testes automatizados (quando aplicável).
6. Atualização de `NEXT_ACTIONS_QUEUE.md` e metadados.

## 20. Regra de Inicialização de Execução
- Toda e qualquer execução de agente ou IA deve começar obrigatoriamente pela leitura e verificação dos seguintes arquivos locais:
  1. [STATE_PACK.md](file:///[REDACTED_LOCAL_PATH])
  2. [NEXT_ACTIONS_QUEUE.md](file:///[REDACTED_LOCAL_PATH])
  3. [DECISIONS.md](file:///[REDACTED_LOCAL_PATH])
  4. Último GCRC aceito (conforme registrado no [AI_LOG.md](file:///[REDACTED_LOCAL_PATH])).

## 21. Ponte de Controle Pública
- **Repositório**: [failsafe-control-bridge](https://github.com/hbrasilia/failsafe-control-bridge)
- **Script de Sincronização**: [publish-public-bridge.ps1](file:///[REDACTED_LOCAL_PATH])
- **Reparo do Bridge**: `CONCLUÍDO` (PUBLIC-BRIDGE-REPAIR-001 mesclado no PR #2, removendo mojibake e alinhando decisões).


## 22. IssueOps Control Board
- **Status**: `ACTIVE` (Issue #190 FS-CONTROL-BOARD active with labels and validation workflows).
- **Template**: `.github/ISSUE_TEMPLATE/failsafe-control-command.md`
- **Workflow**: `.github/workflows/failsafe-issueops-gcrc-gate.yml`
- **Validators**: `ops/control-plane/scripts/gcrc/validate-issueops-gcrc.*`

