# NEXT_ACTION â€” PrÃ³ximas AÃ§Ãµes do Failsafe ECO

# Next Actions Queue â€” ControlKit 0.12

## ðŸŽ¯ P0 - Fila de ExecuÃ§Ã£o Remota (Autodispatch)

1.  **Publicar ControlKit na Main (PR #140)**: [CONCLUÃDO - PR #140 mesclado via commit `a602600` com 10/10 esteiras verdes].
2.  **Saneamento Documental (OPS-DOCS-001 & PR #142)**: [CONCLUÃDO - IntegraÃ§Ã£o canÃ´nica das Project Instructions DEC-009 concluÃ­da via PR #142, commit `7334d76`].
3.  **Hardening de Taxonomy Guard (TAXONOMY-GUARD-001)**: [CONCLUÃDO - PR #143 mesclado, pre-commit local opt-in validado e gates de CI remotos estritamente obrigatÃ³rios ativados].
4.  **Paralelismo de Frentes Operacionais (ASSET-SERVICES & INFRA)**: [CONCLUÃDO - PRs #144, #145, #146, #147 e #148 mesclados e integrados com sucesso na main].
5.  **HomologaÃ§Ã£o e Fechamento em Lote (PR #149)**: [CONCLUÃDO - PR #149 mesclado, consolidando todas as evidÃªncias e runbooks de fundaÃ§Ã£o].
6.  **AtivaÃ§Ã£o do Barramento de Despacho (OPS-AUTODISPATCH-001)**: [CONCLUÃDO - PR #150 mesclado, barramento passivo de outbox ativo].
7.  **Mapeamento de Backlog do MVP (ASSET-SERVICES-MVP-BACKLOG-001)**: [CONCLUÃDO - PR #152 mesclado, backlog com histÃ³rias e arquitetura de dados consolidado].
8.  **CodificaÃ§Ã£o da Fatia Funcional P0 (MVP-IMPLEMENTATION-SLICE-001)**: [CONCLUÃDO - PR #154 mesclado, cÃ³digo navegÃ¡vel 100% integrado].
9.  **Plano de Staging VPS Contabo (VPS-STAGING-PLAN-001)**: [CONCLUÃDO - PR #155 mesclado, topologia e gates de seguranÃ§a consolidados].
10. **Alinhamento do FailsafeJUD HostGator (JUD-ALIGNMENT-FOLLOWUP-001)**: [CONCLUÃDO - PR #156 mesclado, limitaÃ§Ãµes e reutilizaÃ§Ã£o mapeadas].
11. **PrÃ³xima Fila PrioritÃ¡ria (Recomendado)**: Iniciar o packet **FS-INFRA-017 / RLS-STAGE-001** (implantaÃ§Ã£o fÃ­sica da infraestrutura de banco PostgreSQL com extensÃ£o `pgvector` no staging da VPS Contabo sob os gates aprovados da DEC-012, e configuraÃ§Ã£o de polÃ­ticas de RLS e multi-tenant).
12. **ConsolidaÃ§Ã£o do Mandato de ExecuÃ§Ã£o ContÃ­nua (DEC-015)**: [CONCLUÃDO - Branch chore/mandato-execucao-continua mesclada com sucesso nas memÃ³rias canÃ´nicas].
13. **Fatia Funcional P1 - GestÃ£o de PeÃ§as (MVP-SLICE-002-PARTS-APPROVALS)**: [CONCLUÃDO - Estoque mock, reserva local, Pedido de Compra Interno e painel administrativo de orÃ§amentos integrados na branch feature/mvp-parts-approvals-slice-002].
14. **Fatia Funcional P2 - OrÃ§amentos, AlÃ§adas e Faturamento (MVP-SLICE-003-BUDGET-BILLING-LITE)**: [CONCLUÃDO - OrÃ§amento consolidado mÃ£o de obra (R$ 250) + peÃ§as, alÃ§adas dinÃ¢micas (TÃ©cnico, Coordenador, Gerente, Diretor), faturamento mock com chave failsafe_invoices, aba financeira Admin e Dashboard estendido 5 colunas integrados na branch feature/mvp-budget-billing-lite-slice-003].
15. **Fatia Funcional P3 - Rastreabilidade Offline & EvidÃªncias Multilaterais (MVP-SLICE-004-FIELD-EVIDENCE-OFFLINE-LITE)**: [CONCLUÃDO - Fila offline mock na chave failsafe_offline_queue, geolocalizaÃ§Ã£o nativa por sensor real do browser, assinatura polida, SeÃ§Ã£o 6 de mÃºltiplos anexos (PDF, fotos OEM), alertas reativos no Dashboard global e cabeÃ§alho celular industrial na branch feature/mvp-field-evidence-offline-lite-slice-004].
    - **Hotfix Build JSX**: Corrigida falha de fechamento de div na SeÃ§Ã£o 5 de `WorkOrders.tsx` pÃ³s-merge, restabelecendo a compilaÃ§Ã£o local 100% verde.
    - **RestauraÃ§Ã£o do Dashboard**: Reconciliado e restaurado o visual premium com grÃ¡ficos AreaChart da Recharts, CPU sentinela e estado de rede conectado com fila local e localStorage sob a DEC-019.
16. **Fatia Funcional P4 - Escala Preventiva & PMOC (MVP-SLICE-005-PREVENTATIVE-PMOC-AGENDA-LITE)**: [PAUSADO - CÃ³digo local pronto, aguardando validaÃ§Ã£o visual definitiva pÃ³s-reconciliaÃ§Ã£o].
17. **ReconciliaÃ§Ã£o e SincronizaÃ§Ã£o de UI ALPHA (failsafe01) (MVP-UI-RECONCILIATION-001)**: [CONCLUÃDO - PR #175 criado, reconciliaÃ§Ã£o de layout e index.css finalizada].
18. **ImportaÃ§Ã£o Visual Completa do Lovable (failsafe01) (MVP-LOVABLE-VISUAL-IMPORT-001)**: [CONCLUÃDO - ImportaÃ§Ã£o de todas as telas do lovable (AssetManagement, AssetRecord, Partners, Tenants, dashboards) e fusÃ£o com Slices locais sob a DEC-021].
19. **CorreÃ§Ã£o e ReconciliaÃ§Ã£o Visual Completa do failsafe01 (PR #176)**: [CONCLUÃDO - ReconciliaÃ§Ã£o visual completa de login, temas, estrutura de pastas e dados demo higienizados sob a DEC-022. PR #176 mesclado com sucesso na main].
20. **Hotfix SincronizaÃ§Ã£o File-by-File Lovable (hotfix/failsafe01-full-visual-file-sync)**: [CONCLUÃDO - Ajustes finais no index.css (font-sans) e Sidebar.tsx (pathname.startsWith e bordas transparentes), auditoria completa de arquivos reais failsafe01 vs hub-web, e validaÃ§Ã£o 100% de compilaÃ§Ã£o e taxonomia ALPHA].
21. **ResoluÃ§Ã£o de Incidente Visual (hotfix/failsafe01-ui-not-rendering-fix)**: [CONCLUÃDO - Resolvida a causa raiz de desalinhamento de workspaces do monorepo, sincronizando em lote e de forma real o layout e telas reconciliadas para os pacotes ativos `@failsafe/hub-web-staging` e `@failsafe/hub-web`, e congelando novos deploys e Slices atÃ© validaÃ§Ã£o final pelo gestor].
22. **ValidaÃ§Ã£o e Marcadores do Caminho Real (hotfix/failsafe01-ui-not-rendering-fix)**: [CONCLUÃDO - Injetados marcadores visuais e DOM (data-ui-source) no layout real dos pacotes `@failsafe/hub-web-staging` e `@failsafe/hub-web`, auditadas duplicatas e comprovada a renderizaÃ§Ã£o da UI Lovable com grÃ¡ficos magenta, Outfit e Login personas no caminho de execuÃ§Ã£o real do comando `npm run dev:hub` sob a DEC-024].
23. **Hotfix dev:hub Tela Branca (hotfix/devhub-blank-page-runtime-autofix)**: [CONCLUÃDO - CorreÃ§Ã£o de ausÃªncia de plugins do React no Vite em ambos os arquivos `vite.config.ts` de staging e produÃ§Ã£o, correÃ§Ã£o do bug de children em `Failsafe.tsx` e lÃ³gica de redirecionamento de Login para Dashboard. ValidaÃ§Ã£o de renderizaÃ§Ã£o e login automatizados via Playwright com sucesso sob a DEC-025].
24. **Estado CanÃ´nico ObrigatÃ³rio e Anti-Esquecimento (hotfix/devhub-canonical-state-enforcement)**: [CONCLUÃDO - Formalizada a proibiÃ§Ã£o de dependÃªncia de memÃ³ria de chat, com o registro de regras e novas diretrizes de falso positivo em AGENTS.md, PROJECT_MEMORY.md e runbooks locais sob a DEC-026].
25. **Enforce do Estado CanÃ´nico e CriaÃ§Ã£o do STATE_PACK.md (chore/dec-026-state-pack-enforcement)**: [CONCLUÃDO - CriaÃ§Ã£o da fonte unificada e persistente de estado canÃ´nico `STATE_PACK.md` e atualizaÃ§Ã£o das diretrizes contra regressÃµes cognitivas baseadas em chat memory sob a DEC-026].
26. **Enforce de GCRC Acceptance Gate (CONTROL-PLANE-GCRC-GATE-001)**: [CONCLUÃDO - Criados validate-gcrc scripts, template, workflow de integraÃ§Ã£o GitHub Actions e runbook de polÃ­tica de GCRC sob a DEC-027].
27. **Failsafe Public Control Bridge SincronizaÃ§Ã£o (public-control-bridge-001)**: [CONCLUÃDO - Criada a ponte pÃºblica sanitizada failsafe-control-bridge, os scripts de publicaÃ§Ã£o e runbooks operacionais sob a DEC-028].
28. **Create GitHub IssueOps Control Board (ISSUEOPS-CONTROL-BOARD-001)**: [CONCLUÃDO - Criados labels, template de issue, workflow de validaÃ§Ã£o e scripts de GCRC].
29. **Public Bridge Repair (PUBLIC-BRIDGE-REPAIR-001)**: [CONCLUÃDO - Mojibake corrigido e sincronizaÃ§Ã£o de inventÃ¡rio alinhada via PR #2].
30. **Pregate FS-INFRA-017 RLS Stage (FS-INFRA-017-RLS-STAGE-001-PREGATE)**: [CONCLUÃDO - PrÃ©-gate validado localmente; status mantido em BLOCKED_WAITING_GATES].
31. **Gate Provisioning FS-INFRA-017 RLS Stage (FS-INFRA-017-RLS-STAGE-001-GATE-PROVISION)**: [CONCLUÃDO - Provimento de gates avaliado; secrets e snapshots pendentes, mantendo BLOCKED_WAITING_GATES. PR #195 merged].
32. **Gates Remaining Resolution (FS-INFRA-017-GATES-REMAINING)**: [CONCLUÃDO - Gates reclassificados, Asustor/Hermes marked as non-blocking for this stage, UFW verified, snapshot/secrets remaining blocked].
33. **Failsafe Control Center fsctl Validation (CONTROL-CENTER-FSCTL-VALIDATION-001)**: [CONCLUÃDO - Validada sintaxe e dry-run do fsctl no Windows e Linux, corrigida quebra CRLF no bash script, e status.json sincronizado].
34. **Dashboard and Roadmaps Sync (CONTROL-DASHBOARD-STATUS-SYNC-001)**: [CONCLUÃDO - status.json, roadmaps, e DOCUMENT_VS_EXECUTION_MATRIX.md sincronizados].
    - fsctl_acceptance_checklist: ops/control-plane/evidence/control-center-fsctl-validation-001/FSCTL_ACCEPTANCE_CHECKLIST.md
    - dashboard_status_sync_report: ops/control-plane/evidence/control-dashboard-status-sync-001/DASHBOARD_STATUS_SYNC_REPORT.md
    - document_vs_execution_sync_report: ops/control-plane/evidence/control-dashboard-status-sync-001/DOCUMENT_VS_EXECUTION_SYNC_REPORT.md
    - roadmap_sync_report: ops/control-plane/evidence/control-dashboard-status-sync-001/ROADMAP_SYNC_REPORT.md
    - status_json_validation: ops/control-plane/evidence/control-dashboard-status-sync-001/STATUS_JSON_VALIDATION.md

35. **Execute Unblocked ALPHA Governance Option B Batch (ALPHA-GOVERNANCE-OPTION-B-BATCH-001)**: [CONCLUÃDO - Validada Prompt Budget, FMEA/RACI formalizados, LGPD/Suporte alinhados e fila de packets limpa. PR #200].
36. **Dashboard Status Schema and fsctl Hotfix (DASHBOARD-FSCTL-HOTFIX-001)**: [CONCLUÃDO - CorreÃ§Ã£o de quebra de Array.map no index.html, preenchimento de status.json e loop de menu interativo no fsctl].
37. **Dashboard & fsctl Follow-up Fix (DASHBOARD-FSCTL-HOTFIX-001-FOLLOWUP)**: [CONCLUÃDO - CorreÃ§Ã£o dos loops interativos padrÃ£o locais e fallback do Start-Process no Windows].
38. **Status Page PÃºblico HostGator (OPS-PUBLIC-OBSERVABILITY-001)**: [CONCLUÃDO - Criado o status page pÃºblico em status.failsafe.com.br, script de sincronizaÃ§Ã£o cron PHP e SEO configurado].
39. **PrÃ³xima Fila PrioritÃ¡ria (Bloqueada)**: Iniciar o packet **FS-INFRA-017 / RLS-STAGE-001** (implantaÃ§Ã£o fÃ­sica de banco PostgreSQL com `pgvector` e RLS na VPS Contabo) assim que as credenciais GitHub Secrets e snap/backup Contabo forem liberados.


## ðŸš§ Gates Humanos
*   AprovaÃ§Ã£o do desenho funcional do Piloto OEM (Boletins, OS multilateral e isolamento RLS).
*   ConfiguraÃ§Ã£o e provisionamento de secrets e conexÃµes reais na VPS/HostGator.

## ðŸš« Bloqueios Vigentes (Staging FÃ­sico: BLOCKED_WAITING_GATES)
O provisionamento fÃ­sico do ambiente de Staging na VPS Contabo estÃ¡ bloqueado atÃ© a homologaÃ§Ã£o dos seguintes gates obrigatÃ³rios:
1.  **Snapshot Contabo**: Snapshot de seguranÃ§a da VPS pendente de comprovaÃ§Ã£o (BLOCKED_BY_ACCESS).
2.  **Firewall UFW**: **RESOLVED** (PolÃ­tica de blindagem de rede e regras UFW verificadas e ativas via SSH).
3.  **Segredos no GitHub Secrets**: Cadastro e aprovaÃ§Ã£o das chaves (BLOCKED_BY_CREDENTIAL):
    - `FAILSAFE_SSH_VPS_KEY`
    - `STAGING_DB_PASSWORD`
    - `STAGING_DATABASE_URL`
4.  **AprovaÃ§Ã£o FÃ­sica**: Consentimento formalizado do gestor em NEXT_ACTIONS_QUEUE.md / DECISIONS.md.


