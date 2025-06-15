# 🧩 Intranet Zylo — Sistema de Chamados

Este projeto é um sistema de Intranet fictício da empresa **Zylo**, desenvolvido como trabalho em grupo da disciplina de Programação Web. Ele simula uma plataforma interna para **registro e gerenciamento de tickets de atendimento** (chamados), usando HTML, CSS, JavaScript e PHP com banco de dados SQLite.

---

## 📑 Sumário

* [Funcionalidades](#funcionalidades)
* [Estrutura do Projeto](#estrutura-do-projeto)
* [Documentação Técnica](#documentação-técnica)
* [Manual de Utilização](#manual-de-utilização)
* [Equipe](#equipe)
* [Licença](#licença)

---

## Funcionalidades

* 🔐 Sistema de login e registro de usuários (autenticação real)
* 🎫 Cadastro de tickets de atendimento
* 📋 Listagem de todos os tickets
* ✏️ Edição de status e categoria dos tickets
* 🗑️ Exclusão de tickets
* 📊 Página de dashboard com estatísticas dinâmicas
* 🎨 Layout responsivo com tema escuro
* ✅ Implementado o que foi exigido:
  * CRUD completo
  * Lista dinâmica (PHP: array de tickets)
  * Estrutura de repetição (`while`)
  * Estrutura de decisão (`if / else if / else`)

---

## Estrutura do Projeto

```notepad
backend/
  db.php           # Conexão e inicialização do banco SQLite (tickets e usuários)
  tickets.php      # Endpoints CRUD para tickets (API)
  stats.php        # Endpoint para estatísticas de tickets
  login.php        # Endpoint de login de usuário (autenticação)
  register.php     # Endpoint de registro de usuário
css/
  base.css         # Variáveis, resets e temas
  layout.css       # Layout geral, containers, widgets
  form.css         # Estilos de formulários, login, registro e floating label
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
  login.html       # Tela de login (autenticação)
  registro.html    # Tela de registro de usuário
  menu.php         # Dashboard inicial
  tickets.php      # Listagem e edição de tickets
  enviar_ticket.php# Formulário de novo ticket
```

---

## Documentação Técnica

### Backend (PHP + SQLite)

* O backend expõe endpoints RESTful em `backend/tickets.php` para CRUD de tickets.
* O banco de dados é SQLite, criado automaticamente em `backend/intranet.sqlite`.
* Tabelas:
  * `tickets`: chamados de atendimento
  * `usuarios`: autenticação de usuários (login/registro)
* Endpoints:
  * `tickets.php`: CRUD de tickets
  * `stats.php`: estatísticas de tickets
  * `login.php`: login de usuário (POST JSON: email/username + senha)
  * `register.php`: registro de usuário (POST JSON: username, email, senha)
* Estruturas didáticas:
  * **Lista dinâmica**: array `$tickets[]` preenchido no backend
  * **Repetição**: `while` para percorrer resultados do banco
  * **Decisão**: `if / else if / else` para status customizado

### Frontend

* Layout responsivo, tema escuro, componentes reutilizáveis (NavBar, SideBar).
* Formulários de login, registro e tickets usam floating label, ícones e feedback visual moderno.
* Listagem de tickets permite editar (modal) e excluir tickets, com atualização dinâmica.
* Estatísticas do menu são atualizadas automaticamente via fetch do backend.
* Autenticação real: login e registro comunicam com backend, exibem erros e redirecionam.

---

## Manual de Utilização

### 1. Requisitos

* PHP 7.4+
* Extensão PDO SQLite habilitada
* Navegador moderno

#### Como habilitar a extensão PDO SQLite

* **No Windows (php.ini):**
  1. Localize o arquivo `php.ini` (ex: `C:\xampp\php\php.ini` ou na pasta do seu PHP).
  2. Abra o arquivo em um editor de texto.
  3. Procure pelas linhas:

     ```ini
     ;extension=pdo_sqlite
     ;extension=sqlite3
     ```

  4. Remova o ponto e vírgula (`;`) do início dessas linhas, ficando assim:

     ```ini
     extension=pdo_sqlite
     extension=sqlite3
     ```

  5. Salve o arquivo e reinicie o servidor web (Apache, Nginx ou PHP embutido).

* **No Linux:**
  * Se estiver usando um gerenciador de pacotes:

    ```bash
    sudo apt-get install php-sqlite3
    sudo service apache2 restart # ou sudo systemctl restart apache2
    ```

  * Ou edite o `php.ini` conforme instruções acima.

* **No XAMPP:**
  * O SQLite já vem incluso, basta habilitar as extensões no `php.ini` como mostrado acima e reiniciar o Apache pelo painel do XAMPP.

* **Verifique se está habilitado:**
  * Crie um arquivo `info.php` com o conteúdo:

    ```php
    <?php phpinfo();
    ```

  * Acesse no navegador e procure por "pdo_sqlite" e "sqlite3" na página.

### 2. Instalação e Execução

1. Clone ou extraia o projeto em seu servidor local (ex: XAMPP, WAMP, PHP embutido).
2. Certifique-se de que a extensão PDO SQLite está habilitada no `php.ini`.
3. Acesse a pasta do projeto e rode:

  ```bash
  php -S localhost:8080 -t .
  ```

4. Acesse `http://localhost:8080/pages/login.html` no navegador.

### 3. Fluxo de Uso

* **Registro:** Crie uma conta em "Registrar-se".
* **Login:** Acesse com seu usuário ou email e senha cadastrados.
* **Menu:** Veja estatísticas dinâmicas de tickets.
* **Novo Ticket:** Clique em "Novo Ticket" no menu lateral, preencha o formulário e envie.
* **Listar/Editar/Excluir:** Acesse "Meus Tickets" para visualizar, editar (modal) ou excluir tickets.
* **Dashboard:** Estatísticas são atualizadas automaticamente.

### 4. Observações

* O sistema implementa autenticação real (login/registro).
* Não há upload de arquivos/anexos.
* O banco SQLite é criado e gerenciado automaticamente.
* O código é modularizado para fácil manutenção.

---

## Equipe

* 202306074043 - Samuel Guilerme Ferreira Dias

---

## Licença

MIT
