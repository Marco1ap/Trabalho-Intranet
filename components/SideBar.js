const sidebarHTML = `
    <ul>
        <li><a href="menu.php"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="enviar_ticket.php" class="active"><i class="bx bx-send"></i> <span>Novo Ticket</span></a></li>
        <li><a href="tickets.php"><i class="bx bx-list-check"></i> <span>Meus Tickets</span></a></li>
      </ul>
        `;

// Render sidebar component
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar-component');
    if (sidebar) sidebar.innerHTML = sidebarHTML;

    // Optional: highlight active link based on current page
    const links = sidebar.querySelectorAll('a');
    links.forEach(link => {
        if (window.location.pathname.endsWith(link.getAttribute('href'))) {
            link.classList.add('active');
        }
    });
});