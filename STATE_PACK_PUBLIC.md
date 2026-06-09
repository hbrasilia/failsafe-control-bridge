# STATE_PACK_PUBLIC — Estado Público do Failsafe ECO

> [!IMPORTANT]
> Este documento é uma visão pública sanitizada do estado operacional.
> Repo Soberano: hbrasilia/failsafe (Privado)

# STATE_PACK — Failsafe ECO Beta v2

---
document_id: state-pack-beta-v2
version: v0.1-Alfa-1
fase_atual: BETA_V2_G3_AGUARDANDO
data_atualizacao: 2026-06-07
owner: CEO
---

## Status dos Grupos

| Grupo | Status | Commit |
|-------|--------|--------|
| G0 Canon | CONCLUIDO | 593abdc |
| G1 Auditoria | CONCLUIDO | e9c4ebf |
| G2 Pipeline | CONCLUIDO | loop ~16s |
| G3 Entity Model | AGUARDANDO | — |
| G4 Demo OEM | AGUARDANDO | — |

## Infraestrutura Operacional

| Componente | Estado |
|-----------|--------|
| VPS Contabo | ATIVO — antigravity@[REDACTED_IP] |
| Control Center | ATIVO — control.failsafe.com.br |
| Repo GitHub | ATIVO — hbrasilia/failsafe |
| Ollama | ATIVO — qwen2.5-coder:7b + openhermes:latest |
| Aider | ATIVO — v0.86.2 /home/antigravity/.local/bin/aider |
| GitHub Actions | ATIVO — dispatch.yml operacional |
| DB eco_control_center | ATIVO — beta_v2_steps + beta_v2_logs |

## Stack de Execucao (DEFINITIVO)

```
Executor:  Aider CLI v0.86.2
Modelo:    ollama/qwen2.5-coder:7b
Flags:     --yes-always --no-auto-commits --no-pretty --map-tokens 0
Loop:      CC → dispatch/outbox/packet.json → GitHub Action → SSH VPS → dispatch.sh → Aider → git push
Tempo:     ~16s tasks simples (direct_python) / ~60s tasks codigo (Aider)
```

## Decisoes Vigentes

DEC-031 a 040: Marco Beta b-0.1 (ver DECISIONS.md)
DEC-041: Executor Aider + qwen2.5-coder
DEC-042: Pipeline GitHub Actions + dispatch.sh
DEC-043: G0+G1+G2 concluidos
DEC-044: Regras tecnicas definitivas VPS

## Documentacao Unificada

- Sistema A (KEEP): docs/00-canonical/ + docs/01-08/
- Sistema B (ARCHIVED): docs/archive/legacy/ (migrado 2026-06-07)
- Sistema C (KEEP): ops/control-plane/docs/
- Indice: ops/control-plane/memory/DOC_REGISTRY.yml

## Proxima Acao

G3 Entity Model — 5 entidades universais com RLS.
Prerequisito: P1+P2+P3 resolvidos (esta execucao).

## Regras Anti-Regressao

Ver: docs/beta-v2/ROADMAP_BETA_CORRECOES.md (LEITURA OBRIGATORIA)
