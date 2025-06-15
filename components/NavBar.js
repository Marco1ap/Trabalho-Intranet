const navbarHTML = `
<nav class="navbar">
  <a href="menu.html" class="brand">
    <img src="../assets/Zylo.png" alt="Zylo Logo" class="logo">
  </a>
  <ul class="nav-links">
    <li>
      <a href="https://wa.me/5581999999999" target="_blank">Entre em Contato</a>
    </li>
  </ul>
  <div class="sla">
    <li class="sair"><a href="#" id="logout-link">Sair</a></li>
  </div>
</nav>
`;

document.addEventListener('DOMContentLoaded', function () {
  const navbar = document.getElementById('navbar-component');
  if (navbar) navbar.innerHTML = navbarHTML;

  // Redireciona para login.html ao clicar em "Sair"
  const logout = document.getElementById('logout-link');
  if (logout) {
    logout.addEventListener('click', function (e) {
      e.preventDefault();
      window.location.href = 'login.html';
    });
  }

  // Redireciona automaticamente de .html para .php
  if (window.location.pathname.endsWith('enviar_ticket.html')) {
    window.location.replace('enviar_ticket.php');
  }
  if (window.location.pathname.endsWith('tickets.html')) {
    window.location.replace('tickets.php');
  }
});