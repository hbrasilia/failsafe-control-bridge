# PolÃ­tica de SanitizaÃ§Ã£o da Ponte PÃºblica

---
document_id: sanitization-policy
version: 0.1.0
status: active
scope: public-bridge-policy
---

Para proteger a integridade da infraestrutura e dos dados, o script de publicaÃ§Ã£o remove e higieniza:
1. **Secrets e Credentials**: Chaves SSH, passwords, chaves API, tokens, strings de conexÃ£o.
2. **EndereÃ§os de Rede Privados**: IPs de VPS, domÃ­nios restritos.
3. **Caminhos de Sistema**: DiretÃ³rios absolutos da mÃ¡quina local.
4. **Dados de Clientes Reais**: Toda menÃ§Ã£o a nomes reais de clientes.
