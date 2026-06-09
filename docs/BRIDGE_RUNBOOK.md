# Runbook de Operação da Ponte Pública

---
document_id: bridge-runbook
version: 0.1.0
status: active
scope: public-bridge-runbook
---

## Sincronização
A sincronização é executada do repositório privado para o público rodando o script:
`ops/control-plane/scripts/bridge/publish-public-bridge.sh`

## Regras
1. Nunca editar os arquivos diretamente no repositório público `failsafe-control-bridge`.
2. A única fonte de verdade é o repositório privado `hbrasilia/failsafe`.
