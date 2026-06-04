# ðŸ†˜ CONTINUIDADE SEM CLAUDE â€” InstruÃ§Ãµes para Qualquer LLM

**O QUE:** este documento garante que se Claude (este chat) ficar
indisponÃ­vel, qualquer outra LLM (ChatGPT Pro, Google AI Pro, Grok,
Gemini, Hermes local) pode continuar a operaÃ§Ã£o do Failsafe ECO Beta
b-0.1 de onde paramos.

**Quando usar:** se vocÃª nÃ£o conseguir mais usar este Claude (limite
de mensagens da Max 20 atingido, sem crÃ©ditos extras), abra este
documento e siga.

---

## ðŸŽ¯ Contexto MÃ­nimo para Outra LLM

Se vocÃª quer que ChatGPT Pro / Google AI Pro / Grok / Gemini retomem,
**cole o prompt abaixo no inÃ­cio da nova conversa:**

```
VocÃª estÃ¡ agindo como consultor sÃªnior em sucessÃ£o ao Claude no
projeto Failsafe ECO, marco oficial "Beta b-0.1 â€” ReorganizaÃ§Ã£o
Definitiva" iniciado em 2026-06-03.

CONTEXTO MÃNIMO:
- Repo soberano: github.com/hbrasilia/failsafe (privado)
- Bridge pÃºblica: github.com/hbrasilia/failsafe-control-bridge
- Status pÃºblico (apÃ³s G2): https://status.failsafe.com.br/
- Control Center (apÃ³s G4): https://control.failsafe.com.br/

DOCUMENTOS SOBERANOS PARA LER (nesta ordem):
1. docs/beta-b-0.1/MARCO_BETA_B_0_1.md (manifesto do marco)
2. docs/beta-b-0.1/FAILSAFE_ECO_FINAL_DEFINITIVE_BLUEPRINT.md
   (arquitetura completa + 8 grupos de aÃ§Ã£o)
3. docs/beta-b-0.1/FAILSAFE_ECO_EXECUTION_PLAYBOOK.md
   (passo a passo executÃ¡vel)
4. docs/beta-b-0.1/01_DECISIONS_BLOCK.md (DECs 031-040)
5. docs/beta-b-0.1/03_PROMPTS_GRUPOS_G1_a_G8.md (prompts dos grupos)
6. docs/beta-b-0.1/05_PONTOS_DE_CONTROLE_GATES.md (gates CEO)
7. ops/control-plane/memory/STATE_PACK.md (estado canÃ´nico vivo)
8. ops/control-plane/memory/DECISIONS.md (todas as DECs vigentes)
9. AGENTS.md (regras de execuÃ§Ã£o)

REGRAS OBRIGATÃ“RIAS:
- DEC-026: estado canÃ´nico soberano. Nada de "memÃ³ria de chat"
  como fonte. Sempre ler arquivos do repo.
- DEC-015: mandato contÃ­nuo. Sem micro-aprovaÃ§Ãµes.
- DEC-027: GCRC v2 obrigatÃ³rio no retorno. Falso positivo = REJECTED.
- DEC-009: zero nome real de cliente em paths/branches/packets canÃ´nicos
- DEC-031 a 040: marco Beta b-0.1 ativo
- PrincÃ­pio Anti-Drift: arquitetura + Espinha+Plano B + sequÃªncia
  8 grupos NÃƒO MUDAM sem DEC formal

PAPÃ‰IS CANÃ”NICOS:
- Antigravity Pro: executor tÃ©cnico principal (rÃ¡pido, integrado)
- ChatGPT Pro: orquestrador estratÃ©gico (sem limite tokens) â† VOCÃŠ AQUI
- Google AI Pro: fallback multimodal gratuito
- Claude Max 20: consultor arquitetural rarÃ­ssimo (indisponÃ­vel agora)
- Hermes Ollama local: sÃ³ validaÃ§Ã£o simples
- Lovable: PAUSADO (DEC-033 absorveu DEC-021)

ROTEAMENTO DAS LLMs:
- Tarefas tÃ©cnicas (gerar diff, abrir PR) â†’ Antigravity Pro
- Tarefas estratÃ©gicas (decisÃ£o arquitetural rara) â†’ vocÃª (ChatGPT Pro)
- ValidaÃ§Ã£o simples (parser, schema) â†’ Hermes local
- Code review multimodal â†’ Google AI Pro

MINHA SITUAÃ‡ÃƒO ATUAL NO PROJETO:
[CEO preenche: estou no PASSO X do PLAYBOOK / acabei o GRUPO Y /
preciso de ajuda com Z]

Por favor, leia os 9 documentos acima e me dÃª parecer/aÃ§Ã£o seguinte.
Mantenha disciplina de tokens: referÃªncia por path, nÃ£o recopie
conteÃºdo, lotes de aÃ§Ãµes, GCRC v2 no retorno.
```

---

## ðŸŽ¯ CenÃ¡rios EspecÃ­ficos de Continuidade

### CenÃ¡rio A: Claude esgotou, preciso de decisÃ£o arquitetural

**Use:** ChatGPT Pro
**Prompt:** cole o "Contexto MÃ­nimo" acima + descreva sua dÃºvida especÃ­fica.

**LimitaÃ§Ã£o:** ChatGPT Pro nÃ£o tem visÃ£o de longo prazo arquitetural
tÃ£o profunda quanto Claude para decisÃµes raras. Para DEC novas
arquiteturais, prefira esperar Claude Max renovar (prÃ³ximo ciclo de
billing) ou consultar Google AI Pro (Gemini 2.0 Pro) como segunda opiniÃ£o.

### CenÃ¡rio B: Antigravity travou, preciso executar packet

**Use:** ChatGPT Pro com acesso ao repo via GitHub web
**Prompt template:**

```
VocÃª estÃ¡ agindo como executor temporÃ¡rio no lugar do Antigravity Pro
indisponÃ­vel.

Packet a executar: [NOME_DO_PACKET]
Arquivo: ops/control-plane/packets/active/[NOME_DO_PACKET].md

Regras idÃªnticas ao Antigravity:
- DEC-026 (estado canÃ´nico do repo)
- DEC-027 (GCRC v2 obrigatÃ³rio)
- DEC-009 (zero nome real cliente)
- DEC-015 (mandato contÃ­nuo)

Acesse o repo via github.com/hbrasilia/failsafe (PAT no cofre do
Control Center apÃ³s G4; antes disso, eu copio e colo arquivos).

Gere o conteÃºdo dos arquivos a criar/modificar. Eu (CEO) faÃ§o o
commit via GitHub web.

Retorno: GCRC v2 conforme template.
```

**LimitaÃ§Ã£o:** mais lento (CEO faz commit manualmente) mas funciona.

### CenÃ¡rio C: CEO indisponÃ­vel, sistema continua sozinho?

**Resposta:** sim, parcialmente.

O que continua sem CEO:
- T1 e T2 de aprovaÃ§Ã£o no Control Center (apÃ³s G4)
- Antigravity continua tarefas nÃ£o-bloqueantes (refactors, testes, docs)
- HostGator status page continua atualizando
- Backups ASUSTOR + GDrive continuam
- Cron N8N continua

O que PARA sem CEO:
- T3 de aprovaÃ§Ã£o (DEC, migration, secrets, deploy)
- Gate CEO 1, 2, 3
- Demo ao cliente UNOX
- DecisÃ£o sobre incidentes graves

**Workaround:** delegar T3 para 1 admin de confianÃ§a via
DEC formal (DEC-041 futura).

### CenÃ¡rio D: Hermes Ollama caiu, validaÃ§Ãµes pararam

**Resposta:** fallback automÃ¡tico para Anthropic API via cofre.

**ConfiguraÃ§Ã£o:** Control Center apÃ³s G4 jÃ¡ roteia automaticamente:
- Hermes responde em <10s? Use Hermes (zero custo)
- Hermes timeout? Use Anthropic API (USD ~$0.01 por validaÃ§Ã£o)
- Teto USD 30/mÃªs na API externa, WhatsApp alerta CEO se passar

**Sem Control Center (antes de G4):** CEO usa ChatGPT Pro como
validador manual temporÃ¡rio.

### CenÃ¡rio E: VPS Contabo caiu

**Resposta:** Control Center fica indisponÃ­vel, mas:

- failsafejud em HostGator continua funcionando (isolado)
- Status page no HostGator continua mostrando Ãºltima info conhecida
- ASUSTOR tem clone diÃ¡rio do repo
- GitHub continua funcionando
- DR runbook em ops/control-plane/docs/disaster-recovery/

**Procedimento:**
1. CEO verifica painel Contabo
2. Se VPS down >1h, ativa restore-from-asustor
3. RTO alvo 4h (validado FS-INFRA-007)

### CenÃ¡rio F: GitHub caiu (raro)

**Resposta:** ASUSTOR + GDrive tÃªm clones.

- ASUSTOR: clone diÃ¡rio automÃ¡tico
- GDrive: backup encrypted
- CEO consegue trabalhar localmente via clone
- Quando GitHub volta: push do clone

---

## ðŸŽ¯ Arquivos para Manter ATUALIZADOS

Estes arquivos sÃ£o a "memÃ³ria externa" do projeto. Sempre que algo
mudar, atualizar:

| Arquivo | Quando atualizar |
|---|---|
| `ops/control-plane/memory/STATE_PACK.md` | A cada packet concluÃ­do |
| `ops/control-plane/memory/DECISIONS.md` | A cada nova DEC |
| `ops/control-plane/memory/AI_LOG.md` | A cada interaÃ§Ã£o significativa com IA |
| `ops/control-plane/memory/DOC_REGISTRY.yml` | Nova doc / migraÃ§Ã£o / arquivo |
| `ops/control-plane/agents/antigravity/ACTIVE_PACKET_QUEUE.md` | Novo packet / mudanÃ§a ordem |
| `ops/control-plane/memory/BETA_B_0_1_PROGRESS.md` | A cada Gate CEO |

**Regra de ouro:** se outra LLM precisar entender o estado **agora**,
deve conseguir lendo apenas estes 6 arquivos.

---

## ðŸŽ¯ Como Pedir Ajuda Ã  Comunidade (Ãºltimo recurso)

Se TUDO acima falhar:

1. **Discord/Slack da Anthropic** (se vocÃª tem acesso): perguntar
   sobre limite de tokens Claude Max.
2. **GitHub Discussions** no repo failsafe: documentar o problema
   publicamente, outros desenvolvedores podem ajudar.
3. **Reddit r/ClaudeAI / r/ChatGPT**: como usar vÃ¡rias LLMs em
   workflow integrado.

**Importante:** nunca compartilhar publicamente:
- ConteÃºdo do AccessBroker (chaves API)
- STATE_PACK.md interno (canon privado)
- Nomes reais de clientes
- IPs de servidores

Use sempre a bridge pÃºblica sanitizada como referÃªncia se precisar
mostrar o estado do projeto a outros.

---

## ðŸŽ¯ Failsafe do Failsafe â€” Plano de Ãšltima InstÃ¢ncia

CenÃ¡rio extremo: vocÃª (CEO) estÃ¡ doente/viajando/indisponÃ­vel por
semanas, todas as LLMs cobrando, e Antigravity preso.

**Procedimento:**
1. Antes de ficar indisponÃ­vel, criar DEC-XXX delegando T1/T2 a
   admin de confianÃ§a (com 2FA prÃ³prio).
2. Status page no HostGator continua funcionando sem CEO.
3. Antigravity pausa automaticamente packets que exigem T3 apÃ³s 48h.
4. Quando vocÃª voltar, abre Control Center, vÃª pendentes, aprova.
5. Nenhum dado Ã© perdido (audit log + backups).

**Risco aceito:** projeto pode ficar parado, mas nÃ£o regredido.
Comercialmente: ajustar expectativa com cliente UNOX se for o caso.

---

**Failsafe ECO Beta b-0.1 â€” SucessÃ£o Garantida. â€” Qualquer LLM Continua.**

