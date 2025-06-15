<!DOCTYPE html>

<html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zylo Intranet — Menu</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
  </head>

  <body>
    <div id="navbar-component"></div>

    <div class="layout">

      <aside class="sidebar" id="sidebar-component"></aside>

      <main class="menu-main">
        <section class="welcome-widget">
          <h2>Bem-vindo(a), Usuário!</h2>
          <p>Hoje é dia: <span id="current-date"></span>. Aqui você pode
            gerenciar tickets,
            acompanhar pendências, criar solicitações e acessar recursos
            internos da empresa.
          </p>
        </section>

        <section class="widgets">
          <div class="widget events-widget">
            <h3>Estatísticas de Tickets</h3>
            <ul>
              <li><strong>Abertos:</strong> <a href="#">12</a></li>
              <li><strong>Em andamento:</strong> <a href="#">5</a></li>
              <li><strong>Fechados:</strong> <a href="#">30</a></li>
            </ul>
          </div>
        </section>
      </main>
    </div>

    <script src="../components/SideBar.js"></script>
    <script src="../components/NavBar.js"></script>
    <script>
    // Atualiza estatísticas de tickets dinamicamente
    fetch('../backend/stats.php')
      .then(r => r.json())
      .then(stats => {
        document.querySelector('.events-widget li:nth-child(1) a').textContent = stats.abertos;
        document.querySelector('.events-widget li:nth-child(2) a').textContent = stats.andamento;
        document.querySelector('.events-widget li:nth-child(3) a').textContent = stats.fechados;
      });
    </script>
  </body>

</html>