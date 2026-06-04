# NEXT_ACTION â€” PrÃ³ximas AÃ§Ãµes do Failsafe ECO

# Next Actions Queue — ControlKit 0.12

## 🎯 P0 - Fila de Execução Remota (Autodispatch)

1.  **Publicar ControlKit na Main (PR #140)**: [CONCLUÍDO - PR #140 mesclado via commit `a602600` com 10/10 esteiras verdes].
2.  **Saneamento Documental (OPS-DOCS-001 & PR #142)**: [CONCLUÍDO - Integração canônica das Project Instructions DEC-009 concluída via PR #142, commit `7334d76`].
3.  **Hardening de Taxonomy Guard (TAXONOMY-GUARD-001)**: [CONCLUÍDO - PR #143 mesclado, pre-commit local opt-in validado e gates de CI remotos estritamente obrigatórios ativados].
4.  **Paralelismo de Frentes Operacionais (ASSET-SERVICES & INFRA)**: [CONCLUÍDO - PRs #144, #145, #146, #147 e #148 mesclados e integrados com sucesso na main].
5.  **Homologação e Fechamento em Lote (PR #149)**: [CONCLUÍDO - PR #149 mesclado, consolidando todas as evidências e runbooks de fundação].
6.  **Ativação do Barramento de Despacho (OPS-AUTODISPATCH-001)**: [CONCLUÍDO - PR #150 mesclado, barramento passivo de outbox ativo].
7.  **Mapeamento de Backlog do MVP (ASSET-SERVICES-MVP-BACKLOG-001)**: [CONCLUÍDO - PR #152 mesclado, backlog com histórias e arquitetura de dados consolidado].
8.  **Codificação da Fatia Funcional P0 (MVP-IMPLEMENTATION-SLICE-001)**: [CONCLUÍDO - PR #154 mesclado, código navegável 100% integrado].
9.  **Plano de Staging VPS Contabo (VPS-STAGING-PLAN-001)**: [CONCLUÍDO - PR #155 mesclado, topologia e gates de segurança consolidados].
10. **Alinhamento do FailsafeJUD HostGator (JUD-ALIGNMENT-FOLLOWUP-001)**: [CONCLUÍDO - PR #156 mesclado, limitações e reutilização mapeadas].
11. **Próxima Fila Prioritária (Recomendado)**: Iniciar o packet **FS-INFRA-017 / RLS-STAGE-001** (implantação física da infraestrutura de banco PostgreSQL com extensão `pgvector` no staging da VPS Contabo sob os gates aprovados da DEC-012, e configuração de políticas de RLS e multi-tenant).
12. **Consolidação do Mandato de Execução Contínua (DEC-015)**: [CONCLUÍDO - Branch chore/mandato-execucao-continua mesclada com sucesso nas memórias canônicas].
13. **Fatia Funcional P1 - Gestão de Peças (MVP-SLICE-002-PARTS-APPROVALS)**: [CONCLUÍDO - Estoque mock, reserva local, Pedido de Compra Interno e painel administrativo de orçamentos integrados na branch feature/mvp-parts-approvals-slice-002].
14. **Fatia Funcional P2 - Orçamentos, Alçadas e Faturamento (MVP-SLICE-003-BUDGET-BILLING-LITE)**: [CONCLUÍDO - Orçamento consolidado mão de obra (R$ 250) + peças, alçadas dinâmicas (Técnico, Coordenador, Gerente, Diretor), faturamento mock com chave failsafe_invoices, aba financeira Admin e Dashboard estendido 5 colunas integrados na branch feature/mvp-budget-billing-lite-slice-003].
15. **Fatia Funcional P3 - Rastreabilidade Offline & Evidências Multilaterais (MVP-SLICE-004-FIELD-EVIDENCE-OFFLINE-LITE)**: [CONCLUÍDO - Fila offline mock na chave failsafe_offline_queue, geolocalização nativa por sensor real do browser, assinatura polida, Seção 6 de múltiplos anexos (PDF, fotos OEM), alertas reativos no Dashboard global e cabeçalho celular industrial na branch feature/mvp-field-evidence-offline-lite-slice-004].
    - **Hotfix Build JSX**: Corrigida falha de fechamento de div na Seção 5 de `WorkOrders.tsx` pós-merge, restabelecendo a compilação local 100% verde.
    - **Restauração do Dashboard**: Reconciliado e restaurado o visual premium com gráficos AreaChart da Recharts, CPU sentinela e estado de rede conectado com fila local e localStorage sob a DEC-019.
16. **Fatia Funcional P4 - Escala Preventiva & PMOC (MVP-SLICE-005-PREVENTATIVE-PMOC-AGENDA-LITE)**: [PAUSADO - Código local pronto, aguardando validação visual definitiva pós-reconciliação].
17. **Reconciliação e Sincronização de UI ALPHA (failsafe01) (MVP-UI-RECONCILIATION-001)**: [CONCLUÍDO - PR #175 criado, reconciliação de layout e index.css finalizada].
18. **Importação Visual Completa do Lovable (failsafe01) (MVP-LOVABLE-VISUAL-IMPORT-001)**: [CONCLUÍDO - Importação de todas as telas do lovable (AssetManagement, AssetRecord, Partners, Tenants, dashboards) e fusão com Slices locais sob a DEC-021].
19. **Correção e Reconciliação Visual Completa do failsafe01 (PR #176)**: [CONCLUÍDO - Reconciliação visual completa de login, temas, estrutura de pastas e dados demo higienizados sob a DEC-022. PR #176 mesclado com sucesso na main].
20. **Hotfix Sincronização File-by-File Lovable (hotfix/failsafe01-full-visual-file-sync)**: [CONCLUÍDO - Ajustes finais no index.css (font-sans) e Sidebar.tsx (pathname.startsWith e bordas transparentes), auditoria completa de arquivos reais failsafe01 vs hub-web, e validação 100% de compilação e taxonomia ALPHA].
21. **Resolução de Incidente Visual (hotfix/failsafe01-ui-not-rendering-fix)**: [CONCLUÍDO - Resolvida a causa raiz de desalinhamento de workspaces do monorepo, sincronizando em lote e de forma real o layout e telas reconciliadas para os pacotes ativos `@failsafe/hub-web-staging` e `@failsafe/hub-web`, e congelando novos deploys e Slices até validação final pelo gestor].
22. **Validação e Marcadores do Caminho Real (hotfix/failsafe01-ui-not-rendering-fix)**: [CONCLUÍDO - Injetados marcadores visuais e DOM (data-ui-source) no layout real dos pacotes `@failsafe/hub-web-staging` e `@failsafe/hub-web`, auditadas duplicatas e comprovada a renderização da UI Lovable com gráficos magenta, Outfit e Login personas no caminho de execução real do comando `npm run dev:hub` sob a DEC-024].
23. **Hotfix dev:hub Tela Branca (hotfix/devhub-blank-page-runtime-autofix)**: [CONCLUÍDO - Correção de ausência de plugins do React no Vite em ambos os arquivos `vite.config.ts` de staging e produção, correção do bug de children em `Failsafe.tsx` e lógica de redirecionamento de Login para Dashboard. Validação de renderização e login automatizados via Playwright com sucesso sob a DEC-025].
24. **Estado Canônico Obrigatório e Anti-Esquecimento (hotfix/devhub-canonical-state-enforcement)**: [CONCLUÍDO - Formalizada a proibição de dependência de memória de chat, com o registro de regras e novas diretrizes de falso positivo em AGENTS.md, PROJECT_MEMORY.md e runbooks locais sob a DEC-026].
25. **Enforce do Estado Canônico e Criação do STATE_PACK.md (chore/dec-026-state-pack-enforcement)**: [CONCLUÍDO - Criação da fonte unificada e persistente de estado canônico `STATE_PACK.md` e atualização das diretrizes contra regressões cognitivas baseadas em chat memory sob a DEC-026].
26. **Enforce de GCRC Acceptance Gate (CONTROL-PLANE-GCRC-GATE-001)**: [CONCLUÍDO - Criados validate-gcrc scripts, template, workflow de integração GitHub Actions e runbook de política de GCRC sob a DEC-027].
27. **Failsafe Public Control Bridge Sincronização (public-control-bridge-001)**: [CONCLUÍDO - Criada a ponte pública sanitizada failsafe-control-bridge, os scripts de publicação e runbooks operacionais sob a DEC-028].
28. **Create GitHub IssueOps Control Board (ISSUEOPS-CONTROL-BOARD-001)**: [CONCLUÍDO - Criados labels, template de issue, workflow de validação e scripts de GCRC].
29. **Public Bridge Repair (PUBLIC-BRIDGE-REPAIR-001)**: [CONCLUÍDO - Mojibake corrigido e sincronização de inventário alinhada via PR #2].
30. **Pregate FS-INFRA-017 RLS Stage (FS-INFRA-017-RLS-STAGE-001-PREGATE)**: [CONCLUÍDO - Pré-gate validado localmente; status mantido em BLOCKED_WAITING_GATES].
31. **Gate Provisioning FS-INFRA-017 RLS Stage (FS-INFRA-017-RLS-STAGE-001-GATE-PROVISION)**: [CONCLUÍDO - Provimento de gates avaliado; secrets e snapshots pendentes, mantendo BLOCKED_WAITING_GATES. PR #195 merged].
32. **Gates Remaining Resolution (FS-INFRA-017-GATES-REMAINING)**: [CONCLUÍDO - Gates reclassificados, Asustor/Hermes marked as non-blocking for this stage, UFW verified, snapshot/secrets remaining blocked].
33. **Failsafe Control Center fsctl Validation (CONTROL-CENTER-FSCTL-VALIDATION-001)**: [CONCLUÍDO - Validada sintaxe e dry-run do fsctl no Windows e Linux, corrigida quebra CRLF no bash script, e status.json sincronizado].
34. **Dashboard and Roadmaps Sync (CONTROL-DASHBOARD-STATUS-SYNC-001)**: [CONCLUÍDO - status.json, roadmaps, e DOCUMENT_VS_EXECUTION_MATRIX.md sincronizados].
    - fsctl_acceptance_checklist: ops/control-plane/evidence/control-center-fsctl-validation-001/FSCTL_ACCEPTANCE_CHECKLIST.md
    - dashboard_status_sync_report: ops/control-plane/evidence/control-dashboard-status-sync-001/DASHBOARD_STATUS_SYNC_REPORT.md
    - document_vs_execution_sync_report: ops/control-plane/evidence/control-dashboard-status-sync-001/DOCUMENT_VS_EXECUTION_SYNC_REPORT.md
    - roadmap_sync_report: ops/control-plane/evidence/control-dashboard-status-sync-001/ROADMAP_SYNC_REPORT.md
    - status_json_validation: ops/control-plane/evidence/control-dashboard-status-sync-001/STATUS_JSON_VALIDATION.md

35. **Execute Unblocked ALPHA Governance Option B Batch (ALPHA-GOVERNANCE-OPTION-B-BATCH-001)**: [CONCLUÍDO - Validada Prompt Budget, FMEA/RACI formalizados, LGPD/Suporte alinhados e fila de packets limpa. PR #200].
36. **Dashboard Status Schema and fsctl Hotfix (DASHBOARD-FSCTL-HOTFIX-001)**: [CONCLUÍDO - Correção de quebra de Array.map no index.html, preenchimento de status.json e loop de menu interativo no fsctl].
37. **Dashboard & fsctl Follow-up Fix (DASHBOARD-FSCTL-HOTFIX-001-FOLLOWUP)**: [CONCLUÍDO - Correção dos loops interativos padrão locais e fallback do Start-Process no Windows].
38. **Status Page Público HostGator (OPS-PUBLIC-OBSERVABILITY-001)**: [CONCLUÍDO - Criado o status page público em status.failsafe.com.br, script de sincronização cron PHP e SEO configurado].
39. **Próxima Fila Prioritária (Bloqueada)**: Iniciar o packet **FS-INFRA-017 / RLS-STAGE-001** (implantação física de banco PostgreSQL com `pgvector` e RLS na VPS Contabo) assim que as credenciais GitHub Secrets e snap/backup Contabo forem liberados.


## 🚧 Gates Humanos
*   Aprovação do desenho funcional do Piloto OEM (Boletins, OS multilateral e isolamento RLS).
*   Configuração e provisionamento de secrets e conexões reais na VPS/HostGator.

## 🚫 Bloqueios Vigentes (Staging Físico: BLOCKED_WAITING_GATES)
O provisionamento físico do ambiente de Staging na VPS Contabo está bloqueado até a homologação dos seguintes gates obrigatórios:
1.  **Snapshot Contabo**: Snapshot de segurança da VPS pendente de comprovação (BLOCKED_BY_ACCESS).
2.  **Firewall UFW**: **RESOLVED** (Política de blindagem de rede e regras UFW verificadas e ativas via SSH).
3.  **Segredos no GitHub Secrets**: Cadastro e aprovação das chaves (BLOCKED_BY_CREDENTIAL):
    - `FAILSAFE_SSH_VPS_KEY`
    - `STAGING_DB_PASSWORD`
    - `STAGING_DATABASE_URL`
4.  **Aprovação Física**: Consentimento formalizado do gestor em NEXT_ACTIONS_QUEUE.md / DECISIONS.md.


