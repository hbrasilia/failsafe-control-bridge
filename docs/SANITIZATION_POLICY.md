# Política de Sanitização da Ponte Pública

---
document_id: sanitization-policy
version: 0.1.0
status: active
scope: public-bridge-policy
---

Para proteger a integridade da infraestrutura e dos dados, o script de publicação remove e higieniza:
1. **Secrets e Credentials**: Chaves SSH, passwords, chaves API, tokens, strings de conexão.
2. **Endereços de Rede Privados**: IPs de VPS, domínios restritos.
3. **Caminhos de Sistema**: Diretórios absolutos da máquina local.
4. **Dados de Clientes Reais**: Toda menção a nomes reais de clientes.
