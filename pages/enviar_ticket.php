<?php
// enviar_ticket.php - Página de criação de novo ticket
?><!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zylo Intranet — Novo Ticket</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  </head>
  <body>
    <div id="navbar-component"></div>
    <div class="layout">
      <aside class="sidebar" id="sidebar-component"></aside>
      <main class="menu-main">
        <section class="welcome-widget">
          <h2>Novo Ticket</h2>
          <p>Preencha as informações para criar seu chamado.</p>
        </section>
        <section class="widget form-widget">
          <form action="#" method="post" enctype="multipart/form-data" class="ticket-form">
            <div class="input-box">
              <i class="bx bxs-user"></i>
              <input type="text" name="nome" id="nome" placeholder=" " required autocomplete="off">
              <label for="nome">Nome</label>
            </div>
            <div class="input-box">
              <i class="bx bxs-envelope"></i>
              <input type="email" name="email" id="email" placeholder=" " required autocomplete="off">
              <label for="email">E-mail</label>
            </div>
            <div class="input-box">
              <i class="bx bx-list-ul"></i>
              <select name="categoria" id="categoria" required>
                <option value="" disabled selected hidden></option>
                <option value="suporte">Suporte</option>
                <option value="financeiro">Financeiro</option>
                <option value="administrativo">Administrativo</option>
                <option value="outros">Outros</option>
              </select>
              <label class="static-label" for="categoria">Categoria</label>
            </div>
            <div class="input-box">
              <i class="bx bx-edit"></i>
              <input type="text" name="assunto" id="assunto" placeholder=" " required autocomplete="off">
              <label for="assunto">Assunto</label>
            </div>
            <div class="input-box textarea-box">
              <i class="bx bx-comment-detail"></i>
              <textarea name="descricao" id="descricao" placeholder=" " rows="4" required autocomplete="off"></textarea>
              <label for="descricao">Descrição</label>
            </div>
            <div class="button-container">
              <button type="submit" class="modern-btn"><i class="bx bx-send"></i> Enviar Ticket</button>
              <button type="reset" class="modern-btn"><i class="bx bx-eraser"></i> Redefinir</button>
            </div>
          </form>
        </section>
      </main>
    </div>
    <script src="../components/SideBar.js"></script>
    <script src="../components/NavBar.js"></script>
    <script src="../js/enviar_ticket.js"></script>
    <script>
    document.querySelector('.sidebar-toggle')?.addEventListener('click', () => {
      document.body.classList.toggle('sidebar-collapsed');
    });
    </script>
  </body>
</html>
