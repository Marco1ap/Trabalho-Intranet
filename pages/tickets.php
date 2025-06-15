<?php
// tickets.php - Página de listagem, edição e exclusão de tickets
?><!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zylo Intranet — Acompanhamento de Tickets</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  </head>
  <body>
    <div id="navbar-component"></div>
    <div class="layout">
      <aside class="sidebar" id="sidebar-component"></aside>
      <main class="menu-main">
        <section class="welcome-widget">
          <h2>Meus Tickets</h2>
          <p>Visualize e filtre seus tickets aqui.</p>
        </section>
        <section class="widget filter-widget">
          <h3>Filtrar por status</h3>
          <div class="button-container sla">
            <button class="filter-btn active" data-status="Pendente">Pendente</button>
            <button class="filter-btn" data-status="Em Andamento">Em Andamento</button>
            <button class="filter-btn" data-status="Concluído">Concluído</button>
            <button class="filter-btn" data-status="Todos">Todos</button>
          </div>
        </section>
        <section id="tickets-container" class="widgets tickets-widget"></section>
        <div id="spinner" class="spinner" style="display:none;"></div>
      </main>
    </div>
    <script src="../js/ticket.js"></script>
    <script src="../components/NavBar.js"></script>
    <script src="../components/SideBar.js"></script>
  </body>
</html>
