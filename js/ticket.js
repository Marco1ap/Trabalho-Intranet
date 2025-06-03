document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.filter-btn');
  const container = document.getElementById('tickets-container');
  const spinner = document.getElementById('spinner');
  let ticketsData = [];


  function showTickets(list) {
    container.innerHTML = '';
    list.forEach(t => {
      const div = document.createElement('div');
      div.className = `ticket ${t.status.toLowerCase().replace(/ /g, '')}`;
      div.innerHTML = `
          <strong>${t.title}</strong>
          <p>${t.description}</p>
          <span class="status">Status: ${t.status}</span>
        `;
      container.appendChild(div);
    });
  }

  fetch('../assets/tickets.json')
    .then(res => res.json())
    .then(data => {
      ticketsData = data;
      showTickets(ticketsData.filter(t => t.status === 'Pendente'));
    });

  buttons.forEach(btn => btn.addEventListener('click', function () {
    document.querySelector('.filter-btn.active').classList.remove('active');
    this.classList.add('active');
    const status = this.dataset.status;

    // Mostra o spinner e esconde os tickets
    container.style.display = 'none';
    spinner.style.display = 'flex';

    setTimeout(() => {
      spinner.style.display = 'none';
      container.style.display = '';
      const filtered = status === 'Todos'
        ? ticketsData
        : ticketsData.filter(t => t.status === status);
      showTickets(filtered);
    }, 500);
  }));
});
