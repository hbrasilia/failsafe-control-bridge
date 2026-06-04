# DECISIONS

## DEC-001 — Repo soberano

`hbrasilia/failsafe` é a fonte soberana. Control Plane fica em `ops/control-plane/`.

## DEC-002 — Taxonomia

Vertical prioritário: Failsafe Gestão de Ativos e Serviços. OEM, Maintenance, Client e Parts são pacotes/capabilities.

## DEC-003 — FailsafeJUD

Manter validação em HostGator/MariaDB até readiness de migração.

## DEC-004 — ControlKit

ControlKit 0.10 é pacote inicial gerado, não execução validada.

## DEC-005 — Resolução de Taxonomia (PR #140)

O termo 'Vertical OEM' foi descontinuado e substituído de todos os arquivos canônicos e de execução para evitar vazamentos comerciais ou termos inconsistentes. O termo oficial a ser utilizado é 'Pacote OEM / Aftermarket dentro do vertical Failsafe Gestão de Ativos e Serviços'.

## DEC-006 — Refinamento de Taxonomy Guard & Remoção de Nomes Reais (PR #140 R2)

Para garantir segurança operacional absoluta no monorepo hbrasilia/failsafe, decidiu-se:
1. Renomear o packet FS-OPS-006 removendo o nome real de cliente ('UNOX') do arquivo e de seu conteúdo.
2. Tratar de forma diferenciada as violações de taxonomia: bloqueio fatal nas áreas ativas (docs, packets, scripts, branches, configs, dashboards) e apenas avisos (warnings) nas áreas de auditoria histórica (memory e evidence). Isso permite manter registros de incidentes de taxonomia para fins de auditoria sem comprometer as validações da pipeline de CI/CD.

## DEC-007 — Merge do PR #140 & Ativação de Fila (OPS-DOCS-001)

Com todas as 10 esteiras de CI/CD verdes e autorização do gestor obtida, o PR #140 foi mesclado com sucesso na branch `main` (commit `a602600`).
Decidiu-se:
1. Avançar imediatamente com a fila remota de autodispatch.
2. Iniciar o packet `OPS-DOCS-001` em branch isolada `ops/ops-docs-001` para indexar e padronizar toda a documentação canônica na fundação 0.12.

## DEC-008 — Consolidação Documental do Control Plane (OPS-DOCS-001)

No âmbito do encerramento do packet `OPS-DOCS-001`, formalizou-se:
1. Adoção do novo indexador `DOC_REGISTRY.yml` versionado em sua especificação `0.12`, categorizando de forma clara e rigorosa a memória do projeto, runbooks de infraestrutura e suporte, planos de disaster recovery, registros de evidências, packets e indicativos de documentos legados supersedidos.
2. Manutenção integral do histórico de auditoria técnica. Documentos obsoletos como `fs-ops-006` com nome de cliente são arquivados ou renomeados, com suas justificativas mapeadas de forma transparente no repositório.

## DEC-009 — Project Instructions Failsafe ECO compacta e soberana

Formaliza-se a integração e conformidade estrita de todo o monorepo `hbrasilia/failsafe` com as *Project Instructions Failsafe ECO*.
Decidiu-se:
1. Sincronizar todos os arquivos de memória (`PROJECT_MEMORY.md`, `CONTEXT_PACK.md`, `DOC_REGISTRY.yml`, `AGENTS.md`) e políticas operacionais com as diretrizes consolidadas de anti-manual, taxonomia rígida, e blindagem de caminhos canônicos.
2. Mapear de forma clara as limitações decorrentes da execução sandboxed de IAs (exigindo evidências objetivas versionadas em `/evidence/` para homologação).

## DEC-010 — Taxonomy Guard local pre-commit opt-in e CI obrigatória (TAXONOMY-GUARD-001)

No âmbito da finalização do packet `TAXONOMY-GUARD-001`, formalizou-se:
1. Provisionamento de scripts de instalação/desinstalação limpos e opcionais (`install-pre-commit.ps1` para Windows e `install-pre-commit.sh` para Linux/macOS) do hook pre-commit do Git. O hook realiza dry-run da taxonomia localmente, mas permanece **opt-in** (opcional, não-invasivo) para o gestor.
2. Ativação dos gates de CI remotos do GitHub Actions (`validate`, `validate-control-plane` e `control-plane`) como bloqueios estritamente obrigatórios para merge em `main`, blindando a taxonomia de forma perpétua.

## DEC-011 — POC Local e Mock de Dados do Módulo de Ordens de Serviço (MVP-IMPLEMENTATION-SLICE-001)

No âmbito da implantação da fatia funcional P0 do Piloto OEM, decidiu-se:
1. Implementar o ciclo de vida completo de ativos, chamados e Ordens de Serviço em modo de validação interativa (POC local) para contornar a ausência de banco de dados físico ativo na sessão.
2. Estabelecer persistência simulada robusta em `localStorage` para viabilizar testes funcionais cross-tab do fluxo de valor P0.
3. Desenvolver o runbook `POC_LIMITATIONS.md` detalhando as restrições operacionais e documentando um mapa de transição de endpoints futuros (REST/GraphQL) para substituição transparente dos mocks por chamadas à API real.

## DEC-012 — Planejamento de Staging VPS Contabo (VPS-STAGING-PLAN-001)

No âmbito da fundação de staging, decidiu-se:
1. Modelar a topologia Docker Compose e blindagem de rede via UFW de forma estritamente analítica e passiva, sem realizar nenhuma modificação ou instalação física na VPS Contabo nesta fase.
2. Mapear todas as chaves e segredos ambientais requeridos e definir gates de bootstrap explícitos e rigorosos condicionando qualquer ação futura de deploy à aprovação humana.

## DEC-013 — Alinhamento FailsafeJUD HostGator (JUD-ALIGNMENT-FOLLOWUP-001)

No âmbito do FailsafeJUD, decidiu-se:
1. Catalogar as restrições de infraestrutura (latência e ausência de pgvector) e mapear a reutilização de funcionalidades de IA (Cortex) e barramento (ControlKit) entre o core e o módulo jurídico.
2. Estabelecer regras de segurança rigorosas proibindo escrita ou tráfego de dados confidenciais sem criptografia local prévia no ambiente compartilhado HostGator.

## DEC-014 — Homologação e Merge dos PRs #154, #155 e #156 (Macro Closeout P0)

Com a autorização do gestor e todas as 10/10 esteiras de CI remota verdes, decidiu-se:
1. Mergear canonicamente na branch principal o PR #154 (fatia funcional P0 do portal em localStorage), o PR #155 (plano de staging da VPS Contabo) e o PR #156 (plano de alinhamento passivo do FailsafeJUD).
2. Publicar as evidências físicas pós-merge de cada pull request e consolidar a memória operacional para dar início à próxima etapa física de staging de banco PostgreSQL real e políticas de isolamento RLS.

## DEC-015 — Mandato de Execução Contínua para Executor Autorizado

Para otimizar os fluxos de automação e reduzir latências operacionais, decidiu-se:
1. Conceder mandato contínuo e recorrente para o executor (Antigravity) avançar sequencialmente nas etapas e tarefas internas dos packets de execução, sem necessidade de interrupção ou consentimento micro-operacional passo a passo.
2. Limitar estritamente a parada de execução e o bloqueio às fronteiras sensíveis pré-definidas (deploys em produção, modificações físicas em VPS/HostGator, publicação externa Vercel/Lovable, exposição de segredos/secrets, modificação de escopo, migrações de FailsafeJUD ou incidentes graves de governança/segurança).
3. Determinar que, diante de qualquer blocker real nessas fronteiras, o executor formule um parecer GCRC objetivo e categorizado (ex: `ENV_BLOCKED`, `BLOCKED`, `GOVERNANCE_INCIDENT`) no lugar de perguntas abertas ou genéricas.

## DEC-016 — Gestão de Peças e Orçamentos do Piloto OEM (MVP-SLICE-002-PARTS-APPROVALS)

No âmbito da implantação da segunda fatia funcional (P1) do Piloto OEM, decidiu-se:
1. Codificar e expor a gestão de inventário de peças e orçamentos OEM diretamente nas ordens de serviço, utilizando uma persistência de dados local simulada robusta (`localStorage`) com chaves para inventário e requisições.
2. Implementar a política de reserva de peças (reduzindo estoque local) quando disponível (estoque > 0) e a emissão automática de Pedidos de Compra Internos quando esgotado (estoque = 0).
3. Projetar e integrar uma sub-aba de triagem de peças no painel do administrador para aprovação e cancelamento (rejeição) rápida de orçamentos, de modo que rejeições de reservas de estoque devolvam imediatamente a peça ao inventário local.
4. Mapear de forma transparente na documentação (`POC_LIMITATIONS.md`) a matriz de endpoints REST e payloads esperados para substituição por conexões com APIs e barramentos reais em etapas subsequentes.

## DEC-017 — Orçamentos Consolidados, Alçadas de Aprovação e Faturamento do Piloto OEM (MVP-SLICE-003-BUDGET-BILLING-LITE)

No âmbito da implantação da terceira fatia funcional (P2) do Piloto OEM, decidiu-se:
1. Implementar o orçamento mínimo consolidado das Ordens de Serviço, somando dinamicamente a mão de obra fixa padrão de R$ 250,00 e o total das peças cujos orçamentos foram previamente aprovados.
2. Definir perfis de alçada de aprovação limitativos (Técnico: R$ 0, Coordenador: R$ 500, Gerente: R$ 5.000, Diretor: Ilimitado) com um seletor de simulação interativo na interface administrativa do hub-web.
3. Bloquear aprovações de orçamentos acumulados acima do limite do perfil de alçada ativo, exigindo alteração de alçada correspondente para continuidade operacional.
4. Desenvolver o faturamento automatizado de OS concluídas no aplicativo do técnico, gerando faturas com status `PENDING_PAYMENT` na chave `failsafe_invoices` do `localStorage`.
5. Projetar a sub-aba "Financeiro & Faturamento" no painel de administração para visualização, liquidação mock de recebimentos (muda status para `PAID`) e simulação de exportação de PDF.
6. Integrar as métricas de faturamento (Faturamento Realizado / A Receber) diretamente como a quinta estatística do painel do Dashboard de forma dinâmica.

## DEC-018 — Fila Offline e Evidências Multilaterais no Aplicativo Técnico (MVP-SLICE-004-FIELD-EVIDENCE-OFFLINE-LITE)

No âmbito da implantação da quarta fatia funcional (P3) do Piloto OEM, decidiu-se:
1. Implementar o painel celular industrial de conectividade no topo da tela do técnico, permitindo simular com fidelidade estados de conexão (Online vs Offline) com feedback LED reativo.
2. Desenvolver a Fila Física Local em `localStorage` sob a chave `failsafe_offline_queue`, de modo que conclusões de OS em modo sem sinal fiquem em status `PENDING_SYNC` localmente, sem acionar faturamentos globais imediatos.
3. Criar a funcionalidade de sincronização manual em lote para liquidação reativa das OSs em fila offline, convertendo-as em faturamentos retroativos consistentes quando o status mudar para Online.
4. Integrar o Geotagging a nível de sensor real de browser, consumindo `navigator.geolocation` nativo quando concedida permissão pelo usuário e registrando a origem auditável das coordenadas (`REAL` vs `SIMULATED`).
5. Projetar a Seção 6 de "Anexos de Evidências de Campo (Multilateral)" no laudo do técnico, possibilitando associar múltiplos arquivos de conformidade (Foto OEM, Relatórios PDF, Laudos Adicionais) com legendas individuais e previews dinâmicos.
6. Desenvolver alertas de sincronização offline no Dashboard do administrador global, notificando a retaguarda em tempo real sobre itens retidos fisicamente em campo na sandbox local.

## DEC-019 — Reconciliação e Restauração de Dashboard Premium Reativo

No âmbito da auditoria de regressão do hub-web local, decidiu-se:
1. Reconciliar a estética sofisticada de wow-factor (com AreaChart em degradê da Recharts, cards arredondados premium `rounded-[2rem]`, grupo de hovers reativos e cards informativos de Córtex Sentinela) com as regras de negócios dinâmicas de banco local em `localStorage` estabelecidas nas fatias MVP-SLICE-001 a 004.
2. Unificar os dados de ativos totais, chamados em andamento, orçamentos, estoque de inventário esgotado e totais financeiros simulados, mantendo 100% de coerência operacional em tempo real na sandbox local.
3. Preservar o isolamento absoluto da sandbox local e garantir que o build e typecheck permaneçam 100% íntegros e verdes para demonstração.

## DEC-020 — Prevalência ALPHA e failsafe01 como referência visual validada da UI

No âmbito da sincronização macro do ecossistema Failsafe, formalizou-se:
1. Prevalência Soberana da ALPHA: A reorganização Failsafe v0.1-a ALPHA prevalece sobre qualquer implementação posterior divergente.
2. UI Bridging do failsafe01: O repositório satélite Lovable `failsafe01` atua estritamente como a referência visual validada da interface de usuário (Bridge UI), trazendo wow-factor premium.
3. Repositório Soberano: O repositório `hbrasilia/failsafe` permanece como a única fonte canônica de backend, lógica de negócio, persistência sandbox local, segurança e arquitetura.
4. Destino Funcional: O projeto `apps/failsafe-hub` absorve e reconcilia visualmente a interface de `failsafe01` preservando integralmente todas as funcionalidades construídas nos Slices 001–004.
5. Taxonomia Rígida: Aplicação obrigatória dos termos canônicos (Failsafe ECO, Failsafe Central, Failsafe Gestão de Ativos e Serviços) em todos os níveis, garantindo zero vazamento de nomes reais de clientes.

## DEC-021 — Importação visual completa do Lovable/failsafe01 para apps/failsafe-hub com aplicação da ALPHA e preservação dos Slices

No âmbito do alinhamento visual canônico do monorepo, decidiu-se:
1. Importação Estética Integral: Trazer do satélite `failsafe01` para o `apps/failsafe-hub` todo o projeto visual (cores, temas HSL, organização, layout de Sidebar e Topbar, navegação, telas, componentes e cards).
2. Preservação de Lógica e Slices: Mesclar as novas telas visuais (AssetManagement, AssetRecord, Partners, Tenants, ServicesDashboard, ClientDashboard, Login, ModulePlaceholder) diretamente com a lógica local reativa de `localStorage` construída nos Slices 001–004 (OSs, estoques, orçamentos, faturas, fila offline e assinaturas).
3. Aplicação Estrita da Taxonomia ALPHA: Ajustar textos, caminhos de importação e cabeçalhos em todas as telas importadas para eliminar qualquer nome comercial de cliente real (substituição de UNOX por marcas fictícias da sandbox como Turbo Convecto e MaxGourmet) e padronizar os nomes canônicos do ecossistema.

## DEC-022 — Importação visual completa do failsafe01 exige login, temas, estrutura de pastas e dados demo higienizados

No âmbito da homologação e saneamento estético do monorepo, decidiu-se:
1. **Reconciliação Estrutural de Pastas**: Replicar estritamente a estrutura de diretórios do `failsafe01` no hub, incluindo a separação do componente `Sidebar.tsx` em `src/components/layout/`, a criação dos provedores `TenantContext.tsx` e `AuthContext.tsx` em `src/contexts/` e a barreira global de erro `<Failsafe>` em `src/components/Failsafe.tsx`.
2. **Navegação com Prefixo `/app/*`**: Configurar o roteamento do hub em `App.tsx` para agrupar as telas de negócios sob `/app/*` e proteger a navegação. Estabelecer redirecionamentos automáticos a partir das rotas legadas flat para manter compatibilidade absoluta.
3. **Higienização Total de Dados Demo**: Substituir qualquer marca comercial simulada ou dados de exemplo dos cadastros mock por nomenclatura genérica ALPHA ("Modelo Convectivo A", "Modelo Modular B", "Fabricante Piloto") e emails sintéticos com domínio `@failsafe.local`.
4. **Preservação Visual do Login**: Importar e adaptar a interface do Login e o painel de seleção de 7 personas com dados demo sanitizados e controle dinâmico de visibilidade de menus.
5. **Auditoria File-by-File e Ajustes Estéticos**: Realizar comparação e reconciliação arquivo-a-arquivo exaustiva contra a fonte visual original, garantindo que temas CSS (`index.css` com a classe `font-sans` no `body`), navegação da barra lateral (`Sidebar.tsx` usando comparador `pathname.startsWith` e bordas transparentes para evitar shifts de layout), e menus correspondam fielmente à referência estética homologada.

## DEC-023 — Bloqueio de Assunções Visuais e Correção dos Workspaces Reais (@failsafe/hub-web)

No âmbito da contenção de incidentes de renderização de UI, estabeleceu-se:
1. **Workspace Real como Destino**: Os GCRCs anteriores de importação visual foram declarados insuficientes (falso positivo) pois a interface de `failsafe01` estava contida na pasta `apps/failsafe-hub`, que não faz parte dos workspaces ativos executados por `npm run dev:hub`.
2. **Sincronização para Workspaces Ativos**: Determina-se a cópia e sincronização de 100% do código visual e de negócios reconciliado de `apps/failsafe-hub` diretamente para os workspaces ativos `apps/hub-web-staging` e `apps/hub-web`, preservando estritamente seus pacotes `@failsafe/hub-web-staging` e `@failsafe/hub-web`.
3. **Bloqueio de Novas Funcionalidades**: O provisionamento físico de staging na VPS Contabo, assim como o desenvolvimento de novas features e Slices, ficam estritamente suspensos e pausados até a validação visual definitiva e aprovação explícita da UI pelo gestor na máquina local.

## DEC-024 — Critérios de Paridade Visual e Validação de Execução Real

No âmbito da homologação estética da interface, formalizou-se:
1. **Comprovação de Paridade**: A importação visual da UI do `failsafe01` para o monorepo só é considerada concluída e válida se o aplicativo servido pelo script padrão `npm run dev:hub` renderizar visualmente a interface de forma idêntica à referência estética e houver prova física de roteamento, entrypoint e carregamento de estilos.
2. **Injeção de Marcadores de Renderização**: Obrigatoriedade de manter sinalizadores controlados no DOM (`data-ui-source="failsafe01-import-active"`) e tags visuais discretas (`UI Source: failsafe01 sync`) nos layouts comuns enquanto durar a fase de testes e validação local, impedindo declarações de sucesso baseadas puramente em status de build sem visualização correspondente no navegador local.

## DEC-025 — dev:hub só é validado quando o workspace real renderiza DOM visível em teste automatizado, não apenas quando build passa.

No âmbito da contenção de erros silenciosos no monorepo, decidiu-se:
1. **Validação Ativa de DOM**: Estabelecer que a conformidade do servidor dev:hub é estritamente vinculada à renderização reativa do DOM cliente comprovada via testes automatizados (como Playwright/Chromium). Status de compilação ou build limpo não são suficientes para aprovação de pacotes que utilizam transpilação JSX/TSX.
2. **Autofix de Configurações**: Correção imediata de ausência de plugins de transpilação do React no Vite em todos os workspaces de frontend (`apps/hub-web-staging` e `apps/hub-web`) e garantia de roteamento/redirecionamento de sessão local no Login.

## DEC-026 — STATE_PACK.md como fonte operacional obrigatória e proibição de memória de chat como fonte de execução

No âmbito do alinhamento técnico e de governança contra regressões cognitivas no monorepo, formalizou-se:
1. **Proibição de Dependência de Chat**: É terminantemente proibido a qualquer IA ou executor depender da memória de chat (instruções e contextos passados temporariamente em conversas) como fonte soberana de alinhamento. Toda e qualquer regra, decisão e próximo passo de roteamento, UI ou infraestrutura devem residir e se estruturar canonicamente no repositório local.
2. **STATE_PACK.md como Fonte Soberana**: Criação de `STATE_PACK.md` em `ops/control-plane/memory/` contendo o estado unificado e regras de paridade de workspaces. Nenhum executor pode declarar uma tarefa como `COMPLETED` sem antes ler e validar o estado canônico contra o `STATE_PACK.md`.
3. **Validação de Sucesso Contra Falsos Positivos**: GCRCs que atestem sucesso técnico (builds ou testes) mas cujas validações locais ou de runtime subsequentes do gestor revelem quebras ou telas brancas são automaticamente rotulados como **FALSO POSITIVO** de fiação. Isso anula de imediato a declaração de compleição da tarefa e congela qualquer progressão de esteira.
4. **Garantia de Renderização Real**: Homologações de interface do satélite `failsafe01` em `apps/failsafe-hub` e workspaces ativos são estritamente condicionadas à renderização do DOM real servido por `npm run dev:hub`, não sendo aceito status de build limpo como prova de conformidade.
5. **Bloqueio de Staging e Acessos**: O provisionamento físico do staging e qualquer ação sensível na VPS/HostGator permanecem pausados e bloqueados até o cumprimento explícito dos segredos e gates humanos estipulados canonicamente. Qualquer falta de acesso físico real ao conector é classificada como **BLOQUEADO POR ACESSO**, sem simulação fantasiosa.

## DEC-027 — GCRC Acceptance Gate obrigatório para impedir falso COMPLETED, memória de chat e retorno parcial

No âmbito do reforço do controle de qualidade e integridade de handoffs operacionais, estabeleceu-se:
1. **Gate Automatizado de Retorno**: Cada retorno de execução de pacotes de governança, controle ou código deve ser validado por scripts de GCRC (`validate-gcrc.ps1` e `validate-gcrc.sh`) integrados na esteira do GitHub Actions.
2. **Proibição de COMPLETED Parcial**: Fica vedado marcar tarefas como COMPLETED se as alterações residirem apenas localmente em commit sem PR correspondente ou sem checks de CI remotos verdes.
3. **Exigência de Provas de UI**: Homologações estéticas ou de fiação de componentes front-end passam a exigir a coleta e o armazenamento de logs de trace e DOM reativo (`DEV_HUB_SCRIPT_TRACE.md`, `RUNTIME_RENDER_AUDIT.md`, `WIRING_AUDIT.md`, `VISUAL_DOM_PROOF.md`) no repositório de evidências, sob pena de classificação imediata como **FALSO POSITIVO** (`REJECTED_GCRC_FALSE_POSITIVE`).

## DEC-028 — Public Control Bridge sanitizado como ponte de acompanhamento e orquestração leve

No âmbito de blindagem contra regressão e dependência de chat memory, decidiu-se:
1. **Ponte de Controle Pública**: Criação do repositório público sanitizado [failsafe-control-bridge](https://github.com/hbrasilia/failsafe-control-bridge) para acompanhamento leve de estado, inboxes, comandos e bloqueios.
2. **Script de Publicação**: Provisionamento de scripts de publicação de lote (`publish-public-bridge.ps1` e `.sh`) que leem os estados locais do monorepo privado, filtram quaisquer credenciais/IPs privados e atualizam o repositório público de forma unidirecional.
3. **Soberania do Repositório Core**: O repositório `hbrasilia/failsafe` permanece como a única fonte soberana e canônica de verdade para regras de negócio e governança.


---

## 🚀 MARCO Beta b-0.1 — Reorganização Definitiva — 2026-06-03

A partir desta data, o ecossistema Failsafe ECO entra na fase **Beta b-0.1**,
sucedendo o ciclo ALPHA (v0.10-v0.12). Documentos soberanos do marco:

- `MARCO_BETA_B_0_1.md`
- `FAILSAFE_ECO_FINAL_DEFINITIVE_BLUEPRINT.md`
- `FAILSAFE_ECO_EXECUTION_PLAYBOOK.md`

Princípio Anti-Drift ativo: arquitetura, espinha dorsal/plano B, sequência
dos 8 grupos e tiers de aprovação NÃO mudam sem DEC formal.

---

## DEC-031 — Failsafe Control Center v1.0 — 2026-06-03

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

Stack: PHP 8.2 + MariaDB 10.11 rodando em VPS Contabo, base failsafejud
v15.4.27 adaptado. Auth: GitHub OAuth + 2FA TOTP. Reverse proxy: Caddy 2
com HTTPS automático Let's Encrypt. Subdomain: control.failsafe.com.br.

Iniciar APÓS conclusão dos packets:
- OPS-DOCS-UNIFICATION-001 (G1)
- OPS-PUBLIC-OBSERVABILITY-001 (G2)
- GATE-RECONCILE-001 (G3)

Riscos aceitos: dual stack PHP/MariaDB vs ECO Core TypeScript/Postgres
por 6 meses (mitigado por DEC-032).

Justificativa: failsafejud v15.4.27 já é release candidate maduro, com
80% das features genéricas necessárias para Control Center (auth, ACL,
audit, cofre, multi-tenant, workflows, notices, WhatsApp). Construir do
zero levaria 6-10 semanas; adaptar leva 14 dias. Economia de tempo
prevalece sobre purismo de stack.

---

## DEC-032 — Plano V2 Control Center TypeScript — 2027-Q1

**Status:** APPROVED (forward-dated)
**Owner:** CEO
**Marco:** Beta b-0.1

A partir de M+6 do MVP UNOX em produção real, executar migração do
Control Center de PHP/MariaDB para TypeScript/PostgreSQL alinhado ao
ECO Core. Plano detalhado: 8 semanas de execução.

**Critério de aceleração:** se 2+ incidentes técnicos por mês forem
atribuíveis a dual stack (PHP/MariaDB vs TS/Postgres), antecipar V2
para M+3 sem necessidade de nova DEC.

Mitigação proativa do dual stack durante a fase PHP:
- Helpers TypeScript no ECO Core espelham logica PHP (ABSORB JUD→ECO)
- Schemas mantidos additivos, sem dependências cruzadas obrigatórias
- Documentação de cada feature includes contraparte TS já planejada

---

## DEC-033 — Pausa do Lovable como Gerador Ativo — 2026-06-03

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

A DEC-021 declarou absorção integral do projeto visual Lovable em
`apps/failsafe-hub`. Lovable não tem mais função como gerador contínuo
para o ciclo Beta b-0.1.

**Ação imediata:** pausar assinatura Lovable (economiza ~USD 25/mês).
Repositório `failsafe01` mantido em modo read-only como referência
visual histórica.

**Reativação automática** se ocorrer qualquer um dos eventos:
- Portal Cliente B2C entrar em escopo de desenvolvimento
- Mobile app PWA premium for priorizado
- Nova vertical não-Asset-Services for aberta (ex: Confeitaria)

Quando reativar, NÃO usar como gerador livre — usar com
LOVABLE_BRIDGE_RUNBOOK ativo, em packet específico, com sync
obrigatório no fim. Não usar para iteração contínua.

---

## DEC-034 — Tier de Aprovação Estratificado — 2026-06-03

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

Implementar no Control Center 3 níveis de aprovação:

**T1 — Auto-merge:**
- Hotfix typo / CSS minor / doc não-canônica
- CI verde
- risk_class=LOW
- Auto-merge sem intervenção CEO

**T2 — Proxy automático via Hermes:**
- Packets pré-aprovados via whitelist
- GCRC válido conforme template
- Todos validators PASS
- Hermes valida → auto-merge

**T3 — CEO obrigatório (2FA TOTP):**
- DEC formal
- Migration de schema
- Cadastro/rotação de secrets
- Deploy de produção
- Mudança de escopo MVP

Reduz dependência única do Gestor declarada na RACI_MATRIX.
Implementação técnica em CONTROL-CENTER-SETUP-001 (G4).

---

## DEC-035 — Unificação Documental — Após G1

**Status:** EXECUTED
**Owner:** CEO
**Marco:** Beta b-0.1

Após conclusão do packet OPS-DOCS-UNIFICATION-001 (G1):

- `DOC_REGISTRY.yml` promovido a **índice oficial único** de toda a
  documentação canônica do ecossistema Failsafe ECO.
- Documentação de cada feature inclui contraparte TS já planejada

---

## DEC-033 — Pausa do Lovable como Gerador Ativo — 2026-06-03

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

A DEC-021 declarou absorção integral do projeto visual Lovable em
`apps/failsafe-hub`. Lovable não tem mais função como gerador contínuo
para o ciclo Beta b-0.1.

**Ação imediata:** pausar assinatura Lovable (economiza ~USD 25/mês).
Repositório `failsafe01` mantido em modo read-only como referência
visual histórica.

**Reativação automática** se ocorrer qualquer um dos eventos:
- Portal Cliente B2C entrar em escopo de desenvolvimento
- Mobile app PWA premium for priorizado
- Nova vertical não-Asset-Services for aberta (ex: Confeitaria)

Quando reativar, NÃO usar como gerador livre — usar com
LOVABLE_BRIDGE_RUNBOOK ativo, em packet específico, com sync
obrigatório no fim. Não usar para iteração contínua.

---

## DEC-034 — Tier de Aprovação Estratificado — 2026-06-03

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

Implementar no Control Center 3 níveis de aprovação:

**T1 — Auto-merge:**
- Hotfix typo / CSS minor / doc não-canônica
- CI verde
- risk_class=LOW
- Auto-merge sem intervenção CEO

**T2 — Proxy automático via Hermes:**
- Packets pré-aprovados via whitelist
- GCRC válido conforme template
- Todos validators PASS
- Hermes valida → auto-merge

**T3 — CEO obrigatório (2FA TOTP):**
- DEC formal
- Migration de schema
- Cadastro/rotação de secrets
- Deploy de produção
- Mudança de escopo MVP

Reduz dependência única do Gestor declarada na RACI_MATRIX.
Implementação técnica em CONTROL-CENTER-SETUP-001 (G4).

---

## DEC-035 — Unificação Documental — Após G1

**Status:** APPROVED (pending execution)
**Owner:** CEO
**Marco:** Beta b-0.1

Após conclusão do packet OPS-DOCS-UNIFICATION-001 (G1):

- `DOC_REGISTRY.yml` promovido a **índice oficial único** de toda a
  documentação canônica do ecossistema Failsafe ECO.
- **Sistema A** (`docs/00-canonical/` + `docs/01-08-*/`) e **Sistema C**
  (`ops/control-plane/docs/`) alinhados com escopos definidos.
- **Sistema B** (`docs/plataforma/produto/roadmap/operacao/governance/
  diretrizes/comercial/` — legado PT) movido para
  `docs/archive/legacy/` com conteúdo único migrado primeiro para
  Sistema A ou C antes do arquivamento.

A partir desta DEC: toda doc nova é criada respeitando DOC_REGISTRY.yml
como fonte de verdade. Toda PR que adiciona/remove/renomeia doc deve
atualizar DOC_REGISTRY.yml na mesma PR (enforce via Actions).

---

## DEC-037 — Gate CEO 1 APPROVED — 2026-06-04

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

G1 OPS-DOCS-UNIFICATION-001: CONCLUÍDO (PR #205 mesclado com sucesso)
G2 OPS-PUBLIC-OBSERVABILITY-001: CONCLUÍDO (PR #208 mesclado com sucesso)
G3 GATE-RECONCILE-001: CONCLUÍDO (PR #209 mesclado com sucesso)
Bifurcação G3: A (Bifurcação A validada com sucesso via Playwright e DOM real)

Autorizado prosseguir para G4 Control Center Fundação + G5/G6 em paralelo.
Riscos remanescentes: NENHUM (pontes de estado e visual do hub-web 100% validadas e sincronizadas).

---

## DEC-038 — Gate CEO 2 Aprovado — [DATA]

**Status:** PENDING (preenchido pelo CEO após Gate 2)
**Owner:** CEO

G4 CONTROL-CENTER-SETUP-001: [CONCLUÍDO / AJUSTES SOLICITADOS]
G5 CC-COMPLETENESS (6 packets): [CONCLUÍDO / AJUSTES SOLICITADOS]
G6 ABSORB-001 a 004: [CONCLUÍDO / AJUSTES SOLICITADOS]

Autorizado prosseguir para G7 (gates físicos VPS staging) sob
liberação explícita CEO conforme STAGING_PROVISIONING_GATE.md.

---

## DEC-039 — Liberação Execution Gate Staging — [DATA]

**Status:** PENDING (preenchido após autorizações físicas)
**Owner:** CEO

Conforme runbook STAGING_PROVISIONING_GATE.md:
- Snapshot Contabo criado: [ID-DO-SNAPSHOT]
- UFW regras revisadas e autorizadas: [SIM/NÃO + ajustes]
- 3 secrets cadastrados no GitHub:
  - FAILSAFE_SSH_VPS_KEY: [✓/pendente]
  - STAGING_DB_PASSWORD: [✓/pendente]
  - STAGING_DATABASE_URL: [✓/pendente]
- Backup pré-bootstrap validado em ASUSTOR + GDrive

Antigravity autorizado a executar STAGING-PROVISIONING-EXECUTION-001
+ RLS-STAGE-001 nos próximos 3 dias.

---

## DEC-040 — MVP UNOX OEM Piloto Pronto para Demo — [DATA]

**Status:** PENDING (preenchido após Gate 3)
**Owner:** CEO

MVP UNOX OEM Piloto validado integralmente:
- Fluxo end-to-end PASS (chamado→OS→técnico→checklist→peças→aprovação→dashboard)
- RLS leakage = 0 com 3 tenants sintéticos
- 3 personas funcionando isoladas
- Manuais operacionais entregues (1 página por persona)
- Roteiro de demo CEO ao cliente UNOX entregue

Autorizada apresentação ao cliente UNOX. Próximos passos:
- Agendar reunião comercial
- Migrar tenant sintético para tenant real após assinatura
- Iniciar Slice P5 (Comunicação cliente automatizada)
- Iniciar formalização da vertical Failsafe Jurídico
  (absorção failsafejud parcial conforme FEATURE_REUSE_MAP)

---

## DEC-041 — Registry de Domínios + Domínio Principal failsafe.com.br — 2026-06-03

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

Registrado o domínio principal oficial do ecossistema:
**failsafe.com.br** (corrigindo "failsafe.eco" usado como placeholder
em rascunhos anteriores deste marco).

**Domínios oficiais do ecossistema:**
- Principal: `failsafe.com.br`
- Secundário: `failsafe.pro` (301 redirect)
- Vertical Confeitaria: `flordephi.com.br` (reservado)

**Subdomains ativos no Beta b-0.1:**
- `status.failsafe.com.br` (HostGator, G2)
- `control.failsafe.com.br` (VPS Contabo, G4)
- `docs.failsafe.com.br` (alias /docs do Control Center, G5)
- `demo.failsafe.com.br` (VPS Contabo, G8)

Registry completo de TODOS os 16 domínios disponíveis em
`docs/beta-b-0.1/DOMAINS_REGISTRY.md`.

Toda mudança de uso de domínio reservado exige DEC formal posterior.

---

## DEC-042 — Política de Indexação DOC_REGISTRY — 2026-06-04

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

DOC_REGISTRY.yml indexa entry points lógicos do Control Plane,
não 100% dos arquivos .md do repo. Critérios:
- SIM: STATE_PACK, DECISIONS, runbooks, packets, marcos, README de pacotes
- SIM: cada pacote como entry point único (ex: docs/beta-b-0.1/README.md)
- NÃO: arquivos internos de pacotes (listados pelo README do pacote)
- NÃO: archive/legacy/ (Sistema B arquivado)
- NÃO: evidências individuais (listadas pelo packet)
Doc 08 §5 será ajustado em próximo lote (não bloqueia).

---

## DEC-043 — Canon de Infra: Host HostGator + IP VPS Contabo — 2026-06-04

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

Endereços técnicos canônicos formalizados (DOMAINS_REGISTRY.md §SSH):
- HostGator: [REDACTED_USER]@[REDACTED_HOST] com ~/.ssh/id_rsa (padrão)
- VPS Contabo: antigravity@[REDACTED_IP] com chave ed25519 dedicada

Confidencialidade: IP da VPS Contabo ([REDACTED_IP]) é dado
SOMENTE-REPO-PRIVADO. Validator de sanitização bloqueia este IP
em qualquer publicação pública. Eventualmente migrar para Cloudflare
proxy para mascarar.

Política de chaves: AccessBroker após G4. Rotação: HostGator anual,
VPS Contabo semestral. Chave RSA legada pode ser convertida para
OpenSSH via `ssh-keygen -p -m OpenSSH -f ~/.ssh/id_rsa` (resolve
erro "invalid format" observado no Antigravity G2).

---

## DEC-044 — Política de Triagem de Issues — 2026-06-04

**Status:** APPROVED
**Owner:** CEO
**Marco:** Beta b-0.1

Estabelece-se a triagem sistemática das issues abertas do repositório em 6 categorias de destino operacional:
- A) ALIGN_BETA_B_0_1: Já cobertas pelos pacotes ativos (fechadas no final da fase de merges).
- B) DEFER_BETA_B_0_2: Backlog formal pós-marco.
- C) DEFER_BETA_B_0_3+: Pós-verticais.
- D) CONVERT_TO_PACKET: Convertidas em novos pacotes de backlog.
- E) CLOSE_OBSOLETE: Fechamento com justificativa técnica.
- F) CLOSE_DUPLICATE: Fechamento com referência à original.

A re-triagem e atualização do ISSUES_REGISTRY.md devem ocorrer mensalmente pelo conselho GERENTE.

---

**Fim do bloco Beta b-0.1.**
**Iniciar imediatamente por:** ler PASSO 1 do
`FAILSAFE_ECO_EXECUTION_PLAYBOOK.md` e disparar prompt no Antigravity Pro.

