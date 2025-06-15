# 🧩 Intranet Zylo — Sistema de Chamados

Este projeto é um sistema de Intranet fictício da empresa **Zylo**, desenvolvido como trabalho em grupo da disciplina de Programação Web. Ele simula uma plataforma interna para **registro e gerenciamento de tickets de atendimento** (chamados), usando HTML, CSS, JavaScript e PHP com banco de dados SQLite.

---

## 🧠 Funcionalidades

- 🔐 Sistema de login e registro (front-end)
- 🎫 Cadastro de tickets de atendimento
- 📋 Listagem de todos os tickets
- ✏️ Edição de status e categoria dos tickets
- 🗑️ Exclusão de tickets
- 📊 Página de dashboard com estatísticas dinâmicas
- 🎨 Layout responsivo com tema escuro
- ✅ Implementado o que foi exigido:
  - CRUD completo
  - Lista dinâmica (PHP: array de tickets)
  - Estrutura de repetição (`while`)
  - Estrutura de decisão (`if / else if / else`)

---

## 📂 Estrutura do Projeto

```
backend/
  db.php           # Conexão e inicialização do banco SQLite
  tickets.php      # Endpoints CRUD para tickets (API)
  stats.php        # Endpoint para estatísticas de tickets
css/
  base.css         # Variáveis, resets e temas
  layout.css       # Layout geral, containers, widgets
  form.css         # Estilos de formulários e floating label
  buttons.css      # Botões e ações
  modal.css        # Modais e overlays
  styles.css       # Importa todos os módulos
js/
  ticket.js        # Lógica de CRUD, modais e filtros de tickets
  enviar_ticket.js # Lógica do formulário de novo ticket
components/
  NavBar.js        # Componente de navegação superior
  SideBar.js       # Componente de menu lateral
pages/
  login.html       # Tela de login
  registro.html    # Tela de registro
  menu.php         # Dashboard inicial
  tickets.php      # Listagem e edição de tickets
  enviar_ticket.php# Formulário de novo ticket
```

---

## ⚙️ Documentação Técnica

### Backend (PHP + SQLite)
- O backend expõe endpoints RESTful em `backend/tickets.php` para CRUD de tickets.
- O banco de dados é SQLite, criado automaticamente em `backend/intranet.sqlite`.
- O endpoint `GET` implementa:
  - **Lista dinâmica**: array `$tickets[]` preenchido dinamicamente.
  - **Estrutura de repetição**: `while ($row = $stmt->fetch())` para percorrer os tickets.
  - **Estrutura de decisão**: `if / else if / else` para rotular status.
- O endpoint `stats.php` retorna estatísticas de tickets para o dashboard.

### Frontend
- O layout é responsivo, com tema escuro e componentes reutilizáveis (NavBar, SideBar).
- O formulário de novo ticket utiliza floating label, ícones e feedback visual moderno.
- A listagem de tickets permite editar (modal) e excluir tickets, com atualização dinâmica.
- As estatísticas do menu são atualizadas automaticamente via fetch do backend.

### Estruturas Didáticas
- **Lista dinâmica**: array PHP `$tickets[]` preenchido no backend.
- **Repetição**: `while` para percorrer resultados do banco.
- **Decisão**: `if / else if / else` para status customizado.

---

## 📝 Manual de Utilização

### 1. Requisitos
- PHP 7.4+
- Extensão PDO SQLite habilitada
- Navegador moderno

### 2. Instalação e Execução
1. Clone ou extraia o projeto em seu servidor local (ex: XAMPP, WAMP, PHP embutido).
2. Certifique-se de que a extensão PDO SQLite está habilitada no `php.ini`.
3. Acesse a pasta do projeto e rode:
   ```bash
   php -S localhost:8080 -t .
   ```
4. Acesse `http://localhost:8080/pages/login.html` no navegador.

### 3. Fluxo de Uso
- **Login:** Acesse com qualquer usuário fictício (não há autenticação real).
- **Menu:** Veja estatísticas dinâmicas de tickets.
- **Novo Ticket:** Clique em "Novo Ticket" no menu lateral, preencha o formulário e envie.
- **Listar/Editar/Excluir:** Acesse "Meus Tickets" para visualizar, editar (modal) ou excluir tickets.
- **Dashboard:** Estatísticas são atualizadas automaticamente.

### 4. Observações
- O sistema não implementa autenticação real (apenas front-end).
- Não há upload de arquivos/anexos.
- O banco SQLite é criado e gerenciado automaticamente.
- O código é modularizado para fácil manutenção.

---

## 👨‍💻 Equipe
- [Seu Nome Aqui]

---

## 📄 Licença
MIT
