<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>INTRANET-ZYLO</title>
  <link rel="stylesheet" href="../css/styles.css"/>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
</head>
<body>
  <main class="login-container">
    <form id="login-form" autocomplete="off">
      <!-- Título e subtítulo entram DENTRO do form para fazer parte do grid -->
      <h1>ZYLO</h1>
      <p>Acesse sua conta para continuar</p>

      <div class="input-box">
        <input
          type="text"
          name="username-email"
          id="username-email"
          placeholder=" "
          required
        />
        <label for="username-email">Email ou nome de usuário</label>
        <i class="bx bxs-user"></i>
      </div>

      <div class="input-box">
        <input
          type="password"
          name="password"
          id="password"
          placeholder=" "
          required
        />
        <label for="password">Senha</label>
        <i class="bx bxs-lock-alt"></i>
      </div>

      <div class="button-container">
        <button type="submit" class="login-btn">
          <i class="bx bx-log-in"></i>
          Acessar
        </button>
      </div>

      <div class="register">
        <span>Não tem conta?</span>
        <a href="registro.php">Registrar-se</a>
      </div>

      <div
        id="login-error"
        style="color:#ff6b6b; display:none;"
      ></div>
    </form>
  </main>

  <script>
    document
      .getElementById("login-form")
      .addEventListener("submit", async function (e) {
        e.preventDefault();
        const email = document.getElementById("username-email").value;
        const password = document.getElementById("password").value;
        const errorDiv = document.getElementById("login-error");
        errorDiv.style.display = "none";
        try {
          const res = await fetch("../backend/login.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, password }),
          });
          const data = await res.json();
          if (data.success) {
            window.location.href = "menu.php";
          } else {
            errorDiv.textContent =
              data.error || "Usuário ou senha inválidos.";
            errorDiv.style.display = "block";
          }
        } catch (err) {
          errorDiv.textContent = "Erro de conexão.";
          errorDiv.style.display = "block";
        }
      });
  </script>
</body>
</html>
