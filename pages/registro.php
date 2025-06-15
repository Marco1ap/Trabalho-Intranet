<!DOCTYPE html>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zylo Intranet - Registro</title>
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
  <main class="login-container">
    <h1>ZYLO</h1>
    <p>Crie sua conta Zylo</p>

    <form action="#" method="post" autocomplete="off" id="register-form">
      <div class="input-box">
        <input type="text" name="username" id="username" placeholder=" " required>
        <label for="username">Nome de usuário</label>
        <i class="bx bxs-user"></i>
      </div>
      <div class="input-box">
        <input type="email" name="email" id="email" placeholder=" " required>
        <label for="email">Email</label>
        <i class="bx bxs-envelope"></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" id="password" placeholder=" " required>
        <label for="password">Senha</label>
        <i class="bx bxs-lock-alt"></i>
      </div>
      <div class="button-container">
        <button type="submit">Registrar</button>
      </div>

      <div class="register">
        <span>Já tem conta?</span>
        <a href="login.php">Login</a>
      </div>
      <div id="register-error" style="color:#ff6b6b; margin-top:10px; display:none;"></div>
    </form>
  </main>

  <script>
    document.getElementById('register-form').addEventListener('submit', async function (e) {
      e.preventDefault();
      const username = document.getElementById('username').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const errorDiv = document.getElementById('register-error');
      errorDiv.style.display = 'none';
      try {
        const res = await fetch('../backend/register.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ username, email, password })
        });
        const data = await res.json();
        if (data.success) {
          window.location.href = 'login.php';
        } else {
          errorDiv.textContent = data.error || 'Erro ao registrar usuário.';
          errorDiv.style.display = 'block';
        }
      } catch (err) {
        errorDiv.textContent = 'Erro de conexão.';
        errorDiv.style.display = 'block';
      }
    });
  </script>
</body>

</html>