# BLOCKERS — Bloqueios de Execução

## 🚫 Staging Físico (BLOCKED_WAITING_GATES)
O staging físico permanece bloqueado até a comprovação dos seguintes gates:
1. Comprovação de Snapshot na VPS.
2. Blindagem e validação das regras UFW do firewall.
3. Provisionamento de secrets SSH e credentials.
4. Aprovação formal do gestor.
