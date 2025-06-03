// Renderiza o componente sidebar se existir o elemento no DOM
document.addEventListener('DOMContentLoaded', function () {
    if (typeof sidebarHTML !== 'undefined') {
        const sidebar = document.getElementById('sidebar-component');
        if (sidebar) {
            sidebar.innerHTML = sidebarHTML;

            // Destaca o link ativo
            const links = sidebar.querySelectorAll('a');
            links.forEach(link => {
                if (window.location.pathname.endsWith(link.getAttribute('href'))) {
                    link.classList.add('active');
                }
            });
        }
    }
});