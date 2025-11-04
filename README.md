# Kanban Online - CRUD Application

## Descrição
Este projeto é uma aplicação web de gerenciamento de tarefas no estilo Kanban, com funcionalidades de **CRUD** (Create, Read, Update, Delete). Ele permite que os usuários criem, visualizem, editem e excluam tarefas, além de designá-las a pessoas específicas. O sistema também inclui autenticação de usuários e integração com a API ViaCEP para preenchimento automático de informações de localização.

---

## Funcionalidades
### 1. **Autenticação de Usuários**
- Tela de login para acesso ao sistema.
- Logout para encerrar a sessão.
- Proteção de páginas com verificação de sessão.

### 2. **Cadastro de Usuários**
- Formulário para criar novos usuários.
- Integração com a API ViaCEP para preenchimento automático de estado e cidade com base no CEP.

### 3. **Gerenciamento de Tarefas**
- **Criar Tarefa**: Formulário para adicionar novas tarefas com status, prioridade, setor e descrição.
- **Visualizar Tarefas**: Exibição das tarefas organizadas por status (`to do`, `doing`, `done`) em tabelas.
- **Editar Tarefa**: Formulário para atualizar informações de uma tarefa existente.
- **Excluir Tarefa**: Opção para deletar tarefas diretamente da interface.

---

## Estrutura do Projeto
### Arquivos e Diretórios
- **index.php**: Tela de login e autenticação.
- **public/cadastro.php**: Tela de cadastro de usuários.
- **public/CREATE_kanban.php**: Tela para criar novas tarefas.
- **public/READ_kanban.php**: Tela para visualizar tarefas organizadas por status.
- **public/UPDATE_kanban.php**: Tela para editar tarefas.
- **public/DELETE_kanban.php**: Script para excluir tarefas.
- **config/db.php**: Configuração de conexão com o banco de dados.
- **config/db.sql**: Script SQL para criação do banco de dados e tabelas.
- **assets/**: Ícones e imagens.
- **style/**: Arquivos de estilo CSS.
- **scripts/**: Scripts JavaScript.

---

## API Utilizada
### ViaCEP
A API ViaCEP é utilizada para buscar informações de localização (estado e cidade) com base no CEP fornecido pelo usuário.

#### Exemplo de Uso:
- **URL**: `https://viacep.com.br/ws/{cep}/json/`
- **Entrada**: Um CEP válido (ex.: `01001000`).
- **Saída**:
```json
{
  "cep": "01001-000",
  "logradouro": "Praça da Sé",
  "complemento": "lado ímpar",
  "bairro": "Sé",
  "localidade": "São Paulo",
  "uf": "SP",
  "ibge": "3550308",
  "gia": "1004",
  "ddd": "11",
  "siafi": "7107"
}

