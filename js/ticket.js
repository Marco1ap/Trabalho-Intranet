document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.filter-btn');
  const container = document.getElementById('tickets-container');
  const spinner = document.getElementById('spinner');
  let ticketsData = [];
  let currentEditId = null;

  // Carregar tickets iniciais
  loadTickets();

  // Filtro de status
  buttons.forEach(btn => btn.addEventListener('click', function () {
    document.querySelector('.filter-btn.active').classList.remove('active');
    this.classList.add('active');
    const status = this.dataset.status;
    loadTickets(status);
  }));

  async function loadTickets(status = 'Pendente') {
    spinner.style.display = 'flex';
    let url = '../backend/tickets.php';
    if (status && status !== 'Todos') url += '?status=' + encodeURIComponent(status);
    const res = await fetch(url);
    ticketsData = await res.json();
    showTickets(ticketsData);
    spinner.style.display = 'none';
  }

  function showTickets(list) {
    container.innerHTML = '';
    if (!list.length) {
      container.innerHTML = '<p>Nenhum ticket encontrado.</p>';
      return;
    }
    list.forEach(t => {
      const div = document.createElement('div');
      div.className = `ticket ${t.status.toLowerCase().replace(/ /g, '')}`;
      div.innerHTML = `
        <strong>${t.titulo}</strong>
        <p>${t.descricao}</p>
        <div class="ticket-info">
          <span class="categoria">Categoria: ${t.categoria || '-'}</span>
          <span class="status">Status: ${t.status}</span>
        </div>
        <div class="ticket-actions">
          <button class="edit-btn modern-btn"><i class="bx bx-edit-alt"></i> Editar</button>
          <button class="delete-btn modern-btn"><i class="bx bx-trash"></i> Excluir</button>
        </div>
      `;
      // Editar
      div.querySelector('.edit-btn').onclick = () => {
        // Cria um modal simples para edição
        const modal = document.createElement('div');
        modal.className = 'modal-edit-ticket';
        modal.innerHTML = `
          <div class="modal-content">
            <h3>Editar Ticket</h3>
            <form class="edit-ticket-form">
              <label>Título</label>
              <input type="text" name="titulo" value="${t.titulo}" required />
              <label>Descrição</label>
              <textarea name="descricao" required>${t.descricao}</textarea>
              <label>Categoria</label>
              <select name="categoria" required>
                <option value="suporte" ${t.categoria === 'suporte' ? 'selected' : ''}>Suporte</option>
                <option value="financeiro" ${t.categoria === 'financeiro' ? 'selected' : ''}>Financeiro</option>
                <option value="administrativo" ${t.categoria === 'administrativo' ? 'selected' : ''}>Administrativo</option>
                <option value="outros" ${t.categoria === 'outros' ? 'selected' : ''}>Outros</option>
              </select>
              <label>Status</label>
              <select name="status">
                <option value="Pendente" ${t.status === 'Pendente' ? 'selected' : ''}>Pendente</option>
                <option value="Em Andamento" ${t.status === 'Em Andamento' ? 'selected' : ''}>Em Andamento</option>
                <option value="Concluído" ${t.status === 'Concluído' ? 'selected' : ''}>Concluído</option>
              </select>
              <div class="modal-actions">
                <button type="submit" class="modern-btn"><i class="bx bx-save"></i> Salvar</button>
                <button type="button" class="modern-btn close-modal"><i class="bx bx-x"></i> Cancelar</button>
              </div>
            </form>
          </div>
        `;
        document.body.appendChild(modal);
        // Fechar modal
        modal.querySelector('.close-modal').onclick = () => modal.remove();
        // Submeter edição
        modal.querySelector('form').onsubmit = async (e) => {
          e.preventDefault();
          const formData = new FormData(e.target);
          const data = {
            id: t.id,
            titulo: formData.get('titulo'),
            descricao: formData.get('descricao'),
            categoria: formData.get('categoria'),
            status: formData.get('status')
          };
          spinner.style.display = 'flex';
          await fetch('../backend/tickets.php', {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
          });
          spinner.style.display = 'none';
          modal.remove();
          await loadTickets(document.querySelector('.filter-btn.active').dataset.status);
        };
      };
      // Deletar
      div.querySelector('.delete-btn').onclick = async () => {
        if (confirm('Deseja excluir este ticket?')) {
          spinner.style.display = 'flex';
          await fetch(`../backend/tickets.php?id=${t.id}`, { method: 'DELETE' });
          await loadTickets(document.querySelector('.filter-btn.active').dataset.status);
          spinner.style.display = 'none';
        }
      };
      container.appendChild(div);
    });
  }
});
