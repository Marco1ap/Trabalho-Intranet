document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('form');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    formData.append('titulo', form.assunto.value);
    formData.append('status', 'Pendente');
    try {
      const res = await fetch('../backend/tickets.php', {
        method: 'POST',
        body: formData
      });
      if (res.ok) {
        alert('Ticket criado com sucesso!');
        form.reset();
      } else {
        alert('Erro ao criar ticket.');
      }
    } catch (err) {
      alert('Erro de conexão ao criar ticket.');
    }
  });
});
