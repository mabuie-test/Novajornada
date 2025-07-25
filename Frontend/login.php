<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <!-- cola AQUI TODO o <head> do teu login.html -->
      <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | PHIL ASEAN PROVIDER & LOGISTICS</title>
  <link rel="icon" href="assets/phil.jpeg" type="image/jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <!-- cola AQUI TODO o <body> do teu login.html, mantendo IDs e classes -->
    <header>
    <div class="container header-container">
      <div class="logo">
        <img src="assets/phil.jpeg" alt="Logo PHIL ASEAN" id="logo-img">
        <span>PHIL ASEAN PROVIDER & LOGISTICS</span>
      </div>
      <nav>
        <button class="mobile-menu-btn" id="mobile-menu-btn">
          <i class="fas fa-bars"></i>
        </button>
        <ul id="main-menu">
          <li><a href="index.php"><i class="fas fa-home"></i> Início</a></li>
          <li><a href="index.php#services"><i class="fas fa-ship"></i> Serviços</a></li>
          <li><a href="index.php#about"><i class="fas fa-info-circle"></i> Sobre</a></li>
          <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
          <li><a href="register.php"><i class="fas fa-user-plus"></i> Registro</a></li>
          <li><a href="index.php#contact"><i class="fas fa-envelope"></i> Contato</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="section-title">
      <h2>Login</h2>
    </div>
    <form id="loginForm">
      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input id="password" name="password" type="password" class="form-control" required>
      </div>
      <button type="submit" class="btn submit-btn">Entrar</button>
      <div class="link-group">
        <p>Não tem conta? <a href="register.php">Registre-se</a></p>
      </div>
    </form>
  </main>

  <footer>
    <p>© 2025 PHIL ASEAN PROVIDER & LOGISTICS. Todos os direitos reservados.</p>
  </footer>

  <script>
    document.getElementById('mobile-menu-btn').addEventListener('click', () => {
      document.getElementById('main-menu').classList.toggle('show');
    });
  </script>

<!-- Modal genérico para alert/confirm -->
<div id="dialog-overlay" class="hidden">
  <div id="dialog-box">
    <div id="dialog-message"></div>
    <div id="dialog-buttons">
      <button id="dialog-ok">OK</button>
      <button id="dialog-cancel" class="hidden">Cancelar</button>
    </div>
  </div>
</div>


  <script src="script.js" defer></script>
</body>
</html>
