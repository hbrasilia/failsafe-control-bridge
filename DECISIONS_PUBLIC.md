# DECISIONS

## DEC-001 â€” Repo soberano

`hbrasilia/failsafe` Ã© a fonte soberana. Control Plane fica em `ops/control-plane/`.

## DEC-002 â€” Taxonomia

Vertical prioritÃ¡rio: Failsafe GestÃ£o de Ativos e ServiÃ§os. OEM, Maintenance, Client e Parts sÃ£o pacotes/capabilities.

## DEC-003 â€” FailsafeJUD

Manter validaÃ§Ã£o em HostGator/MariaDB atÃ© readiness de migraÃ§Ã£o.

## DEC-004 â€” ControlKit

ControlKit 0.10 Ã© pacote inicial gerado, nÃ£o execuÃ§Ã£o validada.

## DEC-005 â€” ResoluÃ§Ã£o de Taxonomia (PR #140)

O termo 'Vertical OEM' foi descontinuado e substituÃ­do de todos os arquivos canÃ´nicos e de execuÃ§Ã£o para evitar vazamentos comerciais ou termos inconsistentes. O termo oficial a ser utilizado Ã© 'Pacote OEM / Aftermarket dentro do vertical Failsafe GestÃ£o de Ativos e ServiÃ§os'.

## DEC-006 â€” Refinamento de Taxonomy Guard & RemoÃ§Ã£o de Nomes Reais (PR #140 R2)

Para garantir seguranÃ§a operacional absoluta no monorepo hbrasilia/failsafe, decidiu-se:
1. Renomear o packet FS-OPS-006 removendo o nome real de cliente ('UNOX') do arquivo e de seu conteÃºdo.
2. Tratar de forma diferenciada as violaÃ§Ãµes de taxonomia: bloqueio fatal nas Ã¡reas ativas (docs, packets, scripts, branches, configs, dashboards) e apenas avisos (warnings) nas Ã¡reas de auditoria histÃ³rica (memory e evidence). Isso permite manter registros de incidentes de taxonomia para fins de auditoria sem comprometer as validaÃ§Ãµes da pipeline de CI/CD.

## DEC-007 â€” Merge do PR #140 & AtivaÃ§Ã£o de Fila (OPS-DOCS-001)

Com todas as 10 esteiras de CI/CD verdes e autorizaÃ§Ã£o do gestor obtida, o PR #140 foi mesclado com sucesso na branch `main` (commit `a602600`).
Decidiu-se:
1. AvanÃ§ar imediatamente com a fila remota de autodispatch.
2. Iniciar o packet `OPS-DOCS-001` em branch isolada `ops/ops-docs-001` para indexar e padronizar toda a documentaÃ§Ã£o canÃ´nica na fundaÃ§Ã£o 0.12.

## DEC-008 â€” ConsolidaÃ§Ã£o Documental do Control Plane (OPS-DOCS-001)

No Ã¢mbito do encerramento do packet `OPS-DOCS-001`, formalizou-se:
1. AdoÃ§Ã£o do novo indexador `DOC_REGISTRY.yml` versionado em sua especificaÃ§Ã£o `0.12`, categorizando de forma clara e rigorosa a memÃ³ria do projeto, runbooks de infraestrutura e suporte, planos de disaster recovery, registros de evidÃªncias, packets e indicativos de documentos legados supersedidos.
2. ManutenÃ§Ã£o integral do histÃ³rico de auditoria tÃ©cnica. Documentos obsoletos como `fs-ops-006` com nome de cliente sÃ£o arquivados ou renomeados, com suas justificativas mapeadas de forma transparente no repositÃ³rio.

## DEC-009 â€” Project Instructions Failsafe ECO compacta e soberana

Formaliza-se a integraÃ§Ã£o e conformidade estrita de todo o monorepo `hbrasilia/failsafe` com as *Project Instructions Failsafe ECO*.
Decidiu-se:
1. Sincronizar todos os arquivos de memÃ³ria (`PROJECT_MEMORY.md`, `CONTEXT_PACK.md`, `DOC_REGISTRY.yml`, `AGENTS.md`) e polÃ­ticas operacionais com as diretrizes consolidadas de anti-manual, taxonomia rÃ­gida, e blindagem de caminhos canÃ´nicos.
2. Mapear de forma clara as limitaÃ§Ãµes decorrentes da execuÃ§Ã£o sandboxed de IAs (exigindo evidÃªncias objetivas versionadas em `/evidence/` para homologaÃ§Ã£o).

## DEC-010 â€” Taxonomy Guard local pre-commit opt-in e CI obrigatÃ³ria (TAXONOMY-GUARD-001)

No Ã¢mbito da finalizaÃ§Ã£o do packet `TAXONOMY-GUARD-001`, formalizou-se:
1. Provisionamento de scripts de instalaÃ§Ã£o/desinstalaÃ§Ã£o limpos e opcionais (`install-pre-commit.ps1` para Windows e `install-pre-commit.sh` para Linux/macOS) do hook pre-commit do Git. O hook realiza dry-run da taxonomia localmente, mas permanece **opt-in** (opcional, nÃ£o-invasivo) para o gestor.
2. AtivaÃ§Ã£o dos gates de CI remotos do GitHub Actions (`validate`, `validate-control-plane` e `control-plane`) como bloqueios estritamente obrigatÃ³rios para merge em `main`, blindando a taxonomia de forma perpÃ©tua.

## DEC-011 â€” POC Local e Mock de Dados do MÃ³dulo de Ordens de ServiÃ§o (MVP-IMPLEMENTATION-SLICE-001)

No Ã¢mbito da implantaÃ§Ã£o da fatia funcional P0 do Piloto OEM, decidiu-se:
1. Implementar o ciclo de vida completo de ativos, chamados e Ordens de ServiÃ§o em modo de validaÃ§Ã£o interativa (POC local) para contornar a ausÃªncia de banco de dados fÃ­sico ativo na sessÃ£o.
2. Estabelecer persistÃªncia simulada robusta em `localStorage` para viabilizar testes funcionais cross-tab do fluxo de valor P0.
3. Desenvolver o runbook `POC_LIMITATIONS.md` detalhando as restriÃ§Ãµes operacionais e documentando um mapa de transiÃ§Ã£o de endpoints futuros (REST/GraphQL) para substituiÃ§Ã£o transparente dos mocks por chamadas Ã  API real.

## DEC-012 â€” Planejamento de Staging VPS Contabo (VPS-STAGING-PLAN-001)

No Ã¢mbito da fundaÃ§Ã£o de staging, decidiu-se:
1. Modelar a topologia Docker Compose e blindagem de rede via UFW de forma estritamente analÃ­tica e passiva, sem realizar nenhuma modificaÃ§Ã£o ou instalaÃ§Ã£o fÃ­sica na VPS Contabo nesta fase.
2. Mapear todas as chaves e segredos ambientais requeridos e definir gates de bootstrap explÃ­citos e rigorosos condicionando qualquer aÃ§Ã£o futura de deploy Ã  aprovaÃ§Ã£o humana.

## DEC-013 â€” Alinhamento FailsafeJUD HostGator (JUD-ALIGNMENT-FOLLOWUP-001)

No Ã¢mbito do FailsafeJUD, decidiu-se:
1. Catalogar as restriÃ§Ãµes de infraestrutura (latÃªncia e ausÃªncia de pgvector) e mapear a reutilizaÃ§Ã£o de funcionalidades de IA (Cortex) e barramento (ControlKit) entre o core e o mÃ³dulo jurÃ­dico.
2. Estabelecer regras de seguranÃ§a rigorosas proibindo escrita ou trÃ¡fego de dados confidenciais sem criptografia local prÃ©via no ambiente compartilhado HostGator.

## DEC-014 â€” HomologaÃ§Ã£o e Merge dos PRs #154, #155 e #156 (Macro Closeout P0)

Com a autorizaÃ§Ã£o do gestor e todas as 10/10 esteiras de CI remota verdes, decidiu-se:
1. Mergear canonicamente na branch principal o PR #154 (fatia funcional P0 do portal em localStorage), o PR #155 (plano de staging da VPS Contabo) e o PR #156 (plano de alinhamento passivo do FailsafeJUD).
2. Publicar as evidÃªncias fÃ­sicas pÃ³s-merge de cada pull request e consolidar a memÃ³ria operacional para dar inÃ­cio Ã  prÃ³xima etapa fÃ­sica de staging de banco PostgreSQL real e polÃ­ticas de isolamento RLS.

## DEC-015 â€” Mandato de ExecuÃ§Ã£o ContÃ­nua para Executor Autorizado

Para otimizar os fluxos de automaÃ§Ã£o e reduzir latÃªncias operacionais, decidiu-se:
1. Conceder mandato contÃ­nuo e recorrente para o executor (Antigravity) avanÃ§ar sequencialmente nas etapas e tarefas internas dos packets de execuÃ§Ã£o, sem necessidade de interrupÃ§Ã£o ou consentimento micro-operacional passo a passo.
2. Limitar estritamente a parada de execuÃ§Ã£o e o bloqueio Ã s fronteiras sensÃ­veis prÃ©-definidas (deploys em produÃ§Ã£o, modificaÃ§Ãµes fÃ­sicas em VPS/HostGator, publicaÃ§Ã£o externa Vercel/Lovable, exposiÃ§Ã£o de segredos/secrets, modificaÃ§Ã£o de escopo, migraÃ§Ãµes de FailsafeJUD ou incidentes graves de governanÃ§a/seguranÃ§a).
3. Determinar que, diante de qualquer blocker real nessas fronteiras, o executor formule um parecer GCRC objetivo e categorizado (ex: `ENV_BLOCKED`, `BLOCKED`, `GOVERNANCE_INCIDENT`) no lugar de perguntas abertas ou genÃ©ricas.

## DEC-016 â€” GestÃ£o de PeÃ§as e OrÃ§amentos do Piloto OEM (MVP-SLICE-002-PARTS-APPROVALS)

No Ã¢mbito da implantaÃ§Ã£o da segunda fatia funcional (P1) do Piloto OEM, decidiu-se:
1. Codificar e expor a gestÃ£o de inventÃ¡rio de peÃ§as e orÃ§amentos OEM diretamente nas ordens de serviÃ§o, utilizando uma persistÃªncia de dados local simulada robusta (`localStorage`) com chaves para inventÃ¡rio e requisiÃ§Ãµes.
2. Implementar a polÃ­tica de reserva de peÃ§as (reduzindo estoque local) quando disponÃ­vel (estoque > 0) e a emissÃ£o automÃ¡tica de Pedidos de Compra Internos quando esgotado (estoque = 0).
3. Projetar e integrar uma sub-aba de triagem de peÃ§as no painel do administrador para aprovaÃ§Ã£o e cancelamento (rejeiÃ§Ã£o) rÃ¡pida de orÃ§amentos, de modo que rejeiÃ§Ãµes de reservas de estoque devolvam imediatamente a peÃ§a ao inventÃ¡rio local.
4. Mapear de forma transparente na documentaÃ§Ã£o (`POC_LIMITATIONS.md`) a matriz de endpoints REST e payloads esperados para substituiÃ§Ã£o por conexÃµes com APIs e barramentos reais em etapas subsequentes.

## DEC-017 â€” OrÃ§amentos Consolidados, AlÃ§adas de AprovaÃ§Ã£o e Faturamento do Piloto OEM (MVP-SLICE-003-BUDGET-BILLING-LITE)

No Ã¢mbito da implantaÃ§Ã£o da terceira fatia funcional (P2) do Piloto OEM, decidiu-se:
1. Implementar o orÃ§amento mÃ­nimo consolidado das Ordens de ServiÃ§o, somando dinamicamente a mÃ£o de obra fixa padrÃ£o de R$ 250,00 e o total das peÃ§as cujos orÃ§amentos foram previamente aprovados.
2. Definir perfis de alÃ§ada de aprovaÃ§Ã£o limitativos (TÃ©cnico: R$ 0, Coordenador: R$ 500, Gerente: R$ 5.000, Diretor: Ilimitado) com um seletor de simulaÃ§Ã£o interativo na interface administrativa do hub-web.
3. Bloquear aprovaÃ§Ãµes de orÃ§amentos acumulados acima do limite do perfil de alÃ§ada ativo, exigindo alteraÃ§Ã£o de alÃ§ada correspondente para continuidade operacional.
4. Desenvolver o faturamento automatizado de OS concluÃ­das no aplicativo do tÃ©cnico, gerando faturas com status `PENDING_PAYMENT` na chave `failsafe_invoices` do `localStorage`.
5. Projetar a sub-aba "Financeiro & Faturamento" no painel de administraÃ§Ã£o para visualizaÃ§Ã£o, liquidaÃ§Ã£o mock de recebimentos (muda status para `PAID`) e simulaÃ§Ã£o de exportaÃ§Ã£o de PDF.
6. Integrar as mÃ©tricas de faturamento (Faturamento Realizado / A Receber) diretamente como a quinta estatÃ­stica do painel do Dashboard de forma dinÃ¢mica.

## DEC-018 â€” Fila Offline e EvidÃªncias Multilaterais no Aplicativo TÃ©cnico (MVP-SLICE-004-FIELD-EVIDENCE-OFFLINE-LITE)

No Ã¢mbito da implantaÃ§Ã£o da quarta fatia funcional (P3) do Piloto OEM, decidiu-se:
1. Implementar o painel celular industrial de conectividade no topo da tela do tÃ©cnico, permitindo simular com fidelidade estados de conexÃ£o (Online vs Offline) com feedback LED reativo.
2. Desenvolver a Fila FÃ­sica Local em `localStorage` sob a chave `failsafe_offline_queue`, de modo que conclusÃµes de OS em modo sem sinal fiquem em status `PENDING_SYNC` localmente, sem acionar faturamentos globais imediatos.
3. Criar a funcionalidade de sincronizaÃ§Ã£o manual em lote para liquidaÃ§Ã£o reativa das OSs em fila offline, convertendo-as em faturamentos retroativos consistentes quando o status mudar para Online.
4. Integrar o Geotagging a nÃ­vel de sensor real de browser, consumindo `navigator.geolocation` nativo quando concedida permissÃ£o pelo usuÃ¡rio e registrando a origem auditÃ¡vel das coordenadas (`REAL` vs `SIMULATED`).
5. Projetar a SeÃ§Ã£o 6 de "Anexos de EvidÃªncias de Campo (Multilateral)" no laudo do tÃ©cnico, possibilitando associar mÃºltiplos arquivos de conformidade (Foto OEM, RelatÃ³rios PDF, Laudos Adicionais) com legendas individuais e previews dinÃ¢micos.
6. Desenvolver alertas de sincronizaÃ§Ã£o offline no Dashboard do administrador global, notificando a retaguarda em tempo real sobre itens retidos fisicamente em campo na sandbox local.

## DEC-019 â€” ReconciliaÃ§Ã£o e RestauraÃ§Ã£o de Dashboard Premium Reativo
# DECISIONS

## DEC-001 â€” Repo soberano

`hbrasilia/failsafe` Ã© a fonte soberana. Control Plane fica em `ops/control-plane/`.

## DEC-002 â€” Taxonomia

Vertical prioritÃ¡rio: Failsafe GestÃ£o de Ativos e ServiÃ§os. OEM, Maintenance, Client e Parts sÃ£o pacotes/capabilities.

## DEC-003 â€” FailsafeJUD

Manter validaÃ§Ã£o em HostGator/MariaDB atÃ© readiness de migraÃ§Ã£o.

## DEC-004 â€” ControlKit

ControlKit 0.10 Ã© pacote inicial gerado, nÃ£o execuÃ§Ã£o validada.

## DEC-005 â€” ResoluÃ§Ã£o de Taxonomia (PR #140)

O termo 'Vertical OEM' foi descontinuado e substituÃ­do de todos os arquivos canÃ´nicos e de execuÃ§Ã£o para evitar vazamentos comerciais ou termos inconsistentes. O termo oficial a ser utilizado Ã© 'Pacote OEM / Aftermarket dentro do vertical Failsafe GestÃ£o de Ativos e ServiÃ§os'.

## DEC-006 â€” Refinamento de Taxonomy Guard & RemoÃ§Ã£o de Nomes Reais (PR #140 R2)

Para garantir seguranÃ§a operacional absoluta no monorepo hbrasilia/failsafe, decidiu-se:
1. Renomear o packet FS-OPS-006 removendo o nome real de cliente ('UNOX') do arquivo e de seu conteÃºdo.
2. Tratar de forma diferenciada as violaÃ§Ãµes de taxonomia: bloqueio fatal nas Ã¡reas ativas (docs, packets, scripts, branches, configs, dashboards) e apenas avisos (warnings) nas Ã¡reas de auditoria histÃ³rica (memory e evidence). Isso permite manter registros de incidentes de taxonomia para fins de auditoria sem comprometer as validaÃ§Ãµes da pipeline de CI/CD.

## DEC-007 â€” Merge do PR #140 & AtivaÃ§Ã£o de Fila (OPS-DOCS-001)

Com todas as 10 esteiras de CI/CD verdes e autorizaÃ§Ã£o do gestor obtida, o PR #140 foi mesclado com sucesso na branch `main` (commit `a602600`).
Decidiu-se:
1. AvanÃ§ar imediatamente com a fila remota de autodispatch.
2. Iniciar o packet `OPS-DOCS-001` em branch isolada `ops/ops-docs-001` para indexar e padronizar toda a documentaÃ§Ã£o canÃ´nica na fundaÃ§Ã£o 0.12.

## DEC-008 â€” ConsolidaÃ§Ã£o Documental do Control Plane (OPS-DOCS-001)

No Ã¢mbito do encerramento do packet `OPS-DOCS-001`, formalizou-se:
1. AdoÃ§Ã£o do novo indexador `DOC_REGISTRY.yml` versionado em sua especificaÃ§Ã£o `0.12`, categorizando de forma clara e rigorosa a memÃ³ria do projeto, runbooks de infraestrutura e suporte, planos de disaster recovery, registros de evidÃªncias, packets e indicativos de documentos legados supersedidos.
2. ManutenÃ§Ã£o integral do histÃ³rico de auditoria tÃ©cnica. Documentos obsoletos como `fs-ops-006` com nome de cliente sÃ£o arquivados ou renomeados, com suas justificativas mapeadas de forma transparente no repositÃ³rio.

## DEC-009 â€” Project Instructions Failsafe ECO compacta e soberana

Formaliza-se a integraÃ§Ã£o e conformidade estrita de todo o monorepo `hbrasilia/failsafe` com as *Project Instructions Failsafe ECO*.
Decidiu-se:
1. Sincronizar todos os arquivos de memÃ³ria (`PROJECT_MEMORY.md`, `CONTEXT_PACK.md`, `DOC_REGISTRY.yml`, `AGENTS.md`) e polÃ­ticas operacionais com as diretrizes consolidadas de anti-manual, taxonomia rÃ­gida, e blindagem de caminhos canÃ´nicos.
2. Mapear de forma clara as limitaÃ§Ãµes decorrentes da execuÃ§Ã£o sandboxed de IAs (exigindo evidÃªncias objetivas versionadas em `/evidence/` para homologaÃ§Ã£o).

## DEC-010 â€” Taxonomy Guard local pre-commit opt-in e CI obrigatÃ³ria (TAXONOMY-GUARD-001)

No Ã¢mbito da finalizaÃ§Ã£o do packet `TAXONOMY-GUARD-001`, formalizou-se:
1. Provisionamento de scripts de instalaÃ§Ã£o/desinstalaÃ§Ã£o limpos e opcionais (`install-pre-commit.ps1` para Windows e `install-pre-commit.sh` para Linux/macOS) do hook pre-commit do Git. O hook realiza dry-run da taxonomia localmente, mas permanece **opt-in** (opcional, nÃ£o-invasivo) para o gestor.
2. AtivaÃ§Ã£o dos gates de CI remotos do GitHub Actions (`validate`, `validate-control-plane` e `control-plane`) como bloqueios estritamente obrigatÃ³rios para merge em `main`, blindando a taxonomia de forma perpÃ©tua.

## DEC-011 â€” POC Local e Mock de Dados do MÃ³dulo de Ordens de ServiÃ§o (MVP-IMPLEMENTATION-SLICE-001)

No Ã¢mbito da implantaÃ§Ã£o da fatia funcional P0 do Piloto OEM, decidiu-se:
1. Implementar o ciclo de vida completo de ativos, chamados e Ordens de ServiÃ§o em modo de validaÃ§Ã£o interativa (POC local) para contornar a ausÃªncia de banco de dados fÃ­sico ativo na sessÃ£o.
2. Estabelecer persistÃªncia simulada robusta em `localStorage` para viabilizar testes funcionais cross-tab do fluxo de valor P0.
3. Desenvolver o runbook `POC_LIMITATIONS.md` detalhando as restriÃ§Ãµes operacionais e documentando um mapa de transiÃ§Ã£o de endpoints futuros (REST/GraphQL) para substituiÃ§Ã£o transparente dos mocks por chamadas Ã  API real.

## DEC-012 â€” Planejamento de Staging VPS Contabo (VPS-STAGING-PLAN-001)

No Ã¢mbito da fundaÃ§Ã£o de staging, decidiu-se:
1. Modelar a topologia Docker Compose e blindagem de rede via UFW de forma estritamente analÃ­tica e passiva, sem realizar nenhuma modificaÃ§Ã£o ou instalaÃ§Ã£o fÃ­sica na VPS Contabo nesta fase.
2. Mapear todas as chaves e segredos ambientais requeridos e definir gates de bootstrap explÃ­citos e rigorosos condicionando qualquer aÃ§Ã£o futura de deploy Ã  aprovaÃ§Ã£o humana.

## DEC-013 â€” Alinhamento FailsafeJUD HostGator (JUD-ALIGNMENT-FOLLOWUP-001)

No Ã¢mbito do FailsafeJUD, decidiu-se:
1. Catalogar as restriÃ§Ãµes de infraestrutura (latÃªncia e ausÃªncia de pgvector) e mapear a reutilizaÃ§Ã£o de funcionalidades de IA (Cortex) e barramento (ControlKit) entre o core e o mÃ³dulo jurÃ­dico.
2. Estabelecer regras de seguranÃ§a rigorosas proibindo escrita ou trÃ¡fego de dados confidenciais sem criptografia local prÃ©via no ambiente compartilhado HostGator.

## DEC-014 â€” HomologaÃ§Ã£o e Merge dos PRs #154, #155 e #156 (Macro Closeout P0)

Com a autorizaÃ§Ã£o do gestor e todas as 10/10 esteiras de CI remota verdes, decidiu-se:
1. Mergear canonicamente na branch principal o PR #154 (fatia funcional P0 do portal em localStorage), o PR #155 (plano de staging da VPS Contabo) e o PR #156 (plano de alinhamento passivo do FailsafeJUD).
2. Publicar as evidÃªncias fÃ­sicas pÃ³s-merge de cada pull request e consolidar a memÃ³ria operacional para dar inÃ­cio Ã  prÃ³xima etapa fÃ­sica de staging de banco PostgreSQL real e polÃ­ticas de isolamento RLS.

## DEC-015 â€” Mandato de ExecuÃ§Ã£o ContÃ­nua para Executor Autorizado

Para otimizar os fluxos de automaÃ§Ã£o e reduzir latÃªncias operacionais, decidiu-se:
1. Conceder mandato contÃ­nuo e recorrente para o executor (Antigravity) avanÃ§ar sequencialmente nas etapas e tarefas internas dos packets de execuÃ§Ã£o, sem necessidade de interrupÃ§Ã£o ou consentimento micro-operacional passo a passo.
2. Limitar estritamente a parada de execuÃ§Ã£o e o bloqueio Ã s fronteiras sensÃ­veis prÃ©-definidas (deploys em produÃ§Ã£o, modificaÃ§Ãµes fÃ­sicas em VPS/HostGator, publicaÃ§Ã£o externa Vercel/Lovable, exposiÃ§Ã£o de segredos/secrets, modificaÃ§Ã£o de escopo, migraÃ§Ãµes de FailsafeJUD ou incidentes graves de governanÃ§a/seguranÃ§a).
3. Determinar que, diante de qualquer blocker real nessas fronteiras, o executor formule um parecer GCRC objetivo e categorizado (ex: `ENV_BLOCKED`, `BLOCKED`, `GOVERNANCE_INCIDENT`) no lugar de perguntas abertas ou genÃ©ricas.

## DEC-016 â€” GestÃ£o de PeÃ§as e OrÃ§amentos do Piloto OEM (MVP-SLICE-002-PARTS-APPROVALS)

No Ã¢mbito da implantaÃ§Ã£o da segunda fatia funcional (P1) do Piloto OEM, decidiu-se:
1. Codificar e expor a gestÃ£o de inventÃ¡rio de peÃ§as e orÃ§amentos OEM diretamente nas ordens de serviÃ§o, utilizando uma persistÃªncia de dados local simulada robusta (`localStorage`) com chaves para inventÃ¡rio e requisiÃ§Ãµes.
2. Implementar a polÃ­tica de reserva de peÃ§as (reduzindo estoque local) quando disponÃ­vel (estoque > 0) e a emissÃ£o automÃ¡tica de Pedidos de Compra Internos quando esgotado (estoque = 0).
3. Projetar e integrar uma sub-aba de triagem de peÃ§as no painel do administrador para aprovaÃ§Ã£o e cancelamento (rejeiÃ§Ã£o) rÃ¡pida de orÃ§amentos, de modo que rejeiÃ§Ãµes de reservas de estoque devolvam imediatamente a peÃ§a ao inventÃ¡rio local.
4. Mapear de forma transparente na documentaÃ§Ã£o (`POC_LIMITATIONS.md`) a matriz de endpoints REST e payloads esperados para substituiÃ§Ã£o por conexÃµes com APIs e barramentos reais em etapas subsequentes.

## DEC-017 â€” OrÃ§amentos Consolidados, AlÃ§adas de AprovaÃ§Ã£o e Faturamento do Piloto OEM (MVP-SLICE-003-BUDGET-BILLING-LITE)

No Ã¢mbito da implantaÃ§Ã£o da terceira fatia funcional (P2) do Piloto OEM, decidiu-se:
1. Implementar o orÃ§amento mÃ­nimo consolidado das Ordens de ServiÃ§o, somando dinamicamente a mÃ£o de obra fixa padrÃ£o de R$ 250,00 e o total das peÃ§as cujos orÃ§amentos foram previamente aprovados.
2. Definir perfis de alÃ§ada de aprovaÃ§Ã£o limitativos (TÃ©cnico: R$ 0, Coordenador: R$ 500, Gerente: R$ 5.000, Diretor: Ilimitado) com um seletor de simulaÃ§Ã£o interativo na interface administrativa do hub-web.
3. Bloquear aprovaÃ§Ãµes de orÃ§amentos acumulados acima do limite do perfil de alÃ§ada ativo, exigindo alteraÃ§Ã£o de alÃ§ada correspondente para continuidade operacional.
4. Desenvolver o faturamento automatizado de OS concluÃ­das no aplicativo do tÃ©cnico, gerando faturas com status `PENDING_PAYMENT` na chave `failsafe_invoices` do `localStorage`.
5. Projetar a sub-aba "Financeiro & Faturamento" no painel de administraÃ§Ã£o para visualizaÃ§Ã£o, liquidaÃ§Ã£o mock de recebimentos (muda status para `PAID`) e simulaÃ§Ã£o de exportaÃ§Ã£o de PDF.
6. Integrar as mÃ©tricas de faturamento (Faturamento Realizado / A Receber) diretamente como a quinta estatÃ­stica do painel do Dashboard de forma dinÃ¢mica.

## DEC-018 â€” Fila Offline e EvidÃªncias Multilaterais no Aplicativo TÃ©cnico (MVP-SLICE-004-FIELD-EVIDENCE-OFFLINE-LITE)

No Ã¢mbito da implantaÃ§Ã£o da quarta fatia funcional (P3) do Piloto OEM, decidiu-se:
1. Implementar o painel celular industrial de conectividade no topo da tela do tÃ©cnico, permitindo simular com fidelidade estados de conexÃ£o (Online vs Offline) com feedback LED reativo.
2. Desenvolver a Fila FÃ­sica Local em `localStorage` sob a chave `failsafe_offline_queue`, de modo que conclusÃµes de OS em modo sem sinal fiquem em status `PENDING_SYNC` localmente, sem acionar faturamentos globais imediatos.
3. Criar a funcionalidade de sincronizaÃ§Ã£o manual em lote para liquidaÃ§Ã£o reativa das OSs em fila offline, convertendo-as em faturamentos retroativos consistentes quando o status mudar para Online.
4. Integrar o Geotagging a nÃ­vel de sensor real de browser, consumindo `navigator.geolocation` nativo quando concedida permissÃ£o pelo usuÃ¡rio e registrando a origem auditÃ¡vel das coordenadas (`REAL` vs `SIMULATED`).
5. Projetar a SeÃ§Ã£o 6 de "Anexos de EvidÃªncias de Campo (Multilateral)" no laudo do tÃ©cnico, possibilitando associar mÃºltiplos arquivos de conformidade (Foto OEM, RelatÃ³rios PDF, Laudos Adicionais) com legendas individuais e previews dinÃ¢micos.
6. Desenvolver alertas de sincronizaÃ§Ã£o offline no Dashboard do administrador global, notificando a retaguarda em tempo real sobre itens retidos fisicamente em campo na sandbox local.

## DEC-019 â€” ReconciliaÃ§Ã£o e RestauraÃ§Ã£o de Dashboard Premium Reativo

No Ã¢mbito da auditoria de regressÃ£o do hub-web local, decidiu-se:
1. Reconciliar a estÃ©tica sofisticada de wow-factor (com AreaChart em degradÃª da Recharts, cards arredondados premium `rounded-[2rem]`, grupo de hovers reativos e cards informativos de CÃ³rtex Sentinela) com as regras de negÃ³cios dinÃ¢micas de banco local em `localStorage` estabelecidas nas fatias MVP-SLICE-001 a 004.
2. Unificar os dados de ativos totais, chamados em andamento, orÃ§amentos, estoque de inventÃ¡rio esgotado e totais financeiros simulados, mantendo 100% de coerÃªncia operacional em tempo real na sandbox local.
3. Preservar o isolamento absoluto da sandbox local e garantir que o build e typecheck permaneÃ§am 100% Ã­ntegros e verdes para demonstraÃ§Ã£o.

## DEC-020 â€” PrevalÃªncia ALPHA e failsafe01 como referÃªncia visual validada da UI

No Ã¢mbito da sincronizaÃ§Ã£o macro do ecossistema Failsafe, formalizou-se:
1. PrevalÃªncia Soberana da ALPHA: A reorganizaÃ§Ã£o Failsafe v0.1-a ALPHA prevalece sobre qualquer implementaÃ§Ã£o posterior divergente.
2. UI Bridging do failsafe01: O repositÃ³rio satÃ©lite Lovable `failsafe01` atua estritamente como a referÃªncia visual validada da interface de usuÃ¡rio (Bridge UI), trazendo wow-factor premium.
3. RepositÃ³rio Soberano: O repositÃ³rio `hbrasilia/failsafe` permanece como a Ãºnica fonte canÃ´nica de backend, lÃ³gica de negÃ³cio, persistÃªncia sandbox local, seguranÃ§a e arquitetura.
4. Destino Funcional: O projeto `apps/failsafe-hub` absorve e reconcilia visualmente a interface de `failsafe01` preservando integralmente todas as funcionalidades construÃ­das nos Slices 001â€“004.
5. Taxonomia RÃ­gida: AplicaÃ§Ã£o obrigatÃ³ria dos termos canÃ´nicos (Failsafe ECO, Failsafe Central, Failsafe GestÃ£o de Ativos e ServiÃ§os) em todos os nÃ­veis, garantindo zero vazamento de nomes reais de clientes.

## DEC-021 â€” ImportaÃ§Ã£o visual completa do Lovable/failsafe01 para apps/failsafe-hub com aplicaÃ§Ã£o da ALPHA e preservaÃ§Ã£o dos Slices

No Ã¢mbito do alinhamento visual canÃ´nico do monorepo, decidiu-se:
1. ImportaÃ§Ã£o EstÃ©tica Integral: Trazer do satÃ©lite `failsafe01` para o `apps/failsafe-hub` todo o projeto visual (cores, temas HSL, organizaÃ§Ã£o, layout de Sidebar e Topbar, navegaÃ§Ã£o, telas, componentes e cards).
2. PreservaÃ§Ã£o de LÃ³gica e Slices: Mesclar as novas telas visuais (AssetManagement, AssetRecord, Partners, Tenants, ServicesDashboard, ClientDashboard, Login, ModulePlaceholder) diretamente com a lÃ³gica local reativa de `localStorage` construÃ­da nos Slices 001â€“004 (OSs, estoques, orÃ§amentos, faturas, fila offline e assinaturas).
3. AplicaÃ§Ã£o Estrita da Taxonomia ALPHA: Ajustar textos, caminhos de importaÃ§Ã£o e cabeÃ§alhos em todas as telas importadas para eliminar qualquer nome comercial de cliente real (substituiÃ§Ã£o de UNOX por marcas fictÃ­cias da sandbox como Turbo Convecto e MaxGourmet) e padronizar os nomes canÃ´nicos do ecossistema.

## DEC-022 â€” ImportaÃ§Ã£o visual completa do failsafe01 exige login, temas, estrutura de pastas e dados demo higienizados

No Ã¢mbito da homologaÃ§Ã£o e saneamento estÃ©tico do monorepo, decidiu-se:
1. **ReconciliaÃ§Ã£o Estrutural de Pastas**: Replicar estritamente a estrutura de diretÃ³rios do `failsafe01` no hub, incluindo a separaÃ§Ã£o do componente `Sidebar.tsx` em `src/components/layout/`, a criaÃ§Ã£o dos provedores `TenantContext.tsx` e `AuthContext.tsx` em `src/contexts/` e a barreira global de erro `<Failsafe>` em `src/components/Failsafe.tsx`.
2. **NavegaÃ§Ã£o com Prefixo `/app/*`**: Configurar o roteamento do hub em `App.tsx` para agrupar as telas de negÃ³cios sob `/app/*` e proteger a navegaÃ§Ã£o. Estabelecer redirecionamentos automÃ¡ticos a partir das rotas legadas flat para manter compatibilidade absoluta.
3. **HigienizaÃ§Ã£o Total de Dados Demo**: Substituir qualquer marca comercial simulada ou dados de exemplo dos cadastros mock por nomenclatura genÃ©rica ALPHA ("Modelo Convectivo A", "Modelo Modular B", "Fabricante Piloto") e emails sintÃ©ticos com domÃ­nio `@failsafe.local`.
4. **PreservaÃ§Ã£o Visual do Login**: Importar e adaptar a interface do Login e o painel de seleÃ§Ã£o de 7 personas com dados demo sanitizados e controle dinÃ¢mico de visibilidade de menus.
5. **Auditoria File-by-File e Ajustes EstÃ©ticos**: Realizar comparaÃ§Ã£o e reconciliaÃ§Ã£o arquivo-a-arquivo exaustiva contra a fonte visual original, garantindo que temas CSS (`index.css` com a classe `font-sans` no `body`), navegaÃ§Ã£o da barra lateral (`Sidebar.tsx` usando comparador `pathname.startsWith` e bordas transparentes para evitar shifts de layout), e menus correspondam fielmente Ã  referÃªncia estÃ©tica homologada.

## DEC-023 â€” Bloqueio de AssunÃ§Ãµes Visuais e CorreÃ§Ã£o dos Workspaces Reais (@failsafe/hub-web)

No Ã¢mbito da contenÃ§Ã£o de incidentes de renderizaÃ§Ã£o de UI, estabeleceu-se:
1. **Workspace Real como Destino**: Os GCRCs anteriores de importaÃ§Ã£o visual foram declarados insuficientes (falso positivo) pois a interface de `failsafe01` estava contida na pasta `apps/failsafe-hub`, que nÃ£o faz parte dos workspaces ativos executados por `npm run dev:hub`.
2. **SincronizaÃ§Ã£o para Workspaces Ativos**: Determina-se a cÃ³pia e sincronizaÃ§Ã£o de 100% do cÃ³digo visual e de negÃ³cios reconciliado de `apps/failsafe-hub` diretamente para os workspaces ativos `apps/hub-web-staging` e `apps/hub-web`, preservando estritamente seus pacotes `@failsafe/hub-web-staging` e `@failsafe/hub-web`.
3. **Bloqueio de Novas Funcionalidades**: O provisionamento fÃ­sico de staging na VPS Contabo, assim como o desenvolvimento de novas features e Slices, ficam estritamente suspensos e pausados atÃ© a validaÃ§Ã£o visual definitiva e aprovaÃ§Ã£o explÃ­cita da UI pelo gestor na mÃ¡quina local.

## DEC-024 â€” CritÃ©rios de Paridade Visual e ValidaÃ§Ã£o de ExecuÃ§Ã£o Real

No Ã¢mbito da homologaÃ§Ã£o estÃ©tica da interface, formalizou-se:
1. **ComprovaÃ§Ã£o de Paridade**: A importaÃ§Ã£o visual da UI do `failsafe01` para o monorepo sÃ³ Ã© considerada concluÃ­da e vÃ¡lida se o aplicativo servido pelo script padrÃ£o `npm run dev:hub` renderizar visualmente a interface de forma idÃªntica Ã  referÃªncia estÃ©tica e houver prova fÃ­sica de roteamento, entrypoint e carregamento de estilos.
2. **InjeÃ§Ã£o de Marcadores de RenderizaÃ§Ã£o**: Obrigatoriedade de manter sinalizadores controlados no DOM (`data-ui-source="failsafe01-import-active"`) e tags visuais discretas (`UI Source: failsafe01 sync`) nos layouts comuns enquanto durar a fase de testes e validaÃ§Ã£o local, impedindo declaraÃ§Ãµes de sucesso baseadas puramente em status de build sem visualizaÃ§Ã£o correspondente no navegador local.

## DEC-025 â€” dev:hub sÃ³ Ã© validado quando o workspace real renderiza DOM visÃ­vel em teste automatizado, nÃ£o apenas quando build passa.

No Ã¢mbito da contenÃ§Ã£o de erros silenciosos no monorepo, decidiu-se:
1. **ValidaÃ§Ã£o Ativa de DOM**: Estabelecer que a conformidade do servidor dev:hub Ã© estritamente vinculada Ã  renderizaÃ§Ã£o reativa do DOM cliente comprovada via testes automatizados (como Playwright/Chromium). Status de compilaÃ§Ã£o ou build limpo nÃ£o sÃ£o suficientes para aprovaÃ§Ã£o de pacotes que utilizam transpilaÃ§Ã£o JSX/TSX.
2. **Autofix de ConfiguraÃ§Ãµes**: CorreÃ§Ã£o imediata de ausÃªncia de plugins de transpilaÃ§Ã£o do React no Vite em todos os workspaces de frontend (`apps/hub-web-staging` e `apps/hub-web`) e garantia de roteamento/redirecionamento de sessÃ£o local no Login.

## DEC-026 â€” STATE_PACK.md como fonte operacional obrigatÃ³ria e proibiÃ§Ã£o de memÃ³ria de chat como fonte de execuÃ§Ã£o

No Ã¢mbito do alinhamento tÃ©cnico e de governanÃ§a contra regressÃµes cognitivas no monorepo, formalizou-se:
1. **ProibiÃ§Ã£o de DependÃªncia de Chat**: Ã‰ terminantemente proibido a qualquer IA ou executor depender da memÃ³ria de chat (instruÃ§Ãµes e contextos passados temporariamente em conversas) como fonte soberana de alinhamento. Toda e qualquer regra, decisÃ£o e prÃ³ximo passo de roteamento, UI ou infraestrutura devem residir e se estruturar canonicamente no repositÃ³rio local.
2. **STATE_PACK.md como Fonte Soberana**: CriaÃ§Ã£o de `STATE_PACK.md` em `ops/control-plane/memory/` contendo o estado unificado e regras de paridade de workspaces. Nenhum executor pode declarar uma tarefa como `COMPLETED` sem antes ler e validar o estado canÃ´nico contra o `STATE_PACK.md`.
3. **ValidaÃ§Ã£o de Sucesso Contra Falsos Positivos**: GCRCs que atestem sucesso tÃ©cnico (builds ou testes) mas cujas validaÃ§Ãµes locais ou de runtime subsequentes do gestor revelem quebras ou telas brancas sÃ£o automaticamente rotulados como **FALSO POSITIVO** de fiaÃ§Ã£o. Isso anula de imediato a declaraÃ§Ã£o de compleiÃ§Ã£o da tarefa e congela qualquer progressÃ£o de esteira.
4. **Garantia de RenderizaÃ§Ã£o Real**: HomologaÃ§Ãµes de interface do satÃ©lite `failsafe01` em `apps/failsafe-hub` e workspaces ativos sÃ£o estritamente condicionadas Ã  renderizaÃ§Ã£o do DOM real servido por `npm run dev:hub`, nÃ£o sendo aceito status de build limpo como prova de conformidade.
5. **Bloqueio de Staging e Acessos**: O provisionamento fÃ­sico do staging e qualquer aÃ§Ã£o sensÃ­vel na VPS/HostGator permanecem pausados e bloqueados atÃ© o cumprimento explÃ­cito dos segredos e gates humanos estipulados canonicamente. Qualquer falta de acesso fÃ­sico real ao conector Ã© classificada como **BLOQUEADO POR ACESSO**, sem simulaÃ§Ã£o fantasiosa.

## DEC-027 â€” GCRC Acceptance Gate obrigatÃ³rio para impedir falso COMPLETED, memÃ³ria de chat e retorno parcial

No Ã¢mbito do reforÃ§o do controle de qualidade e integridade de handoffs operacionais, estabeleceu-se:
1. **Gate Automatizado de Retorno**: Cada retorno de execuÃ§Ã£o de pacotes de governanÃ§a, controle ou cÃ³digo deve ser validado por scripts de GCRC (`validate-gcrc.ps1` e `validate-gcrc.sh`) integrados na esteira do GitHub Actions.
2. **ProibiÃ§Ã£o de COMPLETED Parcial**: Fica vedado marcar tarefas como COMPLETED se as alteraÃ§Ãµes residirem apenas localmente em commit sem PR correspondente ou sem checks de CI remotos verdes.
3. **ExigÃªncia de Provas de UI**: HomologaÃ§Ãµes estÃ©ticas ou de fiaÃ§Ã£o de componentes front-end passam a exigir a coleta e o armazenamento de logs de trace e DOM reativo (`DEV_HUB_SCRIPT_TRACE.md`, `RUNTIME_RENDER_AUDIT.md`, `WIRING_AUDIT.md`, `VISUAL_DOM_PROOF.md`) no repositÃ³rio de evidÃªncias, sob pena de classificaÃ§Ã£o imediata como **FALSO POSITIVO** (`REJECTED_GCRC_FALSE_POSITIVE`).

## DEC-028 â€” Public Control Bridge sanitizado como ponte de acompanhamento e orquestraÃ§Ã£o leve

No Ã¢mbito de blindagem contra regressÃ£o e dependÃªncia de chat memory, decidiu-se:
1. **Ponte de Controle PÃºblica**: CriaÃ§Ã£o do repositÃ³rio pÃºblico sanitizado [failsafe-control-bridge](https://github.com/hbrasilia/failsafe-control-bridge) para acompanhamento leve de estado, inboxes, comandos e bloqueios.
2. **Script de PublicaÃ§Ã£o**: Provisionamento de scripts de publicaÃ§Ã£o de lote (`publish-public-bridge.ps1` e `.sh`) que leem os estados locais do monorepo privado, filtram quaisquer credenciais/IPs privados e atualizam o repositÃ³rio pÃºblico de forma unidirecional.
3. **Soberania do RepositÃ³rio Core**: O repositÃ³rio `hbrasilia/failsafe` permanece como a Ãºnica fonte soberana e canÃ´nica de verdade para regras de negÃ³cio e governanÃ§a.


---

## ðŸš€ MARCO Beta b-0.1 â€” ReorganizaÃ§Ã£o Definitiva â€” 2026-06-03

A partir desta data, o ecossistema Failsafe ECO entra na fase **Beta b-0.1**,
sucedendo o ciclo ALPHA (v0.10-v0.12). Documentos soberanos do marco:

- `MARCO_BETA_B_0_1.md`
- `FAILSAFE_ECO_FINAL_DEFINITIVE_BLUEPRINT.md`
- `FAILSAFE_ECO_EXECUTION_PLAYBOOK.md`

PrincÃ­pio Anti-Drift ativo: arquitetura, espinha dorsal/plano B, sequÃªncia
dos 8 grupos e tiers de aprovaÃ§Ã£o NÃƒO mudam sem DEC formal.

---

## DEC-031 â€” Failsafe Control Center v1.0 â€” 2026-06-03

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

Stack: PHP 8.2 + MariaDB 10.11 rodando em VPS Contabo, base failsafejud
v15.4.27 adaptado. Auth: GitHub OAuth + 2FA TOTP. Reverse proxy: Caddy 2
com HTTPS automÃ¡tico Let's Encrypt. Subdomain: control.failsafe.com.br.

Iniciar APÃ“S conclusÃ£o dos packets:
- OPS-DOCS-UNIFICATION-001 (G1)
- OPS-PUBLIC-OBSERVABILITY-001 (G2)
- GATE-RECONCILE-001 (G3)

Riscos aceitos: dual stack PHP/MariaDB vs ECO Core TypeScript/Postgres
por 6 meses (mitigado por DEC-032).

Justificativa: failsafejud v15.4.27 jÃ¡ Ã© release candidate maduro, com
80% das features genÃ©ricas necessÃ¡rias para Control Center (auth, ACL,
audit, cofre, multi-tenant, workflows, notices, WhatsApp). Construir do
zero levaria 6-10 semanas; adaptar leva 14 dias. Economia de tempo
prevalece sobre purismo de stack.

---

## DEC-032 â€” Plano V2 Control Center TypeScript â€” 2027-Q1

**Status:** APPROVED (forward-dated)
**Owner:** CEO
**Marco:** Beta b-0.1

A partir de M+6 do MVP UNOX em produÃ§Ã£o real, executar migraÃ§Ã£o do
Control Center de PHP/MariaDB para TypeScript/PostgreSQL alinhado ao
ECO Core. Plano detalhado: 8 semanas de execuÃ§Ã£o.

**CritÃ©rio de aceleraÃ§Ã£o:** se 2+ incidentes tÃ©cnicos por mÃªs forem
atribuÃ­veis a dual stack (PHP/MariaDB vs TS/Postgres), antecipar V2
para M+3 sem necessidade de nova DEC.

MitigaÃ§Ã£o proativa do dual stack durante a fase PHP:
- Helpers TypeScript no ECO Core espelham logica PHP (ABSORB JUDâ†’ECO)
- Schemas mantidos additivos, sem dependÃªncias cruzadas obrigatÃ³rias
- DocumentaÃ§Ã£o de cada feature includes contraparte TS jÃ¡ planejada

---

## DEC-033 â€” Pausa do Lovable como Gerador Ativo â€” 2026-06-03

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

A DEC-021 declarou absorÃ§Ã£o integral do projeto visual Lovable em
`apps/failsafe-hub`. Lovable nÃ£o tem mais funÃ§Ã£o como gerador contÃ­nuo
para o ciclo Beta b-0.1.

**AÃ§Ã£o imediata:** pausar assinatura Lovable (economiza ~USD 25/mÃªs).
RepositÃ³rio `failsafe01` mantido em modo read-only como referÃªncia
visual histÃ³rica.

**ReativaÃ§Ã£o automÃ¡tica** se ocorrer qualquer um dos eventos:
- Portal Cliente B2C entrar em escopo de desenvolvimento
- Mobile app PWA premium for priorizado
- Nova vertical nÃ£o-Asset-Services for aberta (ex: Confeitaria)

Quando reativar, NÃƒO usar como gerador livre â€” usar com
LOVABLE_BRIDGE_RUNBOOK ativo, em packet especÃ­fico, com sync
obrigatÃ³rio no fim. NÃ£o usar para iteraÃ§Ã£o contÃ­nua.

---

## DEC-034 â€” Tier de AprovaÃ§Ã£o Estratificado â€” 2026-06-03

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

Implementar no Control Center 3 nÃ­veis de aprovaÃ§Ã£o:

**T1 â€” Auto-merge:**
- Hotfix typo / CSS minor / doc nÃ£o-canÃ´nica
- CI verde
- risk_class=LOW
- Auto-merge sem intervenÃ§Ã£o CEO

**T2 â€” Proxy automÃ¡tico via Hermes:**
- Packets prÃ©-aprovados via whitelist
- GCRC vÃ¡lido conforme template
- Todos validators PASS
- Hermes valida â†’ auto-merge

**T3 â€” CEO obrigatÃ³rio (2FA TOTP):**
- DEC formal
- Migration de schema
- Cadastro/rotaÃ§Ã£o de secrets
- Deploy de produÃ§Ã£o
- MudanÃ§a de escopo MVP

Reduz dependÃªncia Ãºnica do Gestor declarada na RACI_MATRIX.
ImplementaÃ§Ã£o tÃ©cnica em CONTROL-CENTER-SETUP-001 (G4).

---

## DEC-035 â€” UnificaÃ§Ã£o Documental â€” ApÃ³s G1

**Status:** EXECUTED
**Owner:** CEO
**Marco:** Beta b-0.1

ApÃ³s conclusÃ£o do packet OPS-DOCS-UNIFICATION-001 (G1):

- `DOC_REGISTRY.yml` promovido a **Ã­ndice oficial Ãºnico** de toda a
  documentaÃ§Ã£o canÃ´nica do ecossistema Failsafe ECO.
- **Sistema A** (`docs/00-canonical/` + `docs/01-08-*/`) e **Sistema C**
  (`ops/control-plane/docs/`) alinhados com escopos definidos.
- **Sistema B** (`docs/plataforma/produto/roadmap/operacao/governance/
  diretrizes/comercial/` â€” legado PT) movido para
  `docs/archive/legacy/` com conteÃºdo Ãºnico migrado primeiro para
  Sistema A ou C antes do arquivamento.

A partir desta DEC: toda doc nova Ã© criada respeitando DOC_REGISTRY.yml
como fonte de verdade. Toda PR que adiciona/remove/renomeia doc deve
atualizar DOC_REGISTRY.yml na mesma PR (enforce via Actions).

---

## DEC-036 â€” Resultado GATE-RECONCILE-001 â€” ApÃ³s G3

**Status:** PENDING (preenchido pelo executor apÃ³s G3)
**Owner:** CEO
**Marco:** Beta b-0.1

[BifurcaÃ§Ã£o A ou B definida automaticamente apÃ³s Antigravity Pro
executar GATE-RECONCILE-001:

**BifurcaÃ§Ã£o A** â€” UI failsafe01/hub-web renderizando corretamente em
dev:hub validado por Playwright DOM real â†’ `publish-public-bridge.sh`
atualiza, STATE_PACK_PUBLIC.md Â§17 reflete realidade, fluxo continua
direto para G4.

**BifurcaÃ§Ã£o B** â€” UI tem regressÃ£o detectada â†’ STATE_PACK interno
rebaixa para `NEEDS_COMPLETION`, packet de correÃ§Ã£o criado em
`packets/active/`, G4 espera atÃ© correÃ§Ã£o mergeada.]

Resultado a ser preenchido pelo Antigravity Pro automaticamente ao
concluir GATE-RECONCILE-001.

---

## DEC-037 â€” Gate CEO 1 Aprovado â€” [DATA]

**Status:** PENDING (preenchido pelo CEO apÃ³s Gate 1)
**Owner:** CEO

G1 OPS-DOCS-UNIFICATION-001: [CONCLUÃDO / AJUSTES SOLICITADOS]
G2 OPS-PUBLIC-OBSERVABILITY-001: [CONCLUÃDO / AJUSTES SOLICITADOS]
G3 GATE-RECONCILE-001: [CONCLUÃDO / AJUSTES SOLICITADOS]
BifurcaÃ§Ã£o G3: [A ou B]

Autorizado prosseguir para G4 Control Center FundaÃ§Ã£o + G5/G6 em paralelo.
Riscos remanescentes: [LISTAR ou NENHUM]

---

## DEC-038 â€” Gate CEO 2 Aprovado â€” [DATA]

**Status:** PENDING (preenchido pelo CEO apÃ³s Gate 2)
**Owner:** CEO

G4 CONTROL-CENTER-SETUP-001: [CONCLUÃDO / AJUSTES SOLICITADOS]
G5 CC-COMPLETENESS (6 packets): [CONCLUÃDO / AJUSTES SOLICITADOS]
G6 ABSORB-001 a 004: [CONCLUÃDO / AJUSTES SOLICITADOS]

Autorizado prosseguir para G7 (gates fÃ­sicos VPS staging) sob
liberaÃ§Ã£o explÃ­cita CEO conforme STAGING_PROVISIONING_GATE.md.

---

## DEC-039 â€” LiberaÃ§Ã£o Execution Gate Staging â€” [DATA]

**Status:** PENDING (preenchido apÃ³s autorizaÃ§Ãµes fÃ­sicas)
**Owner:** CEO

Conforme runbook STAGING_PROVISIONING_GATE.md:
- Snapshot Contabo criado: [ID-DO-SNAPSHOT]
- UFW regras revisadas e autorizadas: [SIM/NÃƒO + ajustes]
- 3 secrets cadastrados no GitHub:
  - FAILSAFE_SSH_VPS_KEY: [âœ“/pendente]
  - STAGING_DB_PASSWORD: [âœ“/pendente]
  - STAGING_DATABASE_URL: [âœ“/pendente]
- Backup prÃ©-bootstrap validado em ASUSTOR + GDrive

Antigravity autorizado a executar STAGING-PROVISIONING-EXECUTION-001
+ RLS-STAGE-001 nos prÃ³ximos 3 dias.

---

## DEC-040 â€” MVP UNOX OEM Piloto Pronto para Demo â€” [DATA]

**Status:** PENDING (preenchido apÃ³s Gate 3)
**Owner:** CEO

MVP UNOX OEM Piloto validado integralmente:
- Fluxo end-to-end PASS (chamadoâ†’OSâ†’tÃ©cnicoâ†’checklistâ†’peÃ§asâ†’aprovaÃ§Ã£oâ†’dashboard)
- RLS leakage = 0 com 3 tenants sintÃ©ticos
- 3 personas funcionando isoladas
- Manuais operacionais entregues (1 pÃ¡gina por persona)
- Roteiro de demo CEO ao cliente UNOX entregue

Autorizada apresentaÃ§Ã£o ao cliente UNOX. PrÃ³ximos passos:
- Agendar reuniÃ£o comercial
- Migrar tenant sintÃ©tico para tenant real apÃ³s assinatura
- Iniciar Slice P5 (ComunicaÃ§Ã£o cliente automatizada)
- Iniciar formalizaÃ§Ã£o da vertical Failsafe JurÃ­dico
  (absorÃ§Ã£o failsafejud parcial conforme FEATURE_REUSE_MAP)

---

## DEC-041 â€” Registry de DomÃ­nios + DomÃ­nio Principal failsafe.com.br â€” 2026-06-03

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

Registrado o domÃ­nio principal oficial do ecossistema:
**failsafe.com.br** (corrigindo "failsafe.eco" usado como placeholder
em rascunhos anteriores deste marco).

**DomÃ­nios oficiais do ecossistema:**
- Principal: `failsafe.com.br`
- SecundÃ¡rio: `failsafe.pro` (301 redirect)
- Vertical Confeitaria: `flordephi.com.br` (reservado)

**Subdomains ativos no Beta b-0.1:**
- `status.failsafe.com.br` (HostGator, G2)
- `control.failsafe.com.br` (VPS Contabo, G4)
- `docs.failsafe.com.br` (alias /docs do Control Center, G5)
- `demo.failsafe.com.br` (VPS Contabo, G8)

Registry completo de TODOS os 16 domÃ­nios disponÃ­veis em
`docs/beta-b-0.1/DOMAINS_REGISTRY.md`.

Toda mudanÃ§a de uso de domÃ­nio reservado exige DEC formal posterior.

---

## DEC-042 â€” PolÃ­tica de IndexaÃ§Ã£o do DOC_REGISTRY â€” 2026-06-04

Status: APPROVED
Owner: CEO
Marco: Beta b-0.1

DOC_REGISTRY.yml indexa entry points lÃ³gicos do Control Plane,
nÃ£o 100% dos arquivos .md do repo. CritÃ©rios:
- SIM indexa: STATE_PACK, DECISIONS, runbooks, packets, marcos
- SIM indexa: cada pacote como entry point Ãºnico (ex: docs/beta-b-0.1/README.md)
- NÃƒO indexa: arquivos internos de pacotes (sÃ£o listados pelo README do pacote)
- NÃƒO indexa: archive/legacy/ (Sistema B arquivado)
- NÃƒO indexa: evidÃªncias individuais (sÃ£o listadas pelo packet)

Doc 08 Â§5 a ser ajustado em prÃ³ximo lote (nÃ£o bloqueia).

---

**Fim do bloco Beta b-0.1.**
**Iniciar imediatamente por:** ler PASSO 1 do
`FAILSAFE_ECO_EXECUTION_PLAYBOOK.md` e disparar prompt no Antigravity Pro.






