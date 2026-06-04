# 🆘 CONTINUIDADE SEM CLAUDE — Instruções para Qualquer LLM

**O QUE:** este documento garante que se Claude (este chat) ficar
indisponível, qualquer outra LLM (ChatGPT Pro, Google AI Pro, Grok,
Gemini, Hermes local) pode continuar a operação do Failsafe ECO Beta
b-0.1 de onde paramos.

**Quando usar:** se você não conseguir mais usar este Claude (limite
de mensagens da Max 20 atingido, sem créditos extras), abra este
documento e siga.

---

## 🎯 Contexto Mínimo para Outra LLM

Se você quer que ChatGPT Pro / Google AI Pro / Grok / Gemini retomem,
**cole o prompt abaixo no início da nova conversa:**

```
Você está agindo como consultor sênior em sucessão ao Claude no
projeto Failsafe ECO, marco oficial "Beta b-0.1 — Reorganização
Definitiva" iniciado em 2026-06-03.

CONTEXTO MÍNIMO:
- Repo soberano: github.com/hbrasilia/failsafe (privado)
- Bridge pública: github.com/hbrasilia/failsafe-control-bridge
- Status público (após G2): https://status.failsafe.com.br/
- Control Center (após G4): https://control.failsafe.com.br/

DOCUMENTOS SOBERANOS PARA LER (nesta ordem):
1. docs/beta-b-0.1/MARCO_BETA_B_0_1.md (manifesto do marco)
2. docs/beta-b-0.1/FAILSAFE_ECO_FINAL_DEFINITIVE_BLUEPRINT.md
   (arquitetura completa + 8 grupos de ação)
3. docs/beta-b-0.1/FAILSAFE_ECO_EXECUTION_PLAYBOOK.md
   (passo a passo executável)
4. docs/beta-b-0.1/01_DECISIONS_BLOCK.md (DECs 031-040)
5. docs/beta-b-0.1/03_PROMPTS_GRUPOS_G1_a_G8.md (prompts dos grupos)
6. docs/beta-b-0.1/05_PONTOS_DE_CONTROLE_GATES.md (gates CEO)
7. ops/control-plane/memory/STATE_PACK.md (estado canônico vivo)
8. ops/control-plane/memory/DECISIONS.md (todas as DECs vigentes)
9. AGENTS.md (regras de execução)

REGRAS OBRIGATÓRIAS:
- DEC-026: estado canônico soberano. Nada de "memória de chat"
  como fonte. Sempre ler arquivos do repo.
- DEC-015: mandato contínuo. Sem micro-aprovações.
- DEC-027: GCRC v2 obrigatório no retorno. Falso positivo = REJECTED.
- DEC-009: zero nome real de cliente em paths/branches/packets canônicos
- DEC-031 a 040: marco Beta b-0.1 ativo
- Princípio Anti-Drift: arquitetura + Espinha+Plano B + sequência
  8 grupos NÃO MUDAM sem DEC formal

PAPÉIS CANÔNICOS:
- Antigravity Pro: executor técnico principal (rápido, integrado)
- ChatGPT Pro: orquestrador estratégico (sem limite tokens) ← VOCÊ AQUI
- Google AI Pro: fallback multimodal gratuito
- Claude Max 20: consultor arquitetural raríssimo (indisponível agora)
- Hermes Ollama local: só validação simples
- Lovable: PAUSADO (DEC-033 absorveu DEC-021)

ROTEAMENTO DAS LLMs:
- Tarefas técnicas (gerar diff, abrir PR) → Antigravity Pro
- Tarefas estratégicas (decisão arquitetural rara) → você (ChatGPT Pro)
- Validação simples (parser, schema) → Hermes local
- Code review multimodal → Google AI Pro

MINHA SITUAÇÃO ATUAL NO PROJETO:
[CEO preenche: estou no PASSO X do PLAYBOOK / acabei o GRUPO Y /
preciso de ajuda com Z]

Por favor, leia os 9 documentos acima e me dê parecer/ação seguinte.
Mantenha disciplina de tokens: referência por path, não recopie
conteúdo, lotes de ações, GCRC v2 no retorno.
```

---

## 🎯 Cenários Específicos de Continuidade

### Cenário A: Claude esgotou, preciso de decisão arquitetural

**Use:** ChatGPT Pro
**Prompt:** cole o "Contexto Mínimo" acima + descreva sua dúvida específica.

**Limitação:** ChatGPT Pro não tem visão de longo prazo arquitetural
tão profunda quanto Claude para decisões raras. Para DEC novas
arquiteturais, prefira esperar Claude Max renovar (próximo ciclo de
billing) ou consultar Google AI Pro (Gemini 2.0 Pro) como segunda opinião.

### Cenário B: Antigravity travou, preciso executar packet

**Use:** ChatGPT Pro com acesso ao repo via GitHub web
**Prompt template:**

```
Você está agindo como executor temporário no lugar do Antigravity Pro
indisponível.

Packet a executar: [NOME_DO_PACKET]
Arquivo: ops/control-plane/packets/active/[NOME_DO_PACKET].md

Regras idênticas ao Antigravity:
- DEC-026 (estado canônico do repo)
- DEC-027 (GCRC v2 obrigatório)
- DEC-009 (zero nome real cliente)
- DEC-015 (mandato contínuo)

Acesse o repo via github.com/hbrasilia/failsafe (PAT no cofre do
Control Center após G4; antes disso, eu copio e colo arquivos).

Gere o conteúdo dos arquivos a criar/modificar. Eu (CEO) faço o
commit via GitHub web.

Retorno: GCRC v2 conforme template.
```

**Limitação:** mais lento (CEO faz commit manualmente) mas funciona.

### Cenário C: CEO indisponível, sistema continua sozinho?

**Resposta:** sim, parcialmente.

O que continua sem CEO:
- T1 e T2 de aprovação no Control Center (após G4)
- Antigravity continua tarefas não-bloqueantes (refactors, testes, docs)
- HostGator status page continua atualizando
- Backups ASUSTOR + GDrive continuam
- Cron N8N continua

O que PARA sem CEO:
- T3 de aprovação (DEC, migration, secrets, deploy)
- Gate CEO 1, 2, 3
- Demo ao cliente UNOX
- Decisão sobre incidentes graves

**Workaround:** delegar T3 para 1 admin de confiança via
DEC formal (DEC-041 futura).

### Cenário D: Hermes Ollama caiu, validações pararam

**Resposta:** fallback automático para Anthropic API via cofre.

**Configuração:** Control Center após G4 já roteia automaticamente:
- Hermes responde em <10s? Use Hermes (zero custo)
- Hermes timeout? Use Anthropic API (USD ~$0.01 por validação)
- Teto USD 30/mês na API externa, WhatsApp alerta CEO se passar

**Sem Control Center (antes de G4):** CEO usa ChatGPT Pro como
validador manual temporário.

### Cenário E: VPS Contabo caiu

**Resposta:** Control Center fica indisponível, mas:

- failsafejud em HostGator continua funcionando (isolado)
- Status page no HostGator continua mostrando última info conhecida
- ASUSTOR tem clone diário do repo
- GitHub continua funcionando
- DR runbook em ops/control-plane/docs/disaster-recovery/

**Procedimento:**
1. CEO verifica painel Contabo
2. Se VPS down >1h, ativa restore-from-asustor
3. RTO alvo 4h (validado FS-INFRA-007)

### Cenário F: GitHub caiu (raro)

**Resposta:** ASUSTOR + GDrive têm clones.

- ASUSTOR: clone diário automático
- GDrive: backup encrypted
- CEO consegue trabalhar localmente via clone
- Quando GitHub volta: push do clone

---

## 🎯 Arquivos para Manter ATUALIZADOS

Estes arquivos são a "memória externa" do projeto. Sempre que algo
mudar, atualizar:

| Arquivo | Quando atualizar |
|---|---|
| `ops/control-plane/memory/STATE_PACK.md` | A cada packet concluído |
| `ops/control-plane/memory/DECISIONS.md` | A cada nova DEC |
| `ops/control-plane/memory/AI_LOG.md` | A cada interação significativa com IA |
| `ops/control-plane/memory/DOC_REGISTRY.yml` | Nova doc / migração / arquivo |
| `ops/control-plane/agents/antigravity/ACTIVE_PACKET_QUEUE.md` | Novo packet / mudança ordem |
| `ops/control-plane/memory/BETA_B_0_1_PROGRESS.md` | A cada Gate CEO |

**Regra de ouro:** se outra LLM precisar entender o estado **agora**,
deve conseguir lendo apenas estes 6 arquivos.

---

## 🎯 Como Pedir Ajuda à Comunidade (último recurso)

Se TUDO acima falhar:

1. **Discord/Slack da Anthropic** (se você tem acesso): perguntar
   sobre limite de tokens Claude Max.
2. **GitHub Discussions** no repo failsafe: documentar o problema
   publicamente, outros desenvolvedores podem ajudar.
3. **Reddit r/ClaudeAI / r/ChatGPT**: como usar várias LLMs em
   workflow integrado.

**Importante:** nunca compartilhar publicamente:
- Conteúdo do AccessBroker (chaves API)
- STATE_PACK.md interno (canon privado)
- Nomes reais de clientes
- IPs de servidores

Use sempre a bridge pública sanitizada como referência se precisar
mostrar o estado do projeto a outros.

---

## 🎯 Failsafe do Failsafe — Plano de Última Instância

Cenário extremo: você (CEO) está doente/viajando/indisponível por
semanas, todas as LLMs cobrando, e Antigravity preso.

**Procedimento:**
1. Antes de ficar indisponível, criar DEC-XXX delegando T1/T2 a
   admin de confiança (com 2FA próprio).
2. Status page no HostGator continua funcionando sem CEO.
3. Antigravity pausa automaticamente packets que exigem T3 após 48h.
4. Quando você voltar, abre Control Center, vê pendentes, aprova.
5. Nenhum dado é perdido (audit log + backups).

**Risco aceito:** projeto pode ficar parado, mas não regredido.
Comercialmente: ajustar expectativa com cliente UNOX se for o caso.

---

**Failsafe ECO Beta b-0.1 — Sucessão Garantida. — Qualquer LLM Continua.**

